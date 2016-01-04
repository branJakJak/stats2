<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kevin
 * Date: 7/8/15
 * Time: 8:49 PM
 * To change this template use File | Settings | File Templates.
 */

class LiveCallReport {
    public static function getLiveReport()
    {
        $curlURL = "http://149.202.73.207/liveWaitingCount.php";
        $curlres = curl_init($curlURL);
        curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
        $curlResRaw = curl_exec($curlres);
        $tempContainer = json_decode($curlResRaw, true);
        $tempContainer['waiting'] = doubleval($tempContainer['waiting']);
        $tempContainer['waiting'] = ceil($tempContainer['waiting']);
        return $tempContainer;
    }

}