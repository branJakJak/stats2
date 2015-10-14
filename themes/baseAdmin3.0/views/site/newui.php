<?php
   /* @var $this SiteController */
   $this->pageTitle=Yii::app()->name;
   $baseUrl = Yii::app()->theme->baseUrl; 

$refreshContents = <<<EOL
    function refreshContents() {
        jQuery.ajax({
          url: '/site/index',
          type: 'POST',
          dataType: 'json',
          success: function(data, textStatus, xhr) {
            //called when successful
            jQuery("#liveWaitingCallContainer").html(data.waiting);
            jQuery("#convertedDealCountContainer").html(data.convertedDealCount);
            jQuery("#contactRateContainer").html(data.converRate);
            jQuery("#averageHoldTimeContainer").html(data.aveHoldTime);
            jQuery("#convertedDealValue").html(data.convertedDeal);
            jQuery("#managerMessagesContainer").html(data.tbc);
            jQuery("#totalLeads").html(data.leads);
            jQuery("#totalHumanContact").html(data.contacted);
            tmpConvertedDealRaw = parseFloat(data.convertedDealRaw);
            if (tmpConvertedDealRaw >= 4347) {
              jQuery("#content > div > div > div:nth-child(2) > div:nth-child(2) > div.widget-content").css("background-color","green");
            }else{
              jQuery("#content > div > div > div:nth-child(2) > div:nth-child(2) > div.widget-content").css("background-color","red");
            }
            jQuery("#liveRevDvalue").html("&pound; "+data.liveRevDvalue);
            jQuery("#liveRevPvalue").html("&pound; "+data.liveRevPvalue);
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
    setInterval(function () {
      refreshContents();
    }, (5 * 60) * 1000);

EOL;
Yii::app()->clientScript->registerScript('refreshContents', $refreshContents, CClientScript::POS_READY);



?>
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

/*Finally they want to take out the fucking glossy design*/
/*    .widget-content:after{
      content: " ";
      display: block;
      background-color: white;
      height: 64px;
      width: 366px;
      border-radius: 0px;
      position: relative;
      top: 0px;
      z-index: 0;
      opacity: 0.2;
      margin-bottom: -36px;
      left: -16px;      
      border-radius: 0px 0px 55px 55px;
    }
*/
</style>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-md-6 col-lg-6">
        <div class="widget ">
          <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
            Live - Waiting Call
          </div> <!-- /widget-header -->
          <div class="widget-content" style="background-color: yellow;;">
            <div class='big-label'>
              <b class='fit-to-parent' id="liveWaitingCallContainer" style="font-size: 87%;color: black;"><?php echo $waiting ?></b>
            </div>
          </div> <!-- /widget-content -->
        </div> <!-- /widget --> 
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="widget ">
          <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
            Converted Deals
          </div> <!-- /widget-header -->
          <div class="widget-content" style=" color: white;background: #8fc800; /* Old browsers */        background: -moz-linear-gradient(top, #8fc800 0%, #8fc800 100%); /* FF3.6+ */        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#8fc800), color-stop(100%,#8fc800)); /* Chrome,Safari4+ */        background: -webkit-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Chrome10+,Safari5.1+ */        background: -o-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Opera 11.10+ */        background: -ms-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* IE10+ */        background: linear-gradient(to bottom, #8fc800 0%,#8fc800 100%); /* W3C */        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fc800', endColorstr='#8fc800',GradientType=0 ); /* IE6-9 */;">
            <div class='big-label'>
              <b id="convertedDealCountContainer" style="font-size:87%"><?php echo $convertedDealCount ?></b>
            </div>
          </div> <!-- /widget-content -->
        </div> <!-- /widget -->
      </div>
    </div>
  </div>
  <hr>
  <div class="row hidden">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-md-10 col-lg-10 col-lg-offset-1">
        <div class="widget ">
          <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
            Value &pound;
          </div> <!-- /widget-header -->


          <?php if ($convertedDeal >= 4347 ): ?>
            <div class="widget-content" style=" color: white;background: #8fc800; /* Old browsers */        background: -moz-linear-gradient(top, #8fc800 0%, #8fc800 100%); /* FF3.6+ */        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#8fc800), color-stop(100%,#8fc800)); /* Chrome,Safari4+ */        background: -webkit-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Chrome10+,Safari5.1+ */        background: -o-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Opera 11.10+ */        background: -ms-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* IE10+ */        background: linear-gradient(to bottom, #8fc800 0%,#8fc800 100%); /* W3C */        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fc800', endColorstr='#8fc800',GradientType=0 ); /* IE6-9 */;">
          <?php endif ?>
          <?php if ($convertedDeal < 4347 ): ?>
            <div class="widget-content " style=" color: white;background: #ff1a00; /* Old browsers */  background: -moz-linear-gradient(top, #ff1a00 0%, #ff1a00 100%); /* FF3.6+ */  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff1a00), color-stop(100%,#ff1a00)); /* Chrome,Safari4+ */  background: -webkit-linear-gradient(top, #ff1a00 0%,#ff1a00 100%); /* Chrome10+,Safari5.1+ */  background: -o-linear-gradient(top, #ff1a00 0%,#ff1a00 100%); /* Opera 11.10+ */  background: -ms-linear-gradient(top, #ff1a00 0%,#ff1a00 100%); /* IE10+ */  background: linear-gradient(to bottom, #ff1a00 0%,#ff1a00 100%); /* W3C */  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff1a00', endColorstr='#ff1a00',GradientType=0 ); /* IE6-9 */;">
          <?php endif ?>
              <div class='big-label' >
                <b id="convertedDealValue" style="font-size: 87%;">
                  &pound; <?php echo number_format($convertedDeal) ?>
                </b>
              </div>
            </div> <!-- /widget-content -->





          </div> <!-- /widget -->

      </div>
      
    </div>
  </div>

  <div class="row hidden">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-md-4 col-lg-4">
        <div class="widget ">
          <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
            <!-- <i class="icon-signal"></i> -->
            Contact Rate
          </div> <!-- /widget-header -->
          <div class="widget-content"  style='background: #4f85bb; /* Old browsers */  background: -moz-linear-gradient(top, #4f85bb 0%, #4f85bb 100%); /* FF3.6+ */  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#4f85bb), color-stop(100%,#4f85bb)); /* Chrome,Safari4+ */  background: -webkit-linear-gradient(top, #4f85bb 0%,#4f85bb 100%); /* Chrome10+,Safari5.1+ */  background: -o-linear-gradient(top, #4f85bb 0%,#4f85bb 100%); /* Opera 11.10+ */  background: -ms-linear-gradient(top, #4f85bb 0%,#4f85bb 100%); /* IE10+ */  background: linear-gradient(to bottom, #4f85bb 0%,#4f85bb 100%); /* W3C */  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4f85bb', endColorstr='#4f85bb',GradientType=0 ); /* IE6-9 */;  '>
            <div style='font-size: 100px;padding-top:20px;'>
              <!-- <b id="contactRateContainer" style="font-size: 117px;color: white;"><?php echo $converRate ?></b> -->
            </div>
          </div> <!-- /widget-content -->
        </div> <!-- /widget -->
      </div>
      <div class="col-md-4 col-lg-4">
        <div class="widget ">
          <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
            <!-- <i class="icon-signal"></i> -->
            TBC <!-- (<?php echo $convertedDealCount ?> / <?php echo $orig_tbc ?>) -->
          </div> <!-- /widget-header -->
          
          <div class="widget-content" style="background-color: #000090;color: white;">
            <div class='big-label'>
              <b id="" style="font-size: 80px;">
                
              </b>
            </div>
          </div> <!-- /widget-content -->
        </div> <!-- /widget -->
      </div>
      <div class="col-md-4 col-lg-4">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-md-6 col-lg-6">
        <div class="widget ">
          <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
            REV P
          </div> <!-- /widget-header -->





          <?php if ($convertedDeal >= 4347 ): ?>
            <div class="widget-content" style=" color: white;background: #8fc800; /* Old browsers */        background: -moz-linear-gradient(top, #8fc800 0%, #8fc800 100%); /* FF3.6+ */        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#8fc800), color-stop(100%,#8fc800)); /* Chrome,Safari4+ */        background: -webkit-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Chrome10+,Safari5.1+ */        background: -o-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* Opera 11.10+ */        background: -ms-linear-gradient(top, #8fc800 0%,#8fc800 100%); /* IE10+ */        background: linear-gradient(to bottom, #8fc800 0%,#8fc800 100%); /* W3C */        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8fc800', endColorstr='#8fc800',GradientType=0 ); /* IE6-9 */;">
          <?php endif ?>
          <?php if ($convertedDeal < 4347 ): ?>
            <div class="widget-content " style=" color: white;background: #ff1a00; /* Old browsers */  background: -moz-linear-gradient(top, #ff1a00 0%, #ff1a00 100%); /* FF3.6+ */  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff1a00), color-stop(100%,#ff1a00)); /* Chrome,Safari4+ */  background: -webkit-linear-gradient(top, #ff1a00 0%,#ff1a00 100%); /* Chrome10+,Safari5.1+ */  background: -o-linear-gradient(top, #ff1a00 0%,#ff1a00 100%); /* Opera 11.10+ */  background: -ms-linear-gradient(top, #ff1a00 0%,#ff1a00 100%); /* IE10+ */  background: linear-gradient(to bottom, #ff1a00 0%,#ff1a00 100%); /* W3C */  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff1a00', endColorstr='#ff1a00',GradientType=0 ); /* IE6-9 */;">
          <?php endif ?>
              <div class='big-label' >
                <b id="convertedDealValue" style="font-size: 87%;">
                  &pound; <?php echo $revPVal ?>
                </b>
              </div>
            </div> <!-- /widget-content -->






      </div> <!-- /widget --> 
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="widget ">
          <div class="widget-header" style='border-radius: 55px 55px 0px 0px;'>
            REV D
          </div> <!-- /widget-header -->
          <div class="widget-content" style="color: white;background: darkblue;">
            <div class='big-label'>
              <b id="liveRevDvalue" style="font-size:68%">
                &pound; <?php echo $revDVal ?>
              </b>
            </div>
          </div> <!-- /widget-content -->
        </div> <!-- /widget -->
      </div>
    </div>
  </div>



</div> <!-- /container -->
