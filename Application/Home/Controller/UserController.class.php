<?php
/**
 * 说    明:
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/2
 * 创建时间: 9:19
 */

namespace Home\Controller;

use Think\Controller;

class UserController extends Controller
{
    //注册
    public function register()
    {
        if(IS_AJAX) {
            $data['user_tel']  = I('post.tel');
            $data['user_pass'] = MD5(I('post.pass'));

            $user_model = D('user');
            $result = $user_model->add($data);
            if ($result) {
                //$this->SetCookie();
                $this->ajaxReturn(1);
            } else {
                $this->ajaxReturn(0);
            }
        }else{
            $this->display();
        }
    }

    //登录
    public function login()
    {
        $User = M("user");
        $user_tel  = I('post.user_tel');    //手机号
        $user_pass = I('post.user_pass');   //密码
        $res=$User->where()->find();
        if ($res){
            //返回值int    1：成功   0：失败
            if (empty($_COOKIE)){
                $user=array("$res[user_id]","$res[user_nickname]");
                cookie("user",$user,24*7*3600);

            }else{
                cookie("user",null);
                $user=array("$res[user_id]","$res[user_nickname]");
                cookie("user",$user,24*7*3600);
            }
            echo json_encode("1");
        }else{
            echo json_encode("0");
        }
    }

    //退出
    public function Singout()
    {
        $user=cookie('user',null);
        if(empty($user)){
            $this->success(U('Index/index'),0);
        }
    }


    //存储COOKIE
    public function SetCookie($data){

    }
}