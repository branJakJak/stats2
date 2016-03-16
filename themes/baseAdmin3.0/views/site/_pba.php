<?php 

$backGroundColor = "";
if ($pba >= 0  && $pba <= 23.99) {
  $backGroundColor = "red";
}else if ($pba >= 24  && $pba <= 39.99) {
  $backGroundColor = "#FFBF00";
}else if ($pba >= 40) {
  $backGroundColor = "#5FFB17";
} 

?>

  <div class="widget ">
    <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
      PBA
    </div> <!-- /widget-header -->
    <div class="widget-content" style="color: white;background: <?php echo $backGroundColor ?>;">
      <div class='big-label'>
        <b id="liveRevDvalue" style="font-size:68%">
          <?php echo $pba ?>
        </b>
      </div>
    </div> <!-- /widget-content -->
  </div> <!-- /widget -->