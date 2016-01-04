<?php 
/**
* AverageHoldTimeReport
*/
class AverageHoldTimeReport
{
	public static function getAverage()
	{
        $curlURL = "http://149.202.73.207/averageHoldTimeReport.php";
        $curlres = curl_init($curlURL);
        curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
        $curlResRaw = curl_exec($curlres);
        $tempArr = json_decode($curlResRaw, true);
        return $tempArr['average'];
	}
}