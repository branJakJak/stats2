<?php 
/**
* HotkeyWeekRetriever
*/
class HotkeyWeekRetriever extends CComponent
{
	public function init()
	{
		
	}
	public function getValue()
	{
		$sqlCommand = <<<EOL
		SELECT ifnull(COUNT(*),0) as sales  FROM roadto_rich.pbaportal pbaportal where week(date_time,1) = week(NOW()) and tonic_account in('cc001','cc002')
EOL;
		$res = Yii::app()->roadtoriches->createCommand($sqlCommand)->queryRow();
		return $res['sales'];
	}
}