<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$diallableFetcher = new DiallableFetcherUrl();
		$liveAVal = $diallableFetcher->getByCampaignId("LIVEA");
		$livePbaValue = Yii::app()->pbaRetriever->getData();
		// $livePbaValue = $diallableFetcher->getByCampaignId("PBA");
        $revDValue = LiveRevD::getValue();
        $revPValue = LiveRevP::getValue();
		$pba_cc001 = LiveRevD::getValue("cc001");
		$pba_cc002 = LiveRevD::getValue("cc002");
        

        if (Yii::app()->request->isAjaxRequest) {
        	$data['livePbaValue'] = $livePbaValue;
        	$data['pba'] = $revDValue;
        	$data['pba_cc001'] = $pba_cc001;
        	$data['pba_cc002'] = $pba_cc002;
        	$data['revPVal'] = $revPValue;
        	$data['liveAVal'] = $liveAVal;
        	$data['piTarget'] = number_format(   ( $revPValue / 1500 * 100 ), 0) .' %';
        	$data['pbaTarget'] = number_format(  ($revDValue / 40 * 100)  ,0).' %';
            echo json_encode($data);
            Yii::app()->end();
        }
		$this->render('newui',array(
                'livePbaValue'=>$livePbaValue,
                'pba'=>$revDValue,
		    	'pba_cc001' => $pba_cc001,
		    	'pba_cc002' => $pba_cc002,
                'revPVal'=>$revPValue,
                "liveAVal"=>$liveAVal,
                'piTarget'=>number_format(  ( $revPValue / 1500 * 100 )   , 0) ,
                'pbaTarget'=>number_format( ( $revDValue / 40 * 100 )  ,0),
			));
	}
	public function actionNewui()
	{
		$data = DataPlaceholder::generateFakeData();
		$livePbaValue = rand(0, 99);
		$revDValue = rand(0, 99);
		$revPValue = rand(0, 99);
		$liveAVal = rand(0, 99);
		$piTarget = rand(0, 99);
		$pbaTarget = rand(0, 99);

        if (Yii::app()->request->isAjaxRequest) {
        	$data['livePbaValue'] = $livePbaValue;
        	$data['pba'] = $revDValue;
        	$data['revPVal'] = $revPValue;
        	$data['liveAVal'] = $liveAVal;
        	$data['piTarget'] = $piTarget. ' %'; 
        	$data['pbaTarget'] = $pbaTarget. ' %'; 
            echo json_encode($data);
            Yii::app()->end();
        }
		$this->render('newui',array(
                'livePbaValue'=>$livePbaValue,
                'pba'=>$revDValue,
                'revPVal'=>$revPValue,
                "liveAVal"=>$liveAVal,
                'piTarget'=>$piTarget,
                'pbaTarget'=>$pbaTarget,
			));
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}