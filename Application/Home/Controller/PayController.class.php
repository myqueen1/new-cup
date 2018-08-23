<?php
/**
 *  @author yanxusheng
 *  @datetime 2018/8/2
 */
namespace Home\Controller;

use Think\Controller;

class PayController extends HeadController
{
    //第三方支付公共参数
    private static $payRequestBuilder;
    private static $aop;
    private static $configs;

    public function __construct(){
        parent::__construct();
        //读取配置信息
        self::$configs = C('config_alipay');
        //引入第三方类库
        Vendor('alipay.pagepay.service.AlipayTradeService');
        Vendor('alipay.pagepay.buildermodel.AlipayTradePagePayContentBuilder');
        //实例化第三方类文件
        self::$payRequestBuilder = new \AlipayTradePagePayContentBuilder();
        self::$aop = new \AlipayTradeService(self::$configs);
    }

    /**
     *   @param $goods_id,$accept_id,$pay_way string 
     *   @content 用户提交订单
    */
    public function GeneratingOrder()
    {
        if(session('submit') != '1OK'){
            $order['goods_name']    = I('get.goods_name');
            $order['goods_id']      = I('get.goods_id');
            $order['accept_id']     = I('get.accept_id');
            $order['pay_way']       = I('get.pay_way');
            $order['user_id']       = self::ReturnUserInfo('user_id');
            $order['goods_number']  = I('get.goods_number');
            $order['goods_price']   = I('get.goods_price');
            $order['generate_time'] = date('Y-m-d H:i:s',time());
            $order['order_number']  = $order['goods_id'].$order['user_id'].date('YmdHis',time()).$order['pay_way'].rand(99999,1000000);
            $order['order_remarks'] = "55° 水杯网店";
            
            foreach($order as $key => $value){
                if (empty($value)) { layout(false);$this->error(); }
            }

            $ordermodel = D('order');   //根本不需要判断是否存在订单 直接添加
            $result = $ordermodel->add($order);

            if ($result) {
                session('submit','OK');

                $order['goods_sum'] = sprintf("%.2f", $order['goods_price']*(float)$order['goods_number']);
                self::AlipaySdk($order);

                //$params = self::order_pay($order);
                //print_r($params);die;
                //$this->assign('url','https://mapi.alipay.com/gateway.do');
                //$this->assign('params',$params);
                //$this->display('paymoney');
            } else {
                layout(false);$this->error();
            }
        } else {
            layout(false);$this->error();
        }
    }

    /**
     *    @param $order 生成支付二维码所需参数
     *    @return 支付宝第三方支付地址与二维码
    */
    private static function AlipaySdk($order)
    {
        //传入参数
        self::$payRequestBuilder->setBody($order['order_remarks']);
        self::$payRequestBuilder->setSubject($order['goods_name']);
        self::$payRequestBuilder->setTotalAmount($order['goods_sum']);
        self::$payRequestBuilder->setOutTradeNo($order['order_number']);
        //输出支付宝返回信息
        $response = self::$aop->pagePay(self::$payRequestBuilder,self::$configs['return_url'],self::$configs['notify_url']);
        var_dump($response);
    }

    /**
     *   @param I('get.') 接收GET参数,调用check 方法验证合法性
     *   @return 支付成功/失败页面
    */
    public function synchronization()
    {
        $result = self::$aop->check(I('get.'));

        if ($result['code']) {
            //echo $result['out_trade_no'];die;
            $ordermodel= D('order');
            $goods_id  = $ordermodel->field('goods_id,goods_number')
                                    ->where("order_number = ".$result['out_trade_no'])
                                    ->find();
            //开启事物
            $ordermodel->startTrans();
            //修改订单状态 
            $setFields = $ordermodel->where("order_number = ".$result['out_trade_no'])
                                    ->setField(['order_status' => '2']);

            if ($setFields) {
                //修改商品表中库存
                $goodsmodel = D('goods_detailed');
                $result = $goodsmodel->where('goods_id = '.$goods_id['goods_id'])
                                     ->setDec('goods_stock',$goods_id['goods_number']);
                                    //print_r($result);die;
                if ($result) { 
                    $ordermodel->commit(); 
                    $this->success('订单支付成功,别着急马上就好',U('User/personal'));
                } else { 
                    $ordermodel->rollback(); 
                    layout(false);$this->error();
                }
            }else{
                $ordermodel->rollback();    //错误!  回滚
                layout(false);$this->error();
            }
        } else {
            layout(false);$this->error();
        }
    }

    /**
     *   @param $order array 根据参数$order 拼接支付信息
     *   @return ???  已废除,这是真正的线上支付接口,项目正在用的是沙箱环境
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
        
        $params['out_trade_no'] = $order['order_number'];    //商户网站唯一订单号
        $params['subject']      = $order['goods_name'];     //商品名称
        $params['total_fee']    = $order['goods_sum'];    //交易金额
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