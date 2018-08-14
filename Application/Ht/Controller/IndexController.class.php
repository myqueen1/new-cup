<?php

namespace Ht\Controller;

class IndexController extends CommonController
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
        $userInfo = cookie("userInfo");
        $this->assign("name", $userInfo['admin_name']);
        $this->display();
    }
}