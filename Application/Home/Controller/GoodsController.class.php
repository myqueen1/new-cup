<?php
/**
 * 说    明:
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/2
 * 创建时间: 8:57
 */

namespace Home\Controller;

use Think\Controller;

class GoodsController extends ComeController
{
	//商品页
    public function product()
    {
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
        $result = $this->Eliminate($result);
        $this->assign('data',$result);
        
        //热词展示
        $searchmodel = D("search");
        $hot_goods = $searchmodel->order('search_num desc')
                                 ->limit(5)
                                 ->select();
        $this->assign('hot_goods',$hot_goods);

        //商品类型
        $typemodel = D("type");
        $typedata  = $typemodel->select();

        $this->assign('type',$typedata);
        $this->display();
    }

    //商品详情
    public function buy()
    {

        $goods_id   = I('get.id');
        if (is_numeric($goods_id)) {
            $goodsmodel = D('goods_detailed');

            $result = $goodsmodel->join('five_goods on five_goods_detailed.goods_id=five_goods.goods_id')
                                 ->where("five_goods_detailed.goods_id='$goods_id'")
                                 ->find();
            //print_r($data);die;echo $db->getLastSql();die;print_r($data);die;

            $imgmodel = M('goods_img');
            $ImgPath  = $imgmodel->where("goods_id = '$goods_id'")
                                 ->select();

            $this->assign('data',$result);
            $this->assign('Img',$ImgPath);
            $this->display();
        } else {
            //没有商品ID的情况下抛出异常
            layout(false);$this->error();
        }
    }

    /**
     * @content  商品搜索  根据商品类型或者名称进行搜索
     * 传参方式 post
     * @param  搜索参数 string
     * 返回值 Json
     * 搜索方式 模糊查询
    */
    public function searchGoods()
    {
        $goods  = I("post.names");
        $search = M("search");

        $goodsmodel = M('goods');
        if(empty($goods)){
            $data=$goodsmodel->join("five_brand on five_goods.brand_id=five_brand.brand_id")
                             ->join("five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id")
                             ->where("1=1")->select();
                //echo $db->getLastSql();die;
                //return json_encode($data);
        }else{
            $data=$goodsmodel->join("five_brand on five_goods.brand_id=five_brand.brand_id")
                             ->join("five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id")
                             ->where("goods_name like '%$goods%' || brand_name like '%$goods%'")
                             ->select();

            /**
             * @content 热词添加
             * @param string
             * @return  类型：数组  排序方式 降序
             */
            $s_data=$search->where("search_name='$goods'")->find();
            if(empty($s_data)){
                $arr=array(
                    'search_name'=>$goods,
                    'search_num'=>1,
                    'search_data'=>time()
                );
                $search->where("search_name='$goods'")->add($arr);
            }else{
                $s_data['search_num']+=1;
                $arr=array(
                    'search_name'=>$goods,
                    'search_num'=>$s_data['search_num']
                );
                $search->where("search_name='$goods'")->save($arr);
            }
        }
        echo  json_encode($this->Eliminate($data));
    }


    /**
     * @content 商品分类筛选
     * @param 参数 id int 返回值 json
    */

    public function typeGoods()
    {
        $id=I("post.id");
        $db=M("goods");
        $data=$db
            ->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
            ->where("type_id='$id'")
            ->select();
        echo json_encode($this->Eliminate($data));
    }

    /**
     *   @param $result array 剔除图片路径有问题的数据,返回图片路径没有问题的数组
     *   @return $result array  
    */
    public function Eliminate($result){
        //剔除没有封面的商品
        foreach ($result as $key => $value) {
            $url = 'http://127.0.0.1/new-cup/index.php'.$value['goods_cover'];
            if(!@fopen( $url, 'r' ) ){ 
                unset($result[$key]);
            }
        }
        return $result;
    }
}