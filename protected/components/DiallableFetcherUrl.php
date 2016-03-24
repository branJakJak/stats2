<?php 

/**
* 
*/
class DiallableFetcherUrl extends DiallableFetcher
{
	public function getByCampaignId($campaign_id)
	{
		//81.138.138.57
		$serverIp = Yii::app()->params['VICI_SERVER_IP'];
		$curlURL = "http://$serverIp/getCampaignId.php?campaign_id=$campaign_id";
		$curlres = curl_init($curlURL);
		curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
		$curlResRaw = curl_exec($curlres);
		$curlResRawArr = json_decode($curlResRaw,true);
		return isset($curlResRawArr[0]['dialable_leads']) ? $curlResRawArr[0]['dialable_leads']:0;
	}
}
