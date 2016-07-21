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
		SELECT * FROM roadto_rich.week_hk_total
EOL;
		$res = Yii::app()->roadtoriches->createCommand($sqlCommand)->queryRow();
		return $res['sales'];
	}
}