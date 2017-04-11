<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
//$conn = new mysqli($servername, $username, $password,'dss_911');
mysql_connect($servername, $username, $password);
mysql_select_db('dss');
// Check connection
$cluster=5;
$query=mysql_query("select calldate,total from aggregrate where cluster_name='{$cluster}'");
print_r($query);
print_r(mysql_fetch_row($query));
$i=0;
while($row=mysql_fetch_row($query))
{
	$arr[$i][0]=$row[0];
	$arr[$i][1]=$row[1];
	$i++;
}

for ($i=0 ;$i<sizeof($arr);$i++)
{
	$input1= $arr[$i][1];
	$input2= $arr[$i+1][1];
	$input3= $arr[$i+2][1];
	$input4= $arr[$i+3][1];
	$input5= $arr[$i+4][1];
	$input6= $arr[$i+5][1];
	
	//mysql_query("insert into annInput values($cluster,$input1,$input2,$input3,$input4,$input5,$input6)");
}
?>