<?php 

/**
* DataPlaceholder
*/
class DataPlaceholder
{
	public static function generateFakeData()
	{
		$data = [];
		$data['waiting'] = rand(100,150);
		$data['called'] = rand(100,150);
                $data['convertedDeal'] = rand(15,50);
                $data['aveHoldTime'] = rand(320,500);
                $data['convertedDealCount'] = rand(80,150);
                $data['converRate'] = rand(53,120);
                $data['orig_tbc'] = rand(180,500);
                $data['tbc'] = $data['orig_tbc']/$data['convertedDeal'];
                $data['tbc'] = round($data['tbc'],2) .' %';
                return $data;
	}
}