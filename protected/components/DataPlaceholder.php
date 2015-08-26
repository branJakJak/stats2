<?php 

/**
* DataPlaceholder
*/
class DataPlaceholder
{
	public static function generateFakeData()
	{
		$data = [];
		$data['waiting'] = 123;
		$data['called'] = 123;
        $data['convertedDeal'] = 16;
        $data['aveHoldTime'] = 132;
        $data['convertedDealCount'] = 100;
        $data['converRate'] = 53;
        $data['tbc'] = 591/$data['convertedDeal'];
        $data['tbc'] = ceil($data['tbc']);
        return $data;
	}
}