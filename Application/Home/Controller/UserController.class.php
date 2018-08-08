<?php
/**
 * 说    明:
 * 创建用户: 马燕 王晓雪
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
                //拼接 储存所必须 id 和手机号
                $arr = array('id'=>$result , 'user_tel'=>$data['user_tel']);
                $this->SetCookie($arr);

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
        
        $user_tel  = I('get.user_tel');  //手机号
        $user_pass = MD5(I('get.user_pass'));   //密码

        $UserModel = M("user");
        $result    = $UserModel->field('user_id,user_nickname,user_tel,user_email')
                               ->where("user_tel = '".$user_tel."'and user_pass = '".$user_pass."'")
                               ->find();

        //判断返回值 并 存储COOKIE
        if ($result){
            //调用设置COOKIE方法
            $comeback = $this->SetCookie($result);

            if ($comeback) {
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }
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
        if (empty($data)) {
            return false;
        } else {
            cookie('user_info',json_encode($data));
            return true;
        }
    }
}