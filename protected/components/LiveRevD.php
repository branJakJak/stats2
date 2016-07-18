<?php 
/**
* LiveRevD
*/
class LiveRevD
{
	public static function getValue($tonic_account = null)
	{
		$dbConnection = Yii::app()->roadtoriches;
		$result = null;
		if (is_null($tonic_account)) {
			$sqlCommand = <<<EOL
    SELECT 
        COUNT(`roadto_rich`.`pbaportal`.`status`) AS `leads`
    FROM
        `roadto_rich`.`pbaportal`
    WHERE
        (
        	(`roadto_rich`.`pbaportal`.`date_time` >= CURDATE())
            AND 
            (`roadto_rich`.`pbaportal`.`status` IN ('Lead' , 'Packback', 'Esign'))
        )
EOL;
			$result = $dbConnection->createCommand($sqlCommand)->queryRow();
		}else{
			$sqlCommand = <<<EOL
    SELECT 
        COUNT(`roadto_rich`.`pbaportal`.`status`) AS `leads`
    FROM
        `roadto_rich`.`pbaportal`
    WHERE
        (
        	(`roadto_rich`.`pbaportal`.`date_time` >= CURDATE())
            AND 
            (`roadto_rich`.`pbaportal`.`status` IN ('Lead' , 'Packback', 'Esign'))
            AND
			(`roadto_rich`.`pbaportal`.`tonic_account` = :tonic_account)
        )
EOL;
			$queryObj = $dbConnection->createCommand($sqlCommand);
			$queryObj->bindParam(":tonic_account",$tonic_account);
			$result = $queryObj->queryRow();
		}
		if (is_null($result)) {
			throw new Exception("Result is null . Please check database connection or query string");
		}
		$doubleEval = doubleval($result['leads']);
		return round($doubleEval);
	}
}