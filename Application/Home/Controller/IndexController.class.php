<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

//    首页
    public function index()
    {
        $this->display();
    }

//    杯之密语
    public function blog()
    {
        $this->display();
    }

//    杯之密语列表
    public function blog_list()
    {
        $this->display();
    }


//    重置密码
    public function find()
    {
        $this->display();
    }

//    个人中心
    public function personal()
    {
        $arr=cookie('user');
        if (!$arr) {
          
        }
        else
        {
            // var_dump($arr[0]);
            $id=$arr[0];
            $DB=M('user');
            $data=$DB->where("user_id={$id}")->find();
            // echo $DB->getLastSql();die;
            $this->assign('data',$data);
        }
        
         $this->display();
    }

    // 用户个人信息修改
    public function UseSave()
    {
        // echo 11;
        $db=D('user');
        // $data=$db->select();
        $arr=I('post.');
        // var_dump($arr);die;
        $id=$arr['user_id'];
        // echo $id;die;
        $data=$db->where("user_id='$id'")->save($arr);
        $res=$db->where("user_id='$id'")->find();
        // var_dump($res);die;
        echo json_encode($res);
    }

//    留言板
    public function message()
    {
        $this->display();
    }


//    购物车
    public function shop_car()
    {
        $this->display();
    }

//    订单
    public function fill_order()
    {
        $this->display();
    }



//    商品页
    public function product()
    {
        $this->display();
    }

//    商品详情
    public function buy()
    {
        $this->display();
    }


}