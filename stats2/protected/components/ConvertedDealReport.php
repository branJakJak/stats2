<?php 
/**
* ConvertedDealReport
*/
class ConvertedDealReport
{

	public static function getLiveReport()
	{
		$curlURL = "http://roadtoriches.co.uk/convertedDeal.php";
		$curlres = curl_init($curlURL);
		curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
		$curlResRaw = curl_exec($curlres);
		return $curlResRaw;
	}

}