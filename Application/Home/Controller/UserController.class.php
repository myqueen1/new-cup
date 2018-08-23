<?php
/**
 *  @author 马燕 王晓雪
 *  @datetime 2018/8/2
 */
namespace Home\Controller;

use Think\Controller;

class UserController extends HeadController
{
    //个人中心
    public function personal()
    {
        $user_id   = self::ReturnUserInfo('user_id');

        $ordermodel= D('order');
        $orderlist = $ordermodel->field('five_goods.goods_id,goods_name,five_goods_detailed.goods_cover,five_order.order_id,goods_number,five_order.goods_price,generate_time,order_status,(five_order.goods_price*five_order.goods_number)as price_sum')
                                ->join('five_goods on five_order.goods_id = five_goods.goods_id')
                                ->join('five_goods_detailed on five_goods.goods_id = five_goods_detailed.goods_id')
                                ->where("five_order.user_id = '$user_id' and five_order.order_status != '5'")
                                ->select();
                                //echo $ordermodel->getLastSql();die;

        $usermodel = D('user');
        $user_info = $usermodel->field('user_id,user_nickname,head_img,user_tel,user_email,user_sex')
                               ->where("user_id= '$user_id'")
                               ->find();
                            //echo $usermodel->getLastSql();die;

        $this->assign('orderlist',$orderlist);
        $this->assign('user_info',$user_info);
        $this->display();
    }


    /**
     *   @param $oldpass MD5(string)   接收MD5加密的密码,然后 核对密码正确性 
     *   @return success/error json_encode
    */
    public function VerificationOld()
    {
        if (IS_AJAX) {
            $oldpass  = MD5(I('post.oldpwd'));    //接收的旧密码
            $user_info= json_decode(cookie('user_info'),true);    //获取COOKIE中用户ID
            $user_id  = $user_info['user_id'];

            $usermodel = D('user');
            $result = $usermodel->field('user_pass')
                                ->where("user_id = '$user_id' and user_pass = '$oldpass'")
                                ->find();

            if(!empty($result)) echo json_encode("success");    //核对成功
            if(empty($result)) echo json_encode("error");       //核对失败
        } else {
            echo self::PutOutMessage('error','请求方式错误,正在返回!');
        }
    }

    /**
     *   @param $newpass MD5(string)  接收设置的新密码,更新数据库密码字段
     *   @return success/error json_encode 
    */
    public function AjaxUpdatePass()
    {
        if (IS_AJAX) {
            $newpass  = MD5(I('post.newpass'));    //接收的旧密码
            $user_info= json_decode(cookie('user_info'),true);    //获取COOKIE中用户ID

            if (!empty($user_info)) {
                $user_id = $user_info['user_id'];

                $usermodel = D('user');
                $result = $usermodel->where("user_id = '$user_id'")
                                    ->setField('user_pass',$newpass);

                if(!empty($result)) echo json_encode("success");    //核对成功
                if(empty($result)) echo json_encode("error");  //核对失败
            }
        }else {
            echo self::PutOutMessage('error','请求方式错误,正在返回!');
        }
    }


    /**
     *  @param 用户个人信息修改
    */ 
    public function UseSave()
    {
        $arr=I('post.');

        $usermodel = D('user');
        $id=$arr['user_id'];
        $data=$db->where("user_id='$id'")->save($arr);
        $res=$db->where("user_id='$id'")->find();
        echo json_encode($res);
    }

    /**
     *   @param $goods_id int 获取商品ID/用户ID/加入购物车时间/入库保存
     *   @return $result json_encode(['code','msg']) 
    */
    public function ShoppingCart(){
        $carmodel = D('car');

        if (IS_AJAX) {
            $shopdata['user_id']   = self::ReturnUserInfo('user_id');
            $shopdata['goods_id']  = I('post.goods_id');
            $shopdata['sku_color'] = I('post.sku_color');
            $shopdata['sku_number']= I('post.sku_number');
            $shopdata['be_time']   = date('Y-m-d H:i:s',time());
            
            $result = $carmodel->where("user_id = '".$shopdata['user_id']."' and goods_id = '".$shopdata['goods_id']."'")
                               ->find();
                               //echo json_encode($result);die;
            if (!$result) {
                $result = $carmodel->add($shopdata);
                if($result)  echo self::PutOutMessage('success','加入购物车成功');
            } else {
                echo self::PutOutMessage('error','该商品已存在于您的购物车!');
            }
        } else {
            $user_id = self::ReturnUserInfo('user_id');

            $result = $carmodel->field("five_goods.goods_id,goods_name,five_car.sku_number,sku_color,five_goods_detailed.goods_price,goods_cover,goods_status")
                               ->join('five_goods on five_car.goods_id = five_goods.goods_id')
                               ->join('five_goods_detailed on five_car.goods_id = five_goods_detailed.goods_id')
                               ->where("five_car.user_id = '$user_id'")
                               ->select();
                              //echo $carmodel->getLastSql();die; 
            foreach ($result as $key => $value) {
                $result[$key]['goods_sum'] = $value['goods_price']*$value['sku_number'];
            }
            //echo $carmodel->getLastSql();die;
            
            $this->assign('cardata',$result);
            $this->display();
        }
    }

