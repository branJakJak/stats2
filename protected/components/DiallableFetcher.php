<?php 

/**
* DiallableFetcher
*/
class DiallableFetcher
{
	public function getByCampaignId($campaignId)
	{
		$sqlCommmandStr = "SELECT `dialable_leads`,`campaign_id` FROM vicidial_campaign_stats`asterisk` where `campaign_id` = :campaignId";
		$commandObj = Yii::app()->directDialler->createCommand($sqlCommmandStr);
		$commandObj->bindParam(":campaignId" , $campaignId , PDO::PARAM_STR);
		$result = $commandObj->queryRow();
		return (isset($result['dialable_leads'])) ? $result['dialable_leads']:0;
	}
}