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
        if (IS_POST) {
            $data = I("post.");
            // print_r($data);die;
            $userInfo = D("admin")->where('admin_number=' . "'" . $data['admin_number'] . "'")->find();
            // print_r($userInfo);die;
            if (!$userInfo) {
                $this->error('账号错误');
            } else if ($userInfo['admin_password'] != $data['admin_password']) {
                $this->error('密码错误');
            } else {
                cookie('userInfo', $userInfo);
                $this->redirect('Index/index', "", 0, '登入成功...');
            }
        }
        $this->display();
    }

    // 会员列表
    public function user_list()
    {
        //管理员表
        $user = M("admin")->select();
        $this->assign("user", $user);
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
            $rules = array(
                array('admin_name','require','请输入用户名'), //默认情况下用正则进行验证 
                array('admin_name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
                array('admin_name','/^([\x7f-\xff]{3,12}|\w{3,6})$/','请输入名称,中文4个字'),
                array('admin_email','require','请输入邮箱'),
                array('admin_email','','邮箱已经存在！',0,'unique',1),
                array('admin_email','/^\w{5,}@[a-z0-9]{2,3}\.[a-z]+$|\,$/','请输入正确的邮箱'),
                array('admin_password','require','请输入密码'), //默认情况下用正则进行验证 
                array('admin_password','/^\d{6,8}$/','纯数字密码6到10位'), // 自定义函数验证密码格式
            );
            if (!M('admin')->validate($rules)->create()){     // 如果创建失败 表示验证没有通过 输出错误提示信息
                // $message = ;
                $this->error(M('admin')->getError());
            }else{  
                $data = I('post.');
                $data['admin_number'] = substr($data['admin_email'],0,strrpos($data['admin_email'],"@"));
                $data['start_time'] = date("Y-m-d H:i:s",time());
                $re = M("admin")->add($data);
                if ($re) {
                    $this->redirect('Login/user_list',"", 0, '会员列表...');
                } else {
                    $this->redirect('Login/user_list',"", 3, '添加失败...');
                }
            }    
        } else {
            $this->display();
        }
    }


//    退出登录
    public function exit_log()
    {
        $res=cookie('userInfo',null);
        if ($res) {
            $this->redirect('Login/adminLogin',"", 3, '页面跳转中...');

            $this->error('退出失败');
        } else {
            $this->redirect('Login/adminLogin', '', 0, '页面跳转中...');

        }

    }
}

?>