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
		SELECT COUNT(*) as sales  FROM roadto_rich.pbaportal pbaportal where week(date_time,1) = week(NOW()) and tonic_account ='HK'
EOL;
		$res = Yii::app()->roadtoriches->createCommand($sqlCommand)->queryRow();
		return $res['sales'];
	}
}