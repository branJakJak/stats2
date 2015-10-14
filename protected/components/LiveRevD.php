<?php 


/**
* LiveRevD
*/
class LiveRevD
{
	
	public static function getValue()
	{
		$dbConnection = Yii::app()->roadtoriches;
		$result = $dbConnection->createCommand("SELECT * FROM roadto_rich.debt_apporved_today")->queryRow();
		$doubleEval = doubleval($result['total']);
		return number_format($doubleEval,2);
	}
}