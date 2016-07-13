<?php 
/**
* PbaRetriever
*/
class PbaRetriever 
{
	public function getData()
	{
		$dbConnection = Yii::app()->roadtoriches;
		$result = null;
		$sqlCommand = <<<EOL
	SELECT COUNT(*) as sales  FROM roadto_rich.pbaportal pbaportal WHERE week(date_time,1) = week(NOW())		
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