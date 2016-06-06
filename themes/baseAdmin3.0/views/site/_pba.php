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
        <b id="liveRevDvalue" style="font-size:68%;display:none">
          <?php echo $pba?>
        </b>
        <div style="font-size: 20px;text-align: center !important;display: block;">CC001</div>
        <b id="pba_cc001" style="font-size:68%">
          <?php echo $pba_cc001?>
        </b>
        <hr>
        <div style="font-size: 20px;text-align: center !important;display: block;">CC002</div>
        <b id="pba_cc002" style="font-size:68%">
          <?php echo $pba_cc002?>
        </b>
      </div>
    </div> <!-- /widget-content -->
  </div> <!-- /widget -->