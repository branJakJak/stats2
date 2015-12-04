<?php
  $baseUrl = Yii::app()->theme->baseUrl; 
  $cs = Yii::app()->getClientScript();
  // Yii::app()->clientScript->registerScriptFile( $baseUrl."/js/libs/jquery-1.9.1.min.js" ,  CClientScript::POS_END);
  Yii::app()->clientScript->registerScriptFile( $baseUrl."/js/libs/jquery-ui-1.10.0.custom.min.js" ,  CClientScript::POS_END);
  Yii::app()->clientScript->registerScriptFile( $baseUrl."/js/libs/bootstrap.min.js" ,  CClientScript::POS_END);
  // Yii::app()->clientScript->registerScriptFile( $baseUrl."/js/plugins/flot/jquery.flot.js" ,  CClientScript::POS_END);
  // Yii::app()->clientScript->registerScriptFile( $baseUrl."/js/plugins/flot/jquery.flot.pie.js" ,  CClientScript::POS_END);
  // Yii::app()->clientScript->registerScriptFile( $baseUrl."/js/plugins/flot/jquery.flot.resize.js" ,  CClientScript::POS_END);
  Yii::app()->clientScript->registerScriptFile( $baseUrl."/js/Application.js" ,  CClientScript::POS_END);
  // Yii::app()->clientScript->registerScriptFile( $baseUrl."/js/charts/area.js" ,  CClientScript::POS_END);
  // Yii::app()->clientScript->registerScriptFile( $baseUrl."/js/charts/donut.js" ,  CClientScript::POS_END);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo Yii::app()->name ?> |  <?php echo Yii::app()->params['description'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    <?php  
      $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
      $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
      $cs->registerCssFile($baseUrl.'/css/font-awesome.min.css');
      $cs->registerCssFile($baseUrl.'/css/ui-lightness/jquery-ui-1.10.0.custom.min.css');
      $cs->registerCssFile($baseUrl.'/css/base-admin-3.css');
      $cs->registerCssFile($baseUrl.'/css/base-admin-3-responsive.css');
      $cs->registerCssFile($baseUrl.'/css/pages/dashboard.css');
      $cs->registerCssFile($baseUrl.'/css/custom.css');
  ?>    
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>
<?php //require_once 'tpl_navigation.php'; ?>


<?php //require_once 'tpl_sub_nav.php'; ?>
<div class="main" style='padding-top: 30px'>

    <?php echo $content ?>
    
</div> <!-- /main -->
    

<?php //require_once 'tpl_pre_footer.php'; ?>

<?php// require_once 'tpl_footer.php'; ?>

    
  </body>
</html>