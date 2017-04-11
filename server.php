<?php
$servername = "localhost";
$username = "root";
$password = "";
mysql_connect($servername, $username, $password);
mysql_select_db('dss_911');

$action=$_REQUEST['a'];
$cluster=$_REQUEST['c'];
if($action=="h")
{


 $query=mysql_query("select * from actual_ann where cluster_name='{$cluster}' ");
	$arr=[];
	$i=0;
	while($row=mysql_fetch_array($query))
	{
		$arr[$i]["x"]=$i+1;
		$arr[$i]["y"]=$row["actual"];
		$i++;
	}
  $mainarr[0]["type"]='line';
  $mainarr[0]["dataPoints"]=$arr; 
  
	$query=mysql_query("select * from history_ann where LOWER(cluster_name)=LOWER('{$cluster}')");
	$arr=[];
	$i=0;
	while($row=mysql_fetch_array($query))
	{
		$arr[$i]["x"]=$i+1;
		$arr[$i]["y"]=$row["prediction"];
		$i++;
	}
  $mainarr[1]["type"]='line';
  $mainarr[1]["dataPoints"]=$arr; 
//  $return[""]="";
  $return["data"]=$mainarr;
  echo json_encode($return,JSON_NUMERIC_CHECK);
}
else
{
$noOfDays=$_REQUEST['d'];
$clusters=['DOWNTOWN','EASTSIDE','WESTSIDE','SOUTHWEST'];
$all=false;
$count=0;
if($cluster=="All Location"){
  $all=true;
}
$index=0;
all:
if($all){
  $cluster=$clusters[$count];  
}


//echo "select * from aggregrate where cluster_name='{$cluster}' ORDER BY id DESC limit 5";
$query=@mysql_query("select * from aggregrate where cluster_name='{$cluster}' ORDER BY id DESC limit 5");

	$i=0;
  while($row=mysql_fetch_array($query))
	{
		$arr[$i]=$row["total"];
		$i++;
	}
  $i=0;
  repeat:
 
  
  
  @mysql_query("Delete from ann_input_table");
  $success = @mysql_query("insert into ann_input_table values('{$cluster}','$arr[0]','$arr[1]','$arr[2]','$arr[3]','$arr[4]')");
  
if($success){
$dataobj = json_decode(file_get_contents('http://desktop-rtnbur7:8080/api/rest/public/process/newService?'));
$totalPrediction = $dataobj->{'prediction(OUTPUT)'};


if($noOfDays==1)
{
  $result[$index]['value']=$totalPrediction;
  $result[$index++]['label']=$cluster;
if($all && $count<count($clusters)-1)
{
  $count++;
  goto all;
}
else
echo json_encode($result,JSON_NUMERIC_CHECK); ;

}else
{
  $noOfDays--;
  $arr2[0]=$arr[$i];
  $arr2[1]=$arr[$i];
  $arr2[2]=$arr[$i];
  $arr2[3]=$arr[$i];
  $arr2[4]=$arr[$i];
  
   $query=@mysql_query("select * from ann_input_table limit 1");
   $i=0;
   while($row=mysql_fetch_assoc($query))
	 {
		  
      $arr[$i++]=$row["DAY2"];
      $arr[$i++]=$row["DAY3"];
      $arr[$i++]=$row["DAY4"];
      $arr[$i++]=$row["DAY5"];
		  
	  }
    $arr[$i]=$totalPrediction;
   goto repeat;
   
}
}
}

?>