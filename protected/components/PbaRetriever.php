<?php 
/**
* PbaRetriever
*/
class PbaRetriever extends CComponent
{
	public function init()
	{
		
	}
	public function getValue()
	{
		$dbConnection = Yii::app()->roadtoriches;
		$result = null;
		$sqlCommand = <<<EOL
	SELECT * FROM roadto_rich.week_pba_total
EOL;
		$queryObj = $dbConnection->createCommand($sqlCommand);
		$result = $queryObj->queryRow();
		if (is_null($result)) {
			throw new Exception("Result is null . Please check database connection or query string");
		}
		$doubleEval = doubleval($result['sales']);
		return round($doubleEval);
	}
}