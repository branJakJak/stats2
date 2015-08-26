<?php 
/**
* NumContactedReport
*/
class NumContactedReport
{
	public static function getNumberContact()
	{
        $curlURL = "http://213.171.204.244/numContacted.php";
        $curlres = curl_init($curlURL);
        curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
        $curlResRaw = curl_exec($curlres);
        $tempArr = json_decode($curlResRaw, true);
        return $tempArr["numContacted"];
	}	

}