<?php 

/**
* 
*/
class DiallableFetcherUrl extends DiallableFetcher
{
	public function getByCampaignId($campaign_id)
	{
// 		$tempContainerIdContainer = $campaign_id;
// 		$dbConnection = Yii::app()->directDialler;
// 		$sqlCommandStr = <<<EOL
// 		SELECT `dialable_leads`,`campaign_id` FROM `asterisk`.`vicidial_campaign_stats`
// 		where `campaign_id` = '$campaign_id'
// EOL;
// 		$commandContainer = $dbConnection->createCommand($sqlCommandStr);
// 		$commandContainer->execute();
// 		$result = $commandContainer->fetchAll();
// 		
		$serverIp = Yii::app()->params['VICI_SERVER_IP'];
		$curlURL = "http://$serverIp/getCampaignId.php?campaign_id=$campaign_id";
		$curlres = curl_init($curlURL);
		curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
		$curlResRaw = curl_exec($curlres);
		$curlResRaw = json_decode($curlResRaw,true);
		return isset($curlResRaw[0]['dialable_leads']) ? $curlResRaw[0]['dialable_leads']:0;
		// return isset($result[0]['dialable_leads']) ? $result[0]['dialable_leads']:0;
	}
}

