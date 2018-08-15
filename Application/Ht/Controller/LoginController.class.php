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
        $userInfo = cookie('userInfo');
        $cid = $userInfo['admin_id'];   
        $where = I('get.where');
        $map['admin_name|admin_email'] = array('like',"%$where%");
        $count      = M('admin')->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data = M('admin')->where($map)->order('admin_id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('where',$where);
        $this->assign("page",$show);
        $this->assign("user", $data);
        $this->assign('cid',$cid);
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

    //删除管理员
    public function admin_del()
    {
        if (IS_POST) {
            $ids = I('post.admin_id');
            $str = implode($ids, ',');
            $where = "`admin_id` IN ($str)";
        } else {
            $admin_id = I('get.admin_id');
            $where = "`admin_id`=" . $admin_id;
        }
        if (M('admin')->where($where)->delete()) {
            $this->redirect('Login/user_list', "", 0, '页面跳转中...');
        } else {
            $this->error("删除失败");
        }
    }

    //修改管理员信息
    public function edit_user()
    {   
        $userInfo = cookie('userInfo');
        if (IS_POST) {
            $rules = array(  
                array('admin_email','','邮箱已经存在！',0,'unique',0),
                array('admin_email','/^\w{5,}@[a-z0-9]{2,3}\.[a-z]+$|\,$/','请输入正确的邮箱'),
                array('pwd1','pwd2','确认密码不正确',0,'confirm'),    
            );
            if (!M('admin')->validate($rules)->create()){     
                $this->error(M('admin')->getError());
            } else {
                $data = I('post.');
                if (empty($data['pwd1']) || empty($data['pwd2']) ) {
                    $data['admin_password'] = $userInfo['admin_password'];
                } else {
                    $data['admin_password'] = $data['pwd1'];
                }
                if ($userInfo['admin_email']!=$data['admin_email']) {
                    $data['admin_number'] = substr($data['admin_email'],0,strrpos($data['admin_email'],"@"));
                } else {
                    $data['admin_number'] = $userInfo['admin_number'];
                }
            }
            $re = M('admin')->where('admin_id='.$data['admin_id'])->save($data);
                if ($re) {
                    $this->success('您的账号为<br>'.$data['admin_number'],U('Login/user_list'));
                } else {
                    $this->success('没有做任何的修改<br>您的账号为'.$data['admin_number'],U('Login/user_list'));
                }
        } else {
            $admin_id = I("get.admin_id");
            $user = M('admin')->where('admin_id='.$admin_id)->find();
            $this->assign('user',$user);
            $this->display();
        }
        
    } 
}

?>