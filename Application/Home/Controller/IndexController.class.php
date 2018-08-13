<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends ComeController
{
    public function index(){
        $this->display();
    }

    //留言板
    public function message()
    {
        $this->display();
    }

    public function PlayGame(){
        layout(false);
        $this->display('Common/game');
    }
}