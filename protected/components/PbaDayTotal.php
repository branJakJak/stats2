<?php 

/**
* PbaDayTotal
*/
class PbaDayTotal extends CComponent
{
	public function init()
	{
		
	}
	public function getValue()
	{
		$sqlCommand = <<<EOL
			SELECT * FROM roadto_rich.day_pba_total
EOL;
		$result = Yii::app()->roadtoriches->createCommand($sqlCommand)->queryRow();
		return $result['sales'];
	}}