<?php
/**
 *   @author yanxusheng
 *   @datatime 18-08-07
 *   @content 中央控制器，方非法登录，控制登录
*/
namespace Home\Controller;

use Think\Controller;

class HeadController extends Controller
{
	private static $information = [];	//私有静态属性

	
	public function __construct()
	{
		parent::__construct();
		$this->checkLogin();		//判断是否登录
	}

	//获取COOKIE 判断是否登录
	public function checkLogin()
	{
		$user_info = cookie('user_info');
		if (empty($user_info)){
			$this->success('亲爱的用户,请先登录然后重试...',U('Login/login'));die;
		}
	}

	/**
	 *   @param $code $msg string 状态码 返回信息
	 *   @return $information array json_encode
	*/
	public static function PutOutMessage($code,$msg)
	{
		if (!empty($code) && !empty($msg)) {
			self::$information['code'] = $code;
			slef::$information['msg']  = $msg;
		}
		return json_encode(self::$information);
	}

	/**
	 *   @params 由于用户ID使用次数较多,单独封装成一个方法
	 *   @param $condition string 条件 [ 可根据条件返回用户的ID 或者 详细信息 ] 
	 *   @return $result array
	*/
	public static function ReturnUserInfo($condition)
	{
		$user_info = json_decode(cookie('user_info'),true);

		if ($condition == 'user_id') {
			return $user_info['user_id'];
		} else if ($condition == 'all') { return $user_info; }
	}
}
?>