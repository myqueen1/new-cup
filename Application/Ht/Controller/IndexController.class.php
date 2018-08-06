<?php

namespace Ht\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function order_list()
    {
        $this->display();
    }

    public function top()
    {
        $this->assign("name","测试");
        $this->display();
    }
}