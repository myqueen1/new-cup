<?php
/**
 * 创建用户: 马燕
 * 创建日期: 2018/8/2
 */
namespace Home\Controller;

use Think\Controller;

class SendController extends ComeController
{
	/**
	 *   @param $telphone string 接收手机号码,判断唯一性的情况下生成验证码
	 *   @return $result json 
	*/
	public function SendMessage(){
		//接收手机号
		$telphone=I('get.telphone');
		//判断手机号唯一性
		$user_model = D('user');
		$result = $user_model->where("user_tel = '$telphone'")->find();

		if ($result) {
			echo self::PutOutMessage('error','改手机号已注册,请直接登录');
		} else {
			//生成验证码
			$code=rand(99999,999999);	
			//调用存储session信息方法,存储验证码
			echo self::storage($code);
		}
	}

	/**
	 *   @param $code int[6] 将手机验证码存入session
	 *   @return $result json 
	*/
	private static function storage($code){
		if (!session('?telphone_code')) {
			session('telphone_code',$code);
		}else{
			$code = session('telphone_code');
		}
		return self::PutOutMessage('success',"短信验证码发送成功!$code");
	}

	/**
	 *   @param $code $session_code int
	 *   @return 0/1 int 	AJAX请求判断验证码的一致性,返回结果
	*/
	public function Verification(){
		$code = I('get.code');
		$session_code = session('telphone_code');

		if ($code == $session_code) $this->ajaxReturn(1);
		if ($code != $session_code) $this->ajaxReturn(0);
	}
}