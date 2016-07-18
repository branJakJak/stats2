<?php 

/**
* HotkeyTodayRetriever
*/
class HotkeyTodayRetriever extends CComponent
{
	public function init()
	{
	}
	public function getValue()
	{
		$sqlCommand = <<<EOL
			SELECT COUNT(*) as sales  FROM roadto_rich.pbaportal pbaportal where date_time >= curdate() and tonic_account ='HK'
EOL;
		$result = Yii::app()->db->createCommand($sqlCommand)->queryRow();
		return $result['sales'];
	}

}