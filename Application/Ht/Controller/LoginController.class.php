<?php
/**
 * 说    明: 管理员 登入
 * 创建用户: 冯印韬
 * 创建日期: 2018年8月3日10:51:25
 */

namespace Ht\Controller;

use Think\Controller;

class LoginController extends Controller
{
    //登入页面
    public function adminLogin()
    {
        if (IS_POST){
            $data = I("post.");
//            print_r($data);die;
            $uname = D("user")->where("user_nickname="."'".$data['name']."'")->find();
            if (!$uname){
                echo 1;
            }
        }
        $this->display();
    }

}

?>