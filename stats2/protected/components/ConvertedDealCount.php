<?php 
/**
* ConvertedDealCount
*/
class ConvertedDealCount
{
	public static function getAverage()
	{
		$curlURL = "http://roadtoriches.co.uk/convertedDealCount.php";
		$curlres = curl_init($curlURL);
		curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
		$curlResRaw = curl_exec($curlres);
		return $curlResRaw;		
	}	

}