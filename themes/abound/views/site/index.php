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
            // jQuery("#managerMessagesContainer").html(data.);
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
    }, 2000);

EOL;
Yii::app()->clientScript->registerScript('refreshContents', $refreshContents, CClientScript::POS_READY);

?>

<style type="text/css">
    .panel-title{
        background-color: yellow;
        text-align: center;
        padding: 20px;
        border: 2px solid black;
        font-weight: bolder;
        margin-bottom: 3px;
    }
    .portlet {
        border: 2px solid black;
        background-color: white;
    }
    .portlet-outer-container{
      border: 2px solid black;
      min-height: 101px;
    }
    .portlet-inner-container{
      margin: 30px 41px;
      font-size: 49px;
      border: 2px solid black;
      padding: 19px;
      line-height: 33px;
      text-align: center;        
      padding: 44px 0px;
    }
    .background-yellow {
        background-color: yellow;
    }
    .background-green {
        background-color: green;
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
    .manager-message-content{
        padding: 30px;
        font-size: 20px;
        line-height: 26px;
        color: red;
        text-align:center;
        padding-top: 52px;
    }
    b{
        color: black;
    }
</style>


<div class="row">

<div style="padding-top: 63px;">
      <div class="span4">
        <h1 class='panel-title'  style="font-size: 27px">Live - Waiting Call</h1>
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                ));
            ?>
            <div class="portlet-outer-container">
                <div class="portlet-inner-container background-yellow" style="  font-size: 95px;">
                    <b id='liveWaitingCallContainer'>
                        <?php echo $waiting ?>
                    </b>
                </div>
            </div>
            <?php
                $this->endWidget();
            ?>
      </div>
      <div class="span4">
         <h1 class='panel-title'  style="font-size: 27px">Converted Deals</h1>
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                ));
            ?>
            <div class="portlet-outer-container  background-green">
                <div class="portlet-inner-container background-white"  style="  font-size: 95px;">
                    <b id="convertedDealCountContainer"><?php echo $convertedDealCount ?></b>
                </div>
            </div>

            <?php
                $this->endWidget();
            ?>

      </div>
      <div class="span4">
         <h1 class='panel-title'  style="font-size: 27px">Contact Rate</h1>
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                ));
            ?>
            <div class="portlet-outer-container background-aqua-blue">
                <div class="portlet-inner-container background-white"  style="  font-size: 95px;">
                    <b id="contactRateContainer"><?php echo $converRate ?></b>
                </div>
            </div>

            <?php
                $this->endWidget();
            ?>

      </div>
      <div class="span4">
         <h1 class='panel-title ' style="font-size: 27px">Average in Hold Time(mins)</h1>
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                ));
            ?>
            <div class="portlet-outer-container  background-yellow">
                <div class="portlet-inner-container  background-green" >
                    <b id="averageHoldTimeContainer">
                    <?php echo number_format($averageHoldTime,2) ?>
                    </b>
                </div>
            </div>

            <?php
                $this->endWidget();
            ?>

      </div>
      <div class="span4">
         <h1 class='panel-title'  style="font-size: 27px">Converted Deal Value &pound;</h1>
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                ));
            ?>
            <div class="portlet-outer-container  background-green">
                <div class="portlet-inner-container  background-green" >
                    <b id="convertedDealValue">
                        &pound;
                        <?php echo number_format($convertedDeal,2) ?>
                    </b>
                </div>
            </div>

            <?php
                $this->endWidget();
            ?>

      </div>
      <div class="span4">
         <h1 class='panel-title '  style="font-size: 27px">Managers Messages</h1>

            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'htmlOptions'=>array('class'=>'background-navy-blue')
                ));
            ?>
            <div class="portlet-outer-container background-white manager-message-content" style="">
                    <b id="managerMessagesContainer">Priority Client is £69 on Leads Base</b>
            </div>


             
            <?php
                $this->endWidget();
            ?>

      </div>
</div>

</div>