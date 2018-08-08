<?php
/**
 * 说    明:
 * 创建用户: 马燕
 * 创建日期: 2018/8/2
 * 创建时间: 9:19
 */

namespace Home\Controller;

use Think\Controller;

class SendController extends Controller
{
	private static $message = [];

	public function SendMessage(){
		//接收手机号
		$telphone=I('get.telphone');
		//判断手机号唯一性
		$user_model = D('user');
		$result = $user_model->where("user_tel = '$telphone'")->find();

		if ($result) {
			self::$message['status'] = '404';
			self::$message['msg'] = '手机号已存在，请直接登陆!';

			echo json_encode(self::$message,JSON_UNESCAPED_UNICODE);die;
		} else {
			//生成验证码
			$code=rand(99999,999999);	
			//调用存储session信息方法,存储验证码
			echo $this->storage($code);
		}
	}


	//存储session信息
	public function storage($code){
		//判断验证码是否为纯数字
		if(is_numeric($code)){
			
			if (!session('?code')) {
				session('code',$code);
			}else{
				$code = session('code');
			}

			self::$message['status'] = '200';
			self::$message['msg'] = '短信验证码发送成功!'.$code;
		}else{
			self::$message['status'] = '404';
			self::$message['msg'] = '系统出错请稍后重试!';
		}
		return json_encode(self::$message,JSON_UNESCAPED_UNICODE);
	}

	public function Verification(){
		$code = I('get.code');
		$session_code = session('code');

		if ($code == $session_code) {
			$this->ajaxReturn(1);
		} else {
			$this->ajaxReturn(0);
		}
	}
}