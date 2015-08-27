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
		$data = LiveCallReport::getLiveReport();
        $data['convertedDeal'] = ConvertedDealReport::getLiveReport();
        $data['convertedDeal'] = ceil($data['convertedDeal']);
        $data['aveHoldTime'] = AverageHoldTimeReport::getAverage();
        $data['convertedDealCount'] = ConvertedDealCount::getAverage();
        $data['converRate'] = AverageContactRate::getAverage();
        $data['converRate']  = $data['converRate'].'%';
        $data['orig_tbc'] = NumContactedReport::getNumberContact();
  	   	$data['tbc'] = round( ($data['convertedDealCount'] / $data['orig_tbc']) * 100,2);
  	   	$data['tbc'] = $data['tbc'].' %';

 
        $tempAveHoldTime = doubleval($data['aveHoldTime']);
        if ($tempAveHoldTime != 0) {
        	/*store to session */
        	Yii::app()->request->cookies['aveHoldTime'] = new CHttpCookie('aveHoldTime', $tempAveHoldTime);
        	// echo "here";
        } else {
        	// echo "here else";
        	$tempAveHoldTime = Yii::app()->request->cookies['aveHoldTime']->value;
        }
        
        $tempAveHoldTime = doubleval($tempAveHoldTime);
        $tempAveHoldTime = ceil($tempAveHoldTime);
        $tempAveHoldTime  = number_format($tempAveHoldTime);

        /* convert to HH:MM */
        // $tempAveHoldTime = round($tempAveHoldTime/60) .':'. ($tempAveHoldTime % 60);

        if (Yii::app()->request->isAjaxRequest) {
        	$data['convertedDealRaw'] = $data['convertedDeal'];
        	$data['convertedDeal'] = "&pound;".number_format(doubleval($data['convertedDeal']));
        	$data["converRate"] = $data['converRate'];
        	$data['aveHoldTime'] = $tempAveHoldTime; //convert and format
        	$data['convertedDealCount'] = empty($data['convertedDealCount']) ? 0:$data['convertedDealCount'];
            echo json_encode($data);
            Yii::app()->end();
        }
		$this->render('index',array(
                'waiting'=>$data['waiting'],
                "called"=>$data['called'],
                "convertedDeal"=>doubleval($data['convertedDeal']),
                "convertedDealCount"=>empty($data['convertedDealCount']) ? 0:$data['convertedDealCount'],
                "converRate"=>$data['converRate'],
                "averageHoldTime"=>$tempAveHoldTime,
                "tbc"=>$data['tbc'],
                "orig_tbc"=>$data['orig_tbc'],
			));
	}

	public function actionNewui()
	{
		$data = DataPlaceholder::generateFakeData();
        $tempAveHoldTime = doubleval($data['aveHoldTime']);
        if ($tempAveHoldTime != 0) {
        	/*store to session */
        	Yii::app()->request->cookies['aveHoldTime'] = new CHttpCookie('aveHoldTime', $tempAveHoldTime);
        	// echo "here";
        } else {
        	// echo "here else";
        	$tempAveHoldTime = Yii::app()->request->cookies['aveHoldTime']->value;
        }
        $tempAveHoldTime = doubleval($tempAveHoldTime);
        $tempAveHoldTime = ceil($tempAveHoldTime);
        $tempAveHoldTime  = number_format($tempAveHoldTime);

        if (Yii::app()->request->isAjaxRequest) {
        	$data['convertedDealRaw'] = $data['convertedDeal'];
        	$data['convertedDeal'] = "&pound;".number_format(doubleval($data['convertedDeal']));
        	$data["converRate"] = $data['converRate'];
        	$data['aveHoldTime'] = $tempAveHoldTime; //convert and format
        	$data['convertedDealCount'] = empty($data['convertedDealCount']) ? 0:$data['convertedDealCount'];
            echo json_encode($data);
            Yii::app()->end();
        }
		$this->render('newui',array(
                'waiting'=>$data['waiting'],
                "called"=>$data['called'],
                "convertedDeal"=>doubleval($data['convertedDeal']),
                "convertedDealCount"=>empty($data['convertedDealCount']) ? 0:$data['convertedDealCount'],
                "converRate"=>$data['converRate'],
                "averageHoldTime"=>$tempAveHoldTime,
                "tbc"=>$data['tbc'],
                "orig_tbc"=>$data['orig_tbc'],
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