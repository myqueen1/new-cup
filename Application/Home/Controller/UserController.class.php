<?php
/**
 *  @author 马燕 王晓雪
 *  @datetime 2018/8/2
 */
namespace Home\Controller;

use Think\Controller;

class UserController extends HeadController
{
    //    个人中心
    public function personal()
    {
        $user_info = json_decode(cookie('user_info'),true);
        $user_id   = $user_info['user_id'];

        $usermodel = D('user');
        $user_info = $usermodel->field('user_id,user_nickname,head_img,user_tel,user_email,user_sex')
                               ->where("user_id= '$user_id'")
                               ->find();
                            //echo $usermodel->getLastSql();die;
        $this->assign('user_info',$user_info);
        $this->display();
    }


    /**
     *   @param $oldpass MD5(string)   接收MD5加密的密码,然后 核对密码正确性 
     *   @return success/error json_encode
    */
    public function VerificationOld()
    {
        if (IS_AJAX) {
            $oldpass  = MD5(I('post.oldpwd'));    //接收的旧密码
            $user_info= json_decode(cookie('user_info'),true);    //获取COOKIE中用户ID
            $user_id  = $user_info['user_id'];

            $usermodel = D('user');
            $result = $usermodel->field('user_pass')
                                ->where("user_id = '$user_id' and user_pass = '$oldpass'")
                                ->find();

            if(!empty($result)) echo json_encode("success");    //核对成功
            if(empty($result)) echo json_encode("error");       //核对失败
        } else {
            echo self::PutOutMessage('error','请求方式错误,正在返回!');
        }
    }

    /**
     *   @param $newpass MD5(string)  接收设置的新密码,更新数据库密码字段
     *   @return success/error json_encode 
    */
    public function AjaxUpdatePass()
    {
        if (IS_AJAX) {
            $newpass  = MD5(I('post.newpass'));    //接收的旧密码
            $user_info= json_decode(cookie('user_info'),true);    //获取COOKIE中用户ID

            if (!empty($user_info)) {
                $user_id = $user_info['user_id'];

                $usermodel = D('user');
                $result = $usermodel->where("user_id = '$user_id'")
                                    ->setField('user_pass',$newpass);

                if(!empty($result)) echo json_encode("success");    //核对成功
                if(empty($result)) echo json_encode("error");  //核对失败
            }
        }else {
            echo self::PutOutMessage('error','请求方式错误,正在返回!');
        }
    }


    /**
     *  @param 用户个人信息修改
    */ 
    public function UseSave()
    {
        $arr=I('post.');

        $usermodel = D('user');
        $id=$arr['user_id'];
        $data=$db->where("user_id='$id'")->save($arr);
        $res=$db->where("user_id='$id'")->find();
        echo json_encode($res);
    }

    public function ShoppingCart(){
        $this->display();
    }

    //订单
    public function fill_order()
    {
        $this->display();
    }

    //重置密码
    public function find()
    {
        $this->display();
    }
}