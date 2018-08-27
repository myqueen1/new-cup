<?php
/**
 *   @author yanxusheng
 *   @datetime 18-08-18
*/
namespace Home\Controller;

use Think\Controller;

class GoodsController extends ComeController
{
    private static $principle = ['brand_id','type_id','goods_price','goods_name'];

	/**
     *  @param $type_id,$price,$brand string 
     *  @return $result json_decode()   根据条件搜索 返回相应的数据
    */
    public function product()
    {
        $goodsmodel = D('goods');   //实例化goods表

        if (IS_POST) {
            $nextpage = I('post.nextpage');
            if (!empty($nextpage)) {
                echo json_encode($this->Eliminate(self::GetlistGoods(cookie('goods_start'))));die;
            }

            $prefix = self::Conditionalstorage(I("post."));
            if ($prefix) {
                $where = "five_goods_detailed.goods_status = '2' and ".$prefix;
                
                $optiontype = $goodsmodel->field('five_goods.goods_id,goods_name,five_goods_detailed.goods_price,goods_cover')
                                         ->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
                                         ->where($where)
                                         ->select();
                                         //echo $goodsmodel->getLastSql();die;

                echo json_encode($this->Eliminate(self::GetlistGoods(cookie('goods_start',0))));
            } else {
                echo json_encode($this->Eliminate(self::GetlistGoods(cookie('goods_start',0))));
            } 
        } else {
            cookie('brand_id',null);
            cookie('type_id',null);
            cookie('goods_price',null);

            $goods_list = S('goods_list');
            if (!empty($goods_list)) {
                //echo "正在用缓存";
                $result = self::GetlistGoods(cookie('goods_start',0));
            } else {
                //echo "没有缓存";
                $results= $goodsmodel->field('five_goods.goods_id,goods_name,five_goods_detailed.goods_price,goods_cover')
                                     ->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
                                     ->where("goods_status = '2'")
                                     ->select();
                                    //echo $goodsmodel->getLastSql();die;
                $goodnum= $goodsmodel->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
                                     ->where("goods_status = '2'")
                                     ->count();

                S('goods_list',$results);
                S('goods_count',$goodnum);
                $result = self::GetlistGoods(cookie('goods_start',0));
            }         
            //print_r($result);die;
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
        } else if($optionkey == 'goods_name'){
            $result = self::ConditionStatus($optionkey,$optionval);
        }
        //print_r($result);die;
        return $result;
    }

    /**
     *   @params 将我们之前的参数找出来,与新的条件拼接成sql语句
     *   @return $result string 执行的SQL语句
    */
    private static function ConditionStatus($keys,$value)
    {
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

                if ($value == 'goods_name') {
                    $prefix = 'five_goods.';
                    $condition[] = $prefix.$value.' like "%'.cookie($value).'%" and ';
                    continue;
                }

                if ($value == 'goods_price') {

                    $prefix = 'five_goods_detailed.';
                    $condition[] = $prefix.$value.' between "'.explode('-',cookie($value))[0].'" and "'.explode('-',cookie($value))[1].'" and ';
                    continue;
                }
                $condition[] = $prefix.$value.' = "'.cookie($value).'" and ';
            }

            return rtrim(implode('',$condition),' and');  //数组分割成字符串
        } else {
            if ($value == 'all' || $value == '') {
                cookie($keys,null);
            } else {
                cookie($keys,$value);
            }
            return self::ConditionStatus();
        }
    }

    /**
     *   @param $goods_list array 商品列表缓存
     *   @return $goods_list array 返回缓存中的数据
    */
    private static function GetlistGoods($goods_start)
    {   
        $goods_list = S('goods_list');

        if (!empty($goods_start)) {
            if (cookie('goods_start') <= S('goods_count')) {
                cookie('goods_start',$goods_start+8);
                $result = array_slice($goods_list,$goods_start,8);
            } else {
                cookie('goods_start',0);
                return self::GetlistGoods(cookie('goods_start'));
            }
        } else {
            cookie('goods_start',8);
            $result = array_slice($goods_list,0,8);
        }
        return $result;
    }


    //商品详情
    public function buy()
    {
        $goods_id   = I('get.id');
        if (is_numeric($goods_id)) {
            $goodsmodel = D('goods');

            $result = $goodsmodel->field('five_goods.goods_id,goods_name,five_goods_detailed.goods_stock,goods_original,goods_price,goods_cover,goods_content,goods_sale,five_brand.brand_name,brand_logo,brand_url')
                                 ->join('five_brand on five_goods.brand_id=five_brand.brand_id')
                                 ->join('five_goods_detailed on five_goods.goods_id=five_goods_detailed.goods_id')
                                 ->where("five_goods_detailed.goods_status = '2' and five_goods.goods_id = ".$goods_id)
                                 ->find();
            //echo $goodsmodel->getLastSql();die;

            if (empty($result)){ layout(false);$this->error(); }

            $imgmodel = M('goods_img');
            $ImgPath  = $imgmodel->where("goods_id = '$goods_id'")->select();

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
    /*public function searchGoods()
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
                             ->select();*/

            /**
             * @content 热词添加
             * @param string
             * @return  类型：数组  排序方式 降序
             */
            /*$s_data=$search->where("search_name='$goods'")->find();
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
    }*/
}