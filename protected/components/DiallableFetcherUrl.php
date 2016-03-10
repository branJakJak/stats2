<?php 

/**
* 
*/
class DiallableFetcherUrl extends DiallableFetcher
{
	public function getByCampaignId($campaign_id)
	{
		$curlURL = "http://149.202.73.207/getCampaignId.php?campaign_id=$campaign_id";
		$curlres = curl_init($curlURL);
		curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
		$curlResRaw = curl_exec($curlres);
		$curlResRawArr = json_decode($curlResRaw,true);
		return isset($curlResRawArr[0]['dialable_leads']) ? $curlResRawArr[0]['dialable_leads']:0;
	}
}