    /**
     *   @param $goods_id string 移除购物车
     *   @return $result json 
    */
    public function Remove()
    {
        $goods_id = I('get.goods_id');
        $user_id  = self::ReturnUserInfo('user_id');

        if (is_numeric($goods_id)) {
            $carmodel = D('car');
            $result = $carmodel->where("user_id = '$user_id' and goods_id = '$goods_id'")
                               ->delete();

            if ($result) echo self::PutOutMessage('success','移除购物车成功');
            if (!$result) echo self::PutOutMessage('error','系统错误,请稍后重试!');
        } else {
            echo self::PutOutMessage('error','系统错误,请稍后重试!');
        }
    }

    /**
     *   @param $order_id 订单ID 用来删除订单
     *   @return $result json 
    */
    public function OrderOptions()
    {

        $order_id = I('get.order_id');

        if (is_numeric($order_id)) {
            $ordermodel = D('order');
            $result = $ordermodel->where('order_id = '.$order_id)
                                 ->setField(["order_status" => '5']);
                                
            if ($result) { 
                echo self::PutOutMessage('success','删除订单成功'); 
            }else { 
                echo self::PutOutMessage('error','删除订单失败,请您稍后重试!'); 
            }
        } else {
            echo self::PutOutMessage('error','错误操作,警告!');
        }
    }

    /**
     *   @param $goods_id $user_id string 
     *   @return $result json   根据$goods_id,$user_id 下单
    */
    public function fill_order()
    {
        if (IS_POST) {  //新增收货地址
            $address = I('post.');
            $address['user_id'] = self::ReturnUserInfo('user_id');

            $goods_id     = $address['goods_id'];
            $goods_number = $address['goods_number'];

            unset($address['goods_id']);
            unset($address['goods_number']);

            $addressmodel = D('address');
            $result = $addressmodel->where('user_id = '.$address['user_id'])
                                   ->Count();
                                   //print_r($result);die();
            if ($result >= 3) {
                layout(false);$this->error();
            } else {
                $result = $addressmodel->add($address);
                $this->success('保存成功,正在为您返回...',U('User/fill_order',array('goods_id'=>$goods_id,'goods_number'=>$goods_number)));
            }
        } else {
            $goods_id = I('get.goods_id');  //接收商品ID
            $goods_number = I('get.goods_number');  //接收商品数量

            if (is_numeric($goods_id) && is_numeric($goods_number)) {    //判断合法性
                //判断商品状态
                $detailmodel = D('goods_detailed');
                $status = $detailmodel->field('goods_status')
                                      ->where("goods_id = '$goods_id'")
                                      ->find();
                                      //print_r($status);die;
                if ($status['goods_status'] == '2') {   //商品状态正常
                    //获取收货地址
                    $user_id = self::ReturnUserInfo('user_id');
                    $addressmodel = D('address');
                    $user_address = $addressmodel->where("user_id = '$user_id'")
                                                 ->select();

                    //获取商品详细信息
                    $goodsmodel  = D('goods');
                    $goodsdetail = $goodsmodel->field('five_goods.goods_id,goods_name,five_goods_detailed.goods_price,goods_cover')
                                              ->join('five_goods_detailed on five_goods_detailed.goods_id = five_goods.goods_id')
                                              ->where("five_goods.goods_id = '$goods_id'")
                                              ->find();

                    $goodsdetail['goods_number'] = $goods_number;
                    $goodsdetail['goods_sum']    = $goods_number*$goodsdetail['goods_price'];
                    //print_r($goodsdetail);die;

                    $this->assign('goodsdetail',$goodsdetail);
                    $this->assign('user_address',$user_address);
                    $this->display();
                } else {
                    layout(false);$this->error();   //商品状态 抛出异常
                }                   
            } else {
                //商品ID不是数字的情况下 抛出异常
                layout(false);$this->error();
            }
        }
    }

    //重置密码
    // public function find()
    // {
    //     $this->display();
    // }
}