<?php 

/**
* Live D Remote Data
*/
class LiveDRemoteData
{
	public static function getValue(){
		//@TODO
		// $dbConnection = Yii::app()->roadtoriches;
		// $result = $dbConnection->createCommand("SELECT * FROM roadto_rich.debt_apporved_today")->queryRow();
		// $doubleEval = doubleval($result['total']);

		return number_format(150.55);
	}
}