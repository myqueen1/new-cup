<?php
/**
 *   @author yanxusheng
 *   @datatime 18-08-07
*/
namespace Home\Controller;

use Think\Controller;

class ComeController extends Controller
{
	private static $information = [];	//私有静态属性

	/**
	 *   @param $code $msg string 状态码 返回信息
	 *   @return $information array json_encode
	*/
	public static function PutOutMessage($code,$msg)
	{
		if (!empty($code) && !empty($msg)) {
			self::$information['code'] = $code;
			self::$information['msg']  = $msg;
		}
		return json_encode(self::$information,JSON_UNESCAPED_UNICODE);
	}

	/**
	 *   @param null 清除Session信息 可以带条件的
	 *   @return bool true false 
	*/
	public static function KillSession($option=null)
	{
		if (!empty($option)) session($option,null); return true;
		if (empty($option)) return false;
	}
}
?>