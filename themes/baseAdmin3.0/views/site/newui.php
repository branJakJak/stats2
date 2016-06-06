<?php
   /* @var $this SiteController */
   $this->pageTitle=Yii::app()->name;
   $baseUrl = Yii::app()->theme->baseUrl; 

$refreshContents = <<<EOL
    setInterval(function () {
      refreshContents();
    }, (5 * 60 ) * 1000);

EOL;
Yii::app()->clientScript->registerScript('refreshContents', $refreshContents, CClientScript::POS_READY);

?>
<script type="text/javascript">
    function refreshContents() {
        jQuery.ajax({
          url: window.location.href,
          type: 'POST',
          dataType: 'json',
          success: function(data, textStatus, xhr) {
            //called when successful
            // jQuery("#liveDContainer").html(data.liveD);
            // var backgroundColorLiveD = '';
            // var colorLiveD = '';
            // if (data.liveD >=0 && data.liveD <= 5.99) {
            //   backgroundColorLiveD = "red";
            //   colorLiveD = 'white';
            // }else if (data.liveD >=6 && data.liveD <= 9.99) {
            //   backgroundColorLiveD = "#FFBF00";
            //   colorLiveD = 'white';
            // }else if (data.liveD >=10) {
            //   backgroundColorLiveD = "#5FFB17";
            //   colorLiveD = 'black';
            // }
            // jQuery("#liveDContainer").parent().parent().css({
            //   "background-color":backgroundColorLiveD,
            //   "color":colorLiveD
            // })

            /*Live A*/
            jQuery("#liveWaitingCallContainer").html(data.liveAVal);
            
            /*PBA*/
            jQuery("#liveRevDvalue").html(data.pba);
            /*PBA - pba_cc001*/
            jQuery("#pba_cc001").html(data.pba_cc001);
            /*PBA - pba_cc002*/
            jQuery("#pba_cc002").html(data.pba_cc002);

            /* PI Target*/
            var tempPiTargetContainer = parseFloat(data.piTarget);
            if (tempPiTargetContainer >= 100) {
              jQuery("#piTarget").parent().parent().css("background","#8FC800");
            }else{
              jQuery("#piTarget").parent().parent().css("background","red");
            }
            jQuery("#piTarget").html(data.piTarget);



            /* PBA Target*/
            jQuery("#pbaTarget").html(data.pbaTarget);

            /*Live PBA VAlue*/
            jQuery("#livePbaPvalue").html(data.livePbaValue);

            // jQuery("#liveRevDvalue").html(data.pba);
            // var liveRevDvalueBg = "";
            // var liveRevDvalueColor = "";
            // if (data.liveRevDvalue >=0 && data.liveRevDvalue <= 23.99) {
            //     liveRevDvalueBg = "red";
            //     liveRevDvalueColor = "white";
            // }else if (data.liveRevDvalue >= 24 && data.liveRevDvalue <= 39.99) {
            //     liveRevDvalueBg = "#FFBF00";
            //     liveRevDvalueColor = "white";
            // }else if (data.liveRevDvalue >= 40) {
            //     liveRevDvalueBg = "#5FFB17";
            //     liveRevDvalueColor = "white";
            // }
            // jQuery("#liveRevDvalue").parent().parent().css({
            //   "background-color":liveRevDvalueBg,
            //   "color":liveRevDvalueColor
            // });


            jQuery("#liveRevPvalue").html(data.revPVal);
            var liveRevPvalueBg = "";
            var liveRevPvalueColor = "";
            if (data.revPVal >= 1500) {
                liveRevPvalueColor = "black";
                liveRevPvalueBg = "#5FFB17";
            }else if (data.revPVal < 1500) {
                liveRevPvalueColor= "white";
                liveRevPvalueBg = "red";
            }
            jQuery("#liveRevPvalue").parent().parent().css({
              "background-color":liveRevPvalueBg,
              "color":liveRevPvalueColor
            });

            console.log(data);
          },
          error: function(xhr, textStatus, errorThrown) {
            //called when there is an error
            console.log(xhr);
            console.log(textStatus);
            console.log(errorThrown);
          }
        });
    }
</script>



