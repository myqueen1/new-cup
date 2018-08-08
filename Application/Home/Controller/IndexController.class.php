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
        $this->display();
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
        $db=M('goods');
        $data=$db->join('five_brand on five_goods.brand_id=five_brand.brand_id')
            ->join('five_type on five_goods.type_id=five_type.type_id')
            ->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
            // ->join('five_goods_img on five_goods_detailed.goods_id=five_goods_img.goods_id')
            ->select();
//        echo $db->getLastSql();die;

        //热词展示
        $search=M("search");
        $hot_goods=$search->order('search_num desc')->limit(5)->select();
        $this->assign('hot_goods',$hot_goods);

        //商品首页展示
        $this->assign('data',$data);

        //商品类型
        $tdb=M("type");
        $type=$tdb->select();
        $this->assign('type',$type);

        $this->display();
    }

//    商品详情
    public function buy()
    {

        $id=I('get.id');
        $db=M('goods_detailed');

        $data=$db
            ->join('five_goods on five_goods_detailed.goods_id=five_goods.goods_id')
            ->where("five_goods_detailed.goods_id={$id}")->find();
//        print_r($data);die;
//      echo $db->getLastSql();die;
//        print_r($data);die;
        $ImgDb=M('goods_img');
        $Img=$ImgDb->where("goods_id={$id}")->select();

        $this->assign('data',$data);
        $this->assign('Img',$Img);
        $this->display();

    }


    /*
     *content  商品搜索  根据商品类型或者名称进行搜索
     * 传参方式 post
     * @param  搜索参数 string
     * 返回值 Json
     * 搜索方式 模糊查询
     */

    public function searchGoods()
    {

        //goods_name like '%$goods%'
        $db=M('goods');
//        $res=$db->where('goods_id=1')->();
//        echo $db->getLastSql();die;
        $goods=I("post.names");
        $search=M("search");

        if(empty($goods)){
            $data=$db
                ->join("five_brand on five_goods.brand_id=five_brand.brand_id")
                ->join("five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id")
                ->where("1=1")->select();
//            echo $db->getLastSql();die;
//            return json_encode($data);
        }else{
            $data=$db
                ->join("five_brand on five_goods.brand_id=five_brand.brand_id")
                ->join("five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id")
                ->where("goods_name like '%$goods%' || brand_name like '%$goods%'")
                ->select();

            /*
             *content 热词添加
             * @param string
             * 返回值  类型：数组  排序方式 降序
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

        echo  json_encode($data);


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


    /*
     *content 商品分类筛选
     * 参数 id  int
     * @param  返回值 json
     */

    public function typeGoods()
    {
        $id=I("post.id");
        $db=M("goods");
        $data=$db
            ->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
            ->where("type_id='$id'")
            ->select();
        echo json_encode($data);
    }
}