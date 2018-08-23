<?php
/**
 *   @author yanxusheng
 *   @datatime 18-08-07
*/
namespace Home\Controller;

use Think\Controller;

class LoginController extends ComeController
{
	/**
	 *  @param $user_tel $user_pass string 控制用户登录方法
	 *  @return 0/1 json_encode int 
	*/
	public function login()
    {
         //获取 uid
         $uid = cookie('uid');
		if (IS_POST) {
	        $user_tel  = I('post.user_tel');           //手机号
	        $user_pass = MD5(I('post.user_pass'));     //密码

	        $UserModel = D("user");
	        $result    = $UserModel->field('user_id,user_nickname,user_tel,user_email,head_img')
	                               ->where("user_tel = '".$user_tel."' and user_pass = '".$user_pass."'")
	                               ->find();
                                   //echo json_encode($UserModel->getLastSql());die;
	        //判断返回值 并 存储COOKIE
	        if ($result){

                $db=D('weibo');  //微博
                $data['uid']=$uid;
                $data['user_id']=$result['user_id'];
                $res=$db->add($data);
                cookie('uid',null);
                // var_dump($uid);die;
	            $comeback = $this->SetCookie($result);     //设置COOKIE 
	            echo self::PutOutMessage("success","登录成功请稍后,马上就好.....");
	        }else{
	            echo self::PutOutMessage("error","账号或密码不正确,请核对后重试");
	        }
		} else {
            $user_info = json_decode(cookie('user_info'),true);
			if (empty($user_info)) layout(false);$this->display('login');
            if (!empty($user_info)) echo "<script>JavaScript:history.go(-1)</script>"; 
		}
	}

	/**
     *   @params  清除COOKIE信息  设置COOKIE信息 
    */
    public function SingOut(){
        $user_info = cookie('user_info',null);
    }
    public function SetCookie($user_info){
        if (!empty($user_info)) cookie('user_info',json_encode($user_info));
    }

    /**
     *   @param $telphone $user_pass string
     *   @return 0,1 int 接收手机号以及密码 MD5加密后存入数据库
    */
    public function register()
    {
        if(IS_AJAX) {
            $data['user_tel']  = I('post.tel');
            $data['user_pass'] = MD5(I('post.pass'));
            $data['user_time'] = date('Y-m-d H:i:s',time());

            $user_model = D('user');
            $result = $user_model->add($data);

            if ($result) {
                
                $uid = cookie('uid');
                $db=D('weibo');
                $data['uid']=$uid;
                $data['user_id']=$result['user_id'];
                $res=$db->add($data);
                cookie('uid',null);

                //拼接 储存所必须 id 和手机号
                $arr = array('user_id'=>$result , 'user_tel'=>$data['user_tel']);
                $this->SetCookie($arr);
                if (self::KillSession('telphone_code')){
                    echo self::PutOutMessage("success","注册成功请稍后,马上就好.....");
                } else {
                    echo self::PutOutMessage("error","系统出错,请稍后重试");
                }
            } else {
                echo self::PutOutMessage("error","系统出错,请稍后重试");
            }
        }else{
            $this->display();
        }
    }
}
?>