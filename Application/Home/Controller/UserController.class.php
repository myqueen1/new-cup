<?php
/**
 *  @author 马燕 王晓雪
 *  @datetime 2018/8/2
 */
namespace Home\Controller;

use Think\Controller;

class UserController extends HeadController
{
    //    个人中心
    public function personal()
    {
        $user_info = json_decode(cookie('user_info'),true);
        $user_id   = $user_info['user_id'];

        $usermodel = D('user');
        $user_info = $usermodel->field('user_id,user_nickname,head_img,user_tel,user_email,user_sex')
                               ->where("user_id= '$user_id'")
                               ->find();
                            //echo $usermodel->getLastSql();die;
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
            if (!$result) {
                $result = $carmodel->add($shopdata);
                if($result)  echo self::PutOutMessage('success','加入购物车成功');
            } else {
                echo self::PutOutMessage('error','该商品已存在于您的购物车!');
            }
        } else {
            $user_id = self::ReturnUserInfo('user_id');
            // $sql = "select five_goods.goods_id,goods_name,five_car.sku_number,sku_color,five_goods_detailed.goods_price,goods_cover,goods_status from five_car,five_goods,five_goods_detailed where five_car.goods_id = five_goods.goods_id and five_car.goods_id = five_goods_detailed.goods_id and user_id = '$user_id'";
            // $carmodel->query($sql);
            $result = $carmodel->field("five_goods.goods_id,goods_name,five_car.sku_number,sku_color,five_goods_detailed.goods_price,goods_cover,goods_status")
                               ->join('five_goods on five_car.goods_id = five_goods.goods_id')
                               ->join('five_goods_detailed on five_car.goods_id = five_goods_detailed.goods_id')
                               ->where("five_car.user_id = '$user_id'")
                               ->select();

            foreach ($result as $key => $value) {
                $result[$key]['goods_sum'] = $value['goods_price']*$value['sku_number'];
            }
            //print_r($result);die;

            //echo $carmodel->getLastSql();die;
            $this->assign('cardata',$result);
            $this->display();
        }
    }

    //订单
    public function fill_order()
    {
        $this->display();
    }

    //重置密码
    public function find()
    {
        $this->display();
    }
}