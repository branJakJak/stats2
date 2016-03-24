<?php 

/**
* 
*/
class DiallableFetcherUrl extends DiallableFetcher
{
	public function getByCampaignId($campaign_id)
	{
		$tempContainerIdContainer = $campaign_id;
		$dbConnection = Yii::app()->roadtoriches;
		$sqlCommandStr = <<<EOL
		SELECT `dialable_leads`,`campaign_id` FROM `asterisk`.`vicidial_campaign_stats`
		where `campaign_id` = '$campaign_id'
EOL;
		$commandContainer = $dbConnection->createCommand($sqlCommandStr);
		$commandContainer->execute();
		$result = $commandContainer->fetchAll();
		// $curlURL = "http://$serverIp/getCampaignId.php?campaign_id=$campaign_id";
		// $curlres = curl_init($curlURL);
		// curl_setopt($curlres, CURLOPT_RETURNTRANSFER, true);
		// $curlResRaw = curl_exec($curlres);
		return isset($result[0]['dialable_leads']) ? $result[0]['dialable_leads']:0;
	}
}

