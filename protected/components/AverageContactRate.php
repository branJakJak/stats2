<?php
class AverageContactRate {
    /**
     * Get the average of waiting time
     * @return number The average waiting time
     */
    public static function getAverage()
    {
    	$tempAveWaitTimeContainer = 0;
        $curlURL = "http://149.202.73.207/contactRate.php";
        $curlres = curl_init($curlURL);
        curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
        $curlResRaw = curl_exec($curlres);
        $tempArr = json_decode($curlResRaw, true);
        $tempAveWaitTimeContainer = $tempArr["avgWaitTime"];
        if ($tempArr["avgWaitTime"] != 'null') {
        	$tempAveWaitTimeContainer = $tempArr["avgWaitTime"];
        }
        return $tempAveWaitTimeContainer;
    }

}