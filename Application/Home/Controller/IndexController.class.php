<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends ComeController
{
    public function index(){
        $goodsmodel = D('goods');
        $result = $goodsmodel->field('five_goods.goods_id,goods_name,five_brand.brand_id,brand_name,brand_url,five_type.type_name,five_goods_detailed.goods_stock,is_discont,goods_original,goods_price,goods_cover,goods_status,goods_sale,goods_keywords')
                             ->join('five_brand on five_goods.brand_id=five_brand.brand_id')
                             ->join('five_type on five_goods.type_id=five_type.type_id')
                             ->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
                             ->where("goods_status = '2'")
                             ->limit(1,2)
                             //->join('five_goods_img on five_goods_detailed.goods_id=five_goods_img.goods_id')
                             ->select();

        //echo $goodsmodel->getLastSql();die;
        //$result = $this->Eliminate($result);
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