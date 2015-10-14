<?php 


/**
* LiveRevD
*/
class LiveRevD
{
	
	public static function getValue()
	{
		$dbConnection = Yii::app()->roadtoriches;
		$result = $dbConnection->createCommand("SELECT * FROM roadto_rich.display_pi_today")->queryRow();
		$doubleEval = doubleval($result['Day_Total']);
		return number_format($doubleEval,2);
	}
}