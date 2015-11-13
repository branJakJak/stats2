<?php 

/**
* Live D Remote Data
*/
class LiveDRemoteData
{
	public static function getValue(){
		$curlURL = "http://213.171.204.244/liveLeadHopperDm.php";
		$curlres = curl_init($curlURL);
		curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
		$curlResRaw = curl_exec($curlres);
		$dataArr = json_decode($curlResRaw,true);
		$liveDValue = doubleval($dataArr['Live Leads']);
		$liveDValue = $liveDValue / 8;
		return number_format($liveDValue);
	}
}