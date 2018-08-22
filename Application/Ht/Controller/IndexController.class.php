<?php

namespace Ht\Controller;

class IndexController extends CommonController
{
    public function index()
    {
        $this->display();
    }

    //总信息
    public function main()
    {
        $userNum = M('user')->count();
        $num = M('user')->field("user_sex,count(*)")->group('user_sex')->select();
        $goodsNum = M('goods')->count();
        $type = M('goods')->join('five_type ON five_type.type_id=five_goods.type_id')->field('type_name,count(*)')->group('type_name')->select();
        $order = M('order')->count();
        $stu = M('order')->field('order_status,count(*)')->group('order_status')->select();
        $this->assign("type",$type);
        $this->assign("stu",$stu);
        $this->assign("order",$order);
        $this->assign("userNum",$userNum);
        $this->assign("goodsNum",$goodsNum);
        $this->assign("num",$num);
        $this->display();
    }


    //订单列表
    public function order_list()
    {
        $where = I("get.where");
        $order_status = I('get.order_status');
        $map['order_number|accept_name'] = array('like',"%$where%");
            // $map['_logic'] = 'OR';            
        if ($order_status=='0') {
            $map['order_status'] = array("eq","$order_status");
        } else if( $order_status=="all" || empty($order_status)) {

        } else {
            $map['order_status'] = array("eq","$order_status");
        }
        $map['order_status']  = array('lt','5');

        $count  = M('order')->join('five_address ON five_order.accept_id=five_address.accept_id')
                            ->join("five_goods_detailed ON five_order.goods_id = five_goods_detailed.goods_id")
                            ->where($map)->count();

        $Page       = new \Think\Page($count,10);
        $show       = $Page->show();
        $data = M('order')->field('order_id,five_address.accept_id,five_address.user_id,order_number,generate_time,accept_name,accept_tel,accept_detail,order_status,five_order.goods_price,accept_province,accept_city,accept_town,five_order.goods_number')
        				  ->join('five_address ON five_order.accept_id=five_address.accept_id')
                          ->join("five_goods_detailed ON five_order.goods_id = five_goods_detailed.goods_id")
                          ->where($map)->order('order_id')
                          ->limit($Page->firstRow.','.$Page->listRows)
                          ->group('order_id')
                          ->select(); 
                           
        $this->assign('where',$where);
        $this->assign('order_status',$order_status);
        $this->assign('data',$data);
        $this->assign("page",$show);
        $this->display();
    }

    //查看订单详情
    public function order_detail()
    {
        $order_id = I('get.order_id');

        $data = M('order')->join('five_address ON five_order.accept_id=five_address.accept_id')
                          ->join("five_goods_detailed ON five_order.goods_id = five_goods_detailed.goods_id")
                          ->join("five_goods ON five_order.goods_id = five_goods.goods_id")
                          ->field('order_id,five_address.accept_id,user_id,order_number,generate_time,accept_name,accept_tel,accept_address,order_status,order_remarks,goods_cover,five_order.goods_price,goods_number,goods_name,accept_province,accept_city,accept_town')
                          ->where("order_id=".$order_id)
                          ->find();

        $this->assign("v",$data);
        $this->display();
    }
    
    //导航
    public function top()
    {
        $userInfo = cookie("userInfo");
        $this->assign("name", $userInfo['admin_name']);
        $this->display();
    }

