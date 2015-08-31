<?php
class AverageContactRate {
    public static function getAverage()
    {
    	$tempAveWaitTimeContainer = 0;
        $curlURL = "http://213.171.204.244/contactRate.php";
        $curlres = curl_init($curlURL);
        curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
        $curlResRaw = curl_exec($curlres);
        $tempArr = json_decode($curlResRaw, true);
        $tempAveWaitTimeContainer = $tempArr["avgWaitTime"];
        if (is_null($tempArr["avgWaitTime"]) == false) {
        	$tempAveWaitTimeContainer = $tempArr["avgWaitTime"];
        }
        return $tempAveWaitTimeContainer;
    }

}