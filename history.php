
<?php
include ("header.html");
?>
<script src="js/canvasjs.min.js"></script>
<script>

  $(function () {
  // eval($('#code').text());
 
  $.get("server.php?c=DOWNTOWN&a=h", function (data) {
  var day_data = $.parseJSON(data);
  var chart = new CanvasJS.Chart("graph1", day_data);
  chart.render();
  });
  $.get("server.php?c=EASTSIDE&a=h", function (data) {
var day_data = $.parseJSON(data);
var chart = new CanvasJS.Chart("graph2", day_data);
chart.render();
});
$.get("server.php?c=WESTSIDE&a=h", function (data) {
var day_data = $.parseJSON(data);
var chart = new CanvasJS.Chart("graph3", day_data);
chart.render();
});
$.get("server.php?c=SOUTHWEST&a=h", function (data) {
var day_data = $.parseJSON(data);
var chart = new CanvasJS.Chart("graph4", day_data);
chart.render();
});


} );
</script>

<div class="col-lg-offset-2 col-lg-8">
  <div class="pageTitle">
    <h2>
      <center>
        Prediction History  <img src="1491831593_ic_history_48px.png" width="40" style="margin-bottom:10px">
    </h2>
  </div>

  <div id="history" class="container">
       <ul class="nav nav-pills">
      <li class="active">
        <a href="#1a" data-toggle="tab">DOWNTOWN</a>
      </li>
      <li>
        <a href="#2a" data-toggle="tab">EAST SIDE</a>
      </li>
      <li>
        <a href="#3a" data-toggle="tab">WEST SIDE</a>
      </li>
      <li>
        <a href="#4a" data-toggle="tab">SOUTH WEST</a>
      </li>
    </ul>

    <div class="tab-content clearfix">
      <div class="tab-pane active" id="1a">
        <div id="graph1"></div>
      </div>
      <div class="tab-pane active" id="2a">
        <div id="graph2"></div>
      </div>
      <div class="tab-pane active" id="3a">
        <div id="graph3"></div>
      </div>
      <div class="tab-pane active" id="4a">
        <div id="graph4"></div>
      </div>
    </div>
    
    
  </div>

  <div class="">
    <center>
    <div class="colorpatch" style="background:#369ead"></div>
    <strong>Actual No of calls</strong>
      &nbsp;&nbsp;
    <div class="colorpatch" style="background:#c24642"></div>
    <strong>Predicted No of calls</strong>
    </center>
  </div>
  <?php
//include ("footer.html");
?>
