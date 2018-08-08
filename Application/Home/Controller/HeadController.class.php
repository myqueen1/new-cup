<?php
/**
 *   @author yanxusheng
 *   @datatime 18-08-07
 *   @content 中央控制器，方非法登录，控制登录
*/
namespace Home\Controller;

use Think\Controller;

class Head
{
	//魔术方法判断是否登录
	public function __construct()
	{
		$this->checkLogin();
	}

	/**
	 *   @param 获取COOKIE 判断是否登录
	*/
	public function checkLogin()
	{
		$user_info = cookie('user');
		
	}
}
?>