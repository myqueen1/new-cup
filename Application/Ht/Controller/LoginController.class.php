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
            // print_r($data);die;
            $userInfo = D("admin")->where('admin_number='."'".$data['admin_number']."'")->find();
            // print_r($userInfo);die;
            if (!$userInfo){
                $this->error('账号错误');
            } else if ($userInfo['admin_password']!=$data['admin_password']) {
                $this->error('密码错误');
            } else {
                cookie('userInfo',$userInfo);
                $this->redirect('Index/index',"", 3, '登入成功...');
            }
        }
        $this->display();
    }

    // 会员列表
    public function user_list()
    {
        //管理员表
        $user = M("admin")->select();
        $this->assign("user",$user);
        $this->display();
    }
    //修改管理员信息
    public function edit_user()
    {
        $this->display();
    }
    //添加会员
    public function add_user()
    {
        if (IS_POST) {
            $data = I("post.");
            //唯一性
            $info = M("admin")->where("admin_name="."'".$data['admin_name']."'"." and admin_email = "."'".$data['admin_email']."'")->find();
            if ($info) {
                $this->error("邮箱或管理员姓名已存在");
            } else {
                $data['admin_number'] = substr($data['admin_email'],0,strrpos($data['admin_email'],"@"));
                $data['start_time'] = date("Y-m-d H:i:s",time());
                $re = M("admin")->add($data);
                if ($re) {
                    $this->redirect('Login/adminLogin',"", 3, '会员列表...');
                } else {
                    $this->redirect('Login/adminLogin',"", 3, '添加失败...');
                }
            }
        }
        $this->display();
    }
    public function set()
    {
        cookie(null,'userinfo');
        $this->redirect('Index/index',"", 0, '列表...');
    }
}

?>