<style type="text/css">
  b{
    text-align: center;
    display: block;
    padding: 50px 0px;
  }
    .background-yellow {
        background-color: yellow;
    }
    #convertedDealCountContainerOute {
      background: #8fc800; /* Old browsers */
      background: -moz-linear-gradient(top, #8fc800 0%, #8fc800 100%); /* FF3.6+ */
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#8fc800), color-stop(100%,#8fc800)); /* Chrome,Safari4+ */
      background: -webkit-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Chrome10+,Safari5.1+ */
      background: -o-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Opera 11.10+ */
      background: -ms-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* IE10+ */
      background: linear-gradient(to bottom, #8fc800 0%,#8fc800 100%); /* W3C */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fc800', endColorstr='#8fc800',GradientType=0 ); /* IE6-9 */    
    }
    .background-white {
        background-color: white;
    }
    .background-aqua-blue {
        background-color: #00ABEA;
    }
    .background-navy-blue {
        background-color: #000090;
    }  
    .widget .widget-content {
      min-height: 233px;
      border-radius: 0px 0px 55px 55px;
    }
    .min-widget  .min-widget-content {
      min-height: 133px;
      border-radius: 0px 0px 55px 55px;      
    }
    .min-widget-header{
      height:auto !important;
      border-bottom: 5px solid black;
      text-align: center !important;
      padding: 10px 0px;
      font-size: 30px;
      border-radius: 55px 55px 0px 0px;
    }    
    .big-label{
      font-size: 150px;
      padding-top:20px;
    }
    .mid-label{
      font-size: 50px;
      padding-top:20px;
    }
    .min-label{
      font-size: 50px;
      padding-top:20px;
    }
    .widget-header{
      height:auto !important;
      border-bottom: 5px solid black;
      text-align: center !important;
      padding: 10px 0px;
      font-size: 30px;
      border-radius: 55px 55px 0px 0px;
    }
    .side-label-container{
      border: 7px solid white;
      background-color: #000080;
      color: white;
      border-radius: 17px;
      text-align: center;
      margin-bottom: 22px;   
      min-height:133px;   
    }
    .side-label-divider{
      border-right: 1px solid #808080;
    }
    .side-label-container label {
      font-family: 'Open Sans';
      font-size: 40px;
      font-style: normal;
      font-variant: normal;
      font-weight: bolder;
      padding: 32px 1px;
      vertical-align: middle;
      line-height: 31px;
    }
    .side-label-container label.value{
      font-size: 54px;
    }

</style>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      <div class="col-md-4 col-lg-4">
        <div class="widget ">
          <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
            LIVEA
          </div> <!-- /widget-header -->
          <div class="widget-content" style="background-color: yellow;">
            <div class='big-label'>
              <b class='fit-to-parent' id="liveWaitingCallContainer" style="font-size: 77%;color: black;">
                <?php echo $liveAVal ?>
              </b>
            </div>
          </div> <!-- /widget-content -->
        </div> <!-- /widget --> 
      </div>


      <div class="col-md-4 col-lg-4">
        <?php
          $this->renderPartial('_rev_p', compact('revPVal')); 
        ?>
      </div>



      <div class="col-md-4 col-lg-4">

        <?php  
          $this->renderPartial('_pi_target', compact('piTarget'));
        ?>

      </div>
    </div>
  </div>
  <hr>


  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-md-4 col-lg-4">
        <?php
          $this->renderPartial('_live_pba', compact('livePbaValue')); 
        ?>
      </div>
      <div class="col-md-4 col-lg-4">
        <?php $this->renderPartial('_pba', compact('pba','pba_cc001','pba_cc002')); ?>
      </div>

      <div class="col-md-4 col-lg-4">
        <div class="widget ">
          <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
            PBA % Target
          </div> <!-- /widget-header -->
          <div class="widget-content" style="background-color: red;color:white !important">
            <div class='big-label'>
              <b id="pbaTarget" style="font-size:50%">
                <?php echo $pbaTarget ?> %
              </b>
            </div>
          </div> <!-- /widget-content -->
        </div> <!-- /widget -->
      </div>

    </div>
  </div>



</div> <!-- /container -->


<script type="text/javascript">
  refreshContents();
</script>