<?php
include ("header.html");
?>
<div class="col-lg-offset-3 col-lg-6">
 <div class="pageTitle">
    <h2>
      <center>
        Predict Calls <img src="1491831348_thefreeforty_phone.png" width=40 style="margin-bottom:10px">
      </center>
    </h2>
  </div>
<div class="row" style="margin-top:30px">
	<div class="col-lg-3 chooseCluster" style="background:#009788">DOWNTOWN</div>
	<div class="col-lg-3 chooseCluster" style="background:#8bc24a">EASTSIDE</div>
	<div class="col-lg-3 chooseCluster" style="background:#e65100">WESTSIDE</div>
	<div class="col-lg-3 chooseCluster" style="background:#c2175b">SOUTHWEST</div>
</div>
<div class="row chooseCluster" style="background:#999">All Location</div>
<center>
<div><input type="text" name="predictdate" id="predictdate" placeholder="Choose Date"/></div>
<div>
	<button type="button" class="btn btn-primary" id="predict">Predict</button>
</div>
</center>
<div id="prediction">
</div>
<center><div id="predictionTitle"></div> <div id="predictionGraph"></div></center>
</div>
<?php

?>


