<?php 

/**
* LiveRevP
*/
class LiveRevP
{
	public static function getValue()
	{
		$dbConnection = Yii::app()->roadtoriches;
		$result = $dbConnection->createCommand("SELECT * FROM roadto_rich.debt_apporved_today")->queryRow();
		return $result['total'];
	}
}