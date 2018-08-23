<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends ComeController
{
    public function index(){
        $goodsmodel = D('goods');
        $result = $goodsmodel->field('five_goods.goods_id,goods_name,five_goods_detailed.goods_price,goods_cover')
                             ->join('five_goods_detailed on five_goods.goods_id = five_goods_detailed.goods_id')
                             ->where("goods_status = '2' and is_hot = '1'")
                             ->select();
                            //echo $goodsmodel->getLastSql();die;

        $result = $this->Eliminate($result);
        $this->assign('data',$result);
        
        $this->assign('type',$typedata);
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