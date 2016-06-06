<?php 


/**
* LiveRevD
*/
class LiveRevD
{
		public static function getValue($tonic_account = null)
	{
		$dbConnection = Yii::app()->roadtoriches;
		$result = null;
		if (is_null($tonic_account)) {
			$result = $dbConnection->createCommand("SELECT * FROM roadto_rich.pba_leads_today")->queryRow();
		}else{
			$queryObj = $dbConnection->createCommand("SELECT * FROM roadto_rich.pba_leads_today where tonic_account = :tonic_account");
			$queryObj->bindParam(":tonic_account",$tonic_account);
			$result = $queryObj->queryRow();
		}
		if (is_null($result)) {
			throw new Exception("Result is null . Please check database connection or query string");
		}
		$doubleEval = doubleval($result['leads']);
		return round($doubleEval);
		// $curlURL = "http://213.171.204.244/pba.php";
		// $curlres = curl_init($curlURL);
		// curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
		// $curlResRaw = curl_exec($curlres);
		// $curlResRaw = json_decode($curlResRaw,true);
		// return doubleval($curlResRaw["pba_sales"]);
	}
}