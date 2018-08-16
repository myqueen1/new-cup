<?php 

class Order
{

	//获取订单配送状态
	public function getStatusText($orderRow)
	{
		if($orderRow['order_status'] == 3)
		{
			return '等待收货';
		}
		else if($orderRow['distribution_status'] == 1)
		{
			return '未支付';
		}
		else if($orderRow['distribution_status'] == 0)
		{
			return '订单不完整';
		}
		else if($orderRow['distribution_status'] == 2)
		{
			return '等待发货';
		} else {
			return '订单完成';
		}
	}

	//内容过长
	public function cont($con)
	{
		$str = strlen($con['accept_address']);
		if($str>100){ 
			// $cont['con2'] = substr($con['accept_address'],$str/2);
			// $cont['con1'] = substr($con['accept_address'],0,$str/2);
			return $con['accept_address'];
			// return $cont['con1']."<br \>".$cont['con2']; 
		}else { 
			return $con['accept_address'];
		} 
	}
}

 ?>