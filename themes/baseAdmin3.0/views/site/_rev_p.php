<?php 
$applyStyle = "";
if ($revPVal >= 1500 ) {
  $applyStyle ="color: black;background: #5FFB17; /* Old browsers */        background: -moz-linear-gradient(top, #8fc800 0%, #8fc800 100%); /* FF3.6+ */        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#8fc800), color-stop(100%,#8fc800)); /* Chrome,Safari4+ */        background: -webkit-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Chrome10+,Safari5.1+ */        background: -o-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Opera 11.10+ */        background: -ms-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* IE10+ */        background: linear-gradient(to bottom, #8fc800 0%,#8fc800 100%); /* W3C */        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fc800', endColorstr='#8fc800',GradientType=0 ); /* IE6-9 */;";
}else if ($revPVal < 1500) {
  $applyStyle = "color: white;background: red; /* Old browsers */  background: -moz-linear-gradient(top, #ff1a00 0%, #ff1a00 100%); /* FF3.6+ */  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff1a00), color-stop(100%,#ff1a00)); /* Chrome,Safari4+ */  background: -webkit-linear-gradient(top, #ff1a00 0%,#ff1a00 100%); /* Chrome10+,Safari5.1+ */  background: -o-linear-gradient(top, #ff1a00 0%,#ff1a00 100%); /* Opera 11.10+ */  background: -ms-linear-gradient(top, #ff1a00 0%,#ff1a00 100%); /* IE10+ */  background: linear-gradient(to bottom, #ff1a00 0%,#ff1a00 100%); /* W3C */  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff1a00', endColorstr='#ff1a00',GradientType=0 ); /* IE6-9 */;";
}

?>

<div class="widget ">
  <!-- widget header -->
  <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
    REV P &pound; 
  </div> 
  <!-- /widget-header -->

  <!-- widget content -->
  <div class="widget-content" style="<?php echo $applyStyle ?>">
    <div class='big-label' >
      <b id="liveRevPvalue" style="font-size: 68%;">
        <?php echo $revPVal ?>
      </b>
    </div>
  </div> 
  <!-- /widget-content -->
  
</div> <!-- /widget --> 