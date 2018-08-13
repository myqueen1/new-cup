<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends ComeController
{
    //杯之密语
    public function blog()
    {
        $this->display();
    }

    //杯之密语列表
    public function blog_list()
    {
        $this->display();
    }


    //重置密码
    public function find()
    {
        $this->display();
    }

    //留言板
    public function message()
    {
        $this->display();
    }

    //订单
    public function fill_order()
    {
        $this->display();
    }
}