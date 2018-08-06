<?php

namespace Ht\Controller;

use Think\Controller;

class IndexController extends LoginController
{
    public function __construct(){
    parent::__construct();
        $userInfo = cookie("userInfo");
        if (empty($userInfo)) {
            $this->redirect('Login/adminLogin',"", 3, '请先登入...');   
        }  
    }
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
        $this->assign("name",$userInfo['admin_name']);
        $this->display();
    }
}