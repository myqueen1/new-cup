<?php
/**
 *   @author yanxusheng
 *   @datetime 18-08-18
*/
namespace Home\Controller;

use Think\Controller;

class GoodsController extends ComeController
{
    private static $principle = ['brand_id','type_id','goods_price'];
    //private static $allstatus = [];
	/**
     *  @param $type_id,$price,$brand string 
     *  @return $result json_decode()   根据条件搜索 返回相应的数据
    */
    public function product()
    {
        $goodsmodel = D('goods');   //实例化goods表

        if (IS_AJAX) {
            $where = self::Conditionalstorage(I("post."));

            $optiontype = $goodsmodel->field('five_goods.goods_id,goods_name,five_goods_detailed.goods_price,goods_cover')
                                     ->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
                                     ->where($where)
                                     ->select();
                                    //echo json_encode($goodsmodel->getLastSql());die;
            echo json_encode($this->Eliminate($optiontype));
        } else {
            cookie('brand_id',null);
            cookie('type_id',null);
            cookie('goods_price',null);

            $result = $goodsmodel->field('five_goods.goods_id,goods_name,five_goods_detailed.goods_price,goods_cover')
                                 ->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
                                 ->where("goods_status = '2'")
                                 ->select();
                                //echo $goodsmodel->getLastSql();die;

            $goods_list = $this->Eliminate($result);
            $this->assign('goods_list',$goods_list);
            //热词展示
            $brandmodel = D("brand");
            $brand_list = $brandmodel->select();
            
            //商品类型
            $typemodel = D("type");
            $type_list = $typemodel->select();

            //view页面赋值
            $this->assign('brand_list',$brand_list);
            $this->assign('type_list',$type_list);

            $this->display();
        }
    }

    /**
     *   @param $conditional,$where string 
     *   @return null
    */
    private static function Conditionalstorage($condition)
    {
        $optionkey = array_keys($condition)[0];     //将value剔除
        $optionval = $condition[$optionkey];        //将key剔除

        if (in_array($optionkey, self::$principle) && is_numeric($optionval)) {
            $result = self::ConditionStatus($optionkey,$optionval);
        } else if($optionval == 'all'){
            $result = self::ConditionStatus($optionkey,'all');
        } else if($optionkey == 'goods_price') {
            $result = self::ConditionStatus($optionkey,$optionval);
        }

        return $result;
    }

    /**
     *   @params 将我们之前的参数找出来,与新的条件拼接成sql语句
     *   @return $result string 执行的SQL语句
    */
    private static function ConditionStatus($keys,$value){
        if (empty($keys) && empty($value)) {
            $allstatus = [];
            foreach (array_keys(cookie()) as $key => $value) {
                if (in_array($value, self::$principle)) {
                    $allstatus[] = $value;
                }
            }

            foreach($allstatus as $key => $value){
                if ($value == 'type_id') $prefix = 'five_goods.';
                if ($value == 'brand_id') $prefix = 'five_goods.';
                if ($value == 'goods_price') {

                    $prefix = 'five_goods_detailed.';
                    $condition[] = $prefix.$value.' between "'.explode('-',cookie($value))[0].'" and "'.explode('-',cookie($value))[1].'" and ';
                    continue;
                }
                $condition[] = $prefix.$value.' = "'.cookie($value).'" and ';
            }

            return rtrim(implode('',$condition),' and');  //数组分割成字符串
        } else {
            if ($value == 'all') {
                cookie($keys,null);
            } else {
                cookie($keys,$value);
            }
            return self::ConditionStatus();
        }
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
                             ->where("1=1")
                             ->select();
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
        echo json_encode($this->Eliminate($data));
    }

    /**
     *   @param $result array 剔除图片路径有问题的数据,返回图片路径没有问题的数组
     *   @return $result array  
    */
    public function Eliminate($result){
        //剔除没有封面的商品
        /*foreach ($result as $key => $value) {
            $url = 'http://127.0.0.1/new-cup/index.php'.$value['goods_cover'];
            if(!@fopen( $url, 'r' ) ){ 
                unset($result[$key]);
            }
        }*/
        return $result;
    }
}