<?php 
/**
* PbaWeekLower
*/
class PbaWeekLower extends CComponent
{
	public function init()
	{
	}
	public function getValue()
	{
		$sqlCommand = <<<EOL
			SELECT * FROM roadto_rich.day_hk_total
EOL;
		$result = Yii::app()->roadtoriches->createCommand($sqlCommand)->queryRow();
		return $result['sales'];
	}
}