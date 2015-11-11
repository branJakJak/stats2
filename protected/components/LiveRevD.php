<?php 


/**
* LiveRevD
*/
class LiveRevD
{
	
	public static function getValue()
	{
		// $dbConnection = Yii::app()->roadtoriches;
		// $result = $dbConnection->createCommand("SELECT * FROM roadto_rich.debt_apporved_today")->queryRow();
		// $doubleEval = doubleval($result['total']);
		// return round($doubleEval);
		$curlURL = "http://213.171.204.244/pba.php";
		$curlres = curl_init($curlURL);
		curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
		$curlResRaw = curl_exec($curlres);
		$curlResRaw = json_decode($curlResRaw,true);
		return doubleval($curlResRaw["pba_sales"]);
	}
}