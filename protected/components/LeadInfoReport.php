<?php




class LeadInfoReport {
    public static function getLiveReport()
    {
        $curlURL = "http://213.171.204.244/leadInfo.php";
        $curlres = curl_init($curlURL);
        curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
        $curlResRaw = curl_exec($curlres);
        $curlResRaw = json_decode($curlResRaw , true);
        return $curlResRaw;
    }
}
