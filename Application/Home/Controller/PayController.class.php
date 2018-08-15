<?php
/**
 *  @author 马燕 王晓雪
 *  @datetime 2018/8/2
 */
namespace Home\Controller;

use Think\Controller;

class PayController extends HeadController
{
    /**
     *   @param $goods_id,$accept_id,$pay_way string 
     *   @content 用户提交订单
    */
    public function GeneratingOrder()
    {
        if(session('submit') != 'OK'){
            $order['goods_id']  = I('get.goods_id');
            $order['accept_id'] = I('get.accept_id');
            $order['pay_way']   = I('get.pay_way');
            $order['user_id']   = self::ReturnUserInfo('user_id');
            $order['generate_time'] = date('Y-m-d H:i:s',time());
            $order['goods_order']   = $order['goods_id'].$order['user_id'].date('YmdHis',time()).$order['pay_way'].rand(99999,1000000);
            $order['order_remarks'] = "55° 水杯网店";

            foreach($order as $key => $value){
                if (empty($value)) { layout(false);$this->error();die; }
            }

            $ordermodel = D('order');   //根本不需要判断是否存在订单 直接添加
            $result = $ordermodel->add($order);
            if ($result) {
                session('submit','OK');

                $goodsmodel = D('goods');
                $result = $goodsmodel->field('five_goods.goods_name,five_goods_detailed.goods_price')
                                     ->join('five_goods_detailed on five_goods_detailed.goods_id = five_goods.goods_id')
                                     ->where("five_goods.goods_id = ".$order['goods_id'])
                                     ->find();

                $order['goods_name']  = $result['goods_name'];
                $order['goods_price'] = $result['goods_price'];
                
                $params = self::order_pay($order);
                $this->assign('url','https://mapi.alipay.com/gateway.do');
                $this->assign('params',$params);
                $this->display('paymoney');
            } else {
                layout(false);$this->error();
            }
        } else {
            layout(false);$this->error();
        }   
    }

    /**
     *   @param $order array 根据参数$order 拼接支付信息
     *   @return ???
    */
    private static function order_pay($order)
    {
        //var_dump($order_number);die;
        //基本参数
        $param  = array(
                        'service'        => 'create_direct_pay_by_user',    //接口名称
                        'partner'        => '2088121321528708',             //合作者身份ID
                        '_input_charset' => 'UTF-8',                        //参数编码字符集
                    );
        //业务参数
        $params = array(
                        'out_trade_no'  => '',                  //商户网站唯一订单号
                        'subject'       => '',                  //商品名称
                        'payment_type'  => '1',                 //支付类型
                        'total_fee'     => '',                  //交易金额
                        'seller_email'  => 'itbing@sina.cn',    //卖家支付宝账号
                        'body'          => ''                   //备注
                    );
        
        $params['out_trade_no'] = $order['goods_order'];    //商户网站唯一订单号
        $params['subject']      = $order['goods_name'];     //商品名称
        $params['total_fee']    = $order['goods_price'];    //交易金额
        $params['body']         = $order['order_remarks'];  //备注
        //将筛选的参数按照第一个字符的键值ASCII码递增排序   字母升序排序
        $params = array_merge($params,$param);
        ksort($params);

        //将排序后的参数与其对应值，组合成“参数=参数值”的格式，并且把这些参数用&字符连接起来
        $string = '';
        foreach ($params as $key => $value) {
            if (empty($string)) {
                $string .= $key.'='.$value;
            } else {
                $string .= '&'.$key.'='.$value;
            }
        }

        //MD5签名的商户需要将key的值拼接在字符串后面，调用MD5算法生成sign
        $sign = MD5($string.'1cvr0ix35iyy7qbkgs3gwymeiqlgromm');

        //最终所需数据
        $params['sign_type'] = 'MD5';
        $params['sign'] = $sign;
        
        return $params;
    }

    
}