    //测试表格
    public function order_report()
    {
        if (IS_POST) {
            $order_id = I('post.order_id');
            if (empty($order_id)) {
                $where = "1=1";
             } elseif (is_array($order_id)) {
                $str = implode($order_id, ',');
                $where = "`order_id` IN ($str)";
             } else {
                $where = "`order_id` IN ($order_id)";   
             }
        } elseif (IS_GET) {
            $order_id = I('get.order_id');
            if (empty($order_id)) {
                $where = "1=1";
            } elseif (is_array($order_id)) {
                $str = implode($order_id, ',');
                $where = "`order_id` IN ($str)";
             } else {
                $where = "`order_id` IN ($order_id)";   
             }
        } else {
            $where = "1=1";
        }
        $data = M('order')->where($where)->join('five_address ON five_order.accept_id=five_address.accept_id')
                         ->join("five_goods_detailed ON five_order.goods_id = five_goods_detailed.goods_id")
                         ->join("five_goods ON five_order.goods_id = five_goods.goods_id")
                         ->field('order_id,five_address.accept_id,five_address.user_id,order_number,generate_time,accept_name,accept_tel,accept_address,order_status,five_order.goods_price,goods_name,accept_province,accept_city,accept_town,goods_number')->select();
                         echo M('order')->getLastSql();
        vendor('Report');  //引入类文件
        vendor('Order');
        $reportObj = new \Report('order');
        $Order = new \Order();
        //设置要展示的字段
        $reportObj->setTitle(array("下单日期","收货人","电话","省份","市区","乡镇","收货地址","订单金额","支付状态","订单编号","商品名称/商品数量"));

        foreach($data as $good)
        {
            //print_r($good);
            $insertData = array(
                $good['generate_time'],
                $good['accept_name'],
                $good['accept_tel'],
                $good['accept_province'],
                $good['accept_city'],
                $good['accept_town'],
                $Order->cont($good),
                "￥".$good['goods_price'],
                $Order->getStatusText($good),
                $good['order_number'],
                $good['goods_name'].' / '.$good['goods_number'],
            );
            $reportObj->setData($insertData);
        }       
        $reportObj->toDownload();   
    }

    //修改发货状态
    public function Upstatus()
    {
        $order_id = I('get.order_id');
        if (is_array($order_id)) {
            $str = implode($order_id, ',');
            $where = "`order_id` IN ($str)";
        } else {
            $where = "`order_id`=" . $order_id;
        }
        $order_status = I('get.order_status');
        $data['order_status'] = $order_status;
        $re = M('order')->where($where)->save($data);
        if ($re) {
            $this->redirect('Index/order_list', "", 0, '页面跳转中...');
        } else {
            $this->error('修改失败');
        }
    }

    //删除订单 垃圾箱作废的订单
    public function delAll()
    {
       if (IS_POST) {
            $ids = I('post.order_id');
            $str = implode($ids, ',');
            $where = "`order_id` IN ($str)";
            $ids = M('order')->field('accept_id')->where($where)->select();
            foreach ($ids as $k => $v) {
                $accept_id.=$v['accept_id'].",";
            }
            $accept_id = rtrim($accept_id,",");
            $where_acc = "accept_id IN ($accept_id)";
        } else {
            $order_id = I('get.order_id');
            $where = "`order_id`=" . $order_id;
            $id = M('order')->field('accept_id')->where($where)->find();
            $where_acc = "accept_id =". $id['accept_id'];
        }
        if (M('address')->where($where_acc)->delete()) {
            M('order')->where($where)->delete();
            $this->success("删除成功");
        } else {
            $this->error("删除失败");
        }
    }

    //垃圾箱  过期订单
    public function Dustbin()
    {
        $data = M('order')->field('order_id,order_status,generate_time')->where("order_status != '5'")->select();
        $num = count($data);
        $guoTime=time();
        for ($i=0; $i <$num ; $i++) { 
            $time = strtotime($data[$i]['generate_time'])+60*60*24*7;
            if ($time<$guoTime) {
                $id['order_id'] = $data[$i]['order_id'];
                $save['order_status'] = '5';
                M('order')->where($id)->save($save);
            }      
        }
        $rest = M('order')->where("order_status = '5'")->join('five_goods ON five_order.goods_id=five_goods.goods_id')->join('five_goods_detailed ON five_order.goods_id=five_goods_detailed.goods_id')->field('order_id,order_number,generate_time,five_order.goods_id,goods_name,goods_cover')->order('order_id')->select();
        $this->assign('rest',$rest);
        $this->display();
    }
 
}