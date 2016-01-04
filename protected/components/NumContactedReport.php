<?php 
/**
* NumContactedReport
*/
class NumContactedReport
{
	public static function getNumberContact()
	{
        $curlURL = "http://149.202.73.207/numContacted.php";
        $curlres = curl_init($curlURL);
        curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
        $curlResRaw = curl_exec($curlres);
        $tempArr = json_decode($curlResRaw, true);
        return doubleval($tempArr["numContacted"]);
	}	

}