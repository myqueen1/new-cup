<?php
/*
 * @content  后台商品控制器
 * @time 2018年8月2日14:25:37
 * @author 冯印韬
 */

namespace Ht\Controller;

use Think\Controller;

class GoodsController extends CommonController
{
    private static $message = [];

    //商品列表
    public function product_list()
    {
        $num = M('goods')->count();
        $goods_name = I("get.goods_name");
        $map['goods_name'] =array('like',"%$goods_name%");
        $count      = M('goods')->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data = M('goods')->join("five_goods_detailed ON five_goods.goods_id = five_goods_detailed.goods_id")->where($map)->order('five_goods.goods_id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('keyword',$goods_name);
        $this->assign('data',$data);
        $this->assign("page",$show);
        $this->display();  
    }
    //
    //删除
    public function delAll()
    {
        if (IS_POST) {
            $ids = I('post.goods_id');
            $str = implode($ids, ',');
            $where = "`goods_id` IN ($str)";
        } else {
            $goods_id = I('get.goods_id');
            $where = "`goods_id`=" . $goods_id;
        }

        if (M('goods')->where($where)->delete()) {
            M('goods_detailed')->where($where)->delete();
            M('goods_img')->where($where)->delete();
            $this->redirect('Goods/product_list', "", 0, '页面跳转中...');
        } else {
            $this->error("删除失败");
        }

    }

    //商品回收站
    public function recycle_bin()
    {
        $this->display();
    }

    //商品添加
    public function edit_product()
    {
           if (IS_POST) {
            $data = I("post.");
            //判断商品名 是否为空
            if (empty($data['goods_name'])) {
                //为空跳回页面
                $this->error('商品名不能为空');
            } else {
                //不为空 查询商品名称是否唯一
                $goods = M('goods')->where("goods_name=" . "'" . $data['goods_name'] . "'")->find();
                if ($goods) {
                    $this->error('商品已存在');
                } else {
                    //不存在 添加
                    M("goods")->add($data);
                    $id = M("goods")->getLastInsID();
                    $this->redirect('Goods/add_con', array('goods_id' => $id), 0, '页面跳转中...');
                }
            }
        } else {
              //分类表
            $fen = D('type')->select();
            //品牌表
            $brand = D('brand')->select();
            $this->assign("fen", $fen);
            $this->assign("brand", $brand);
            $this->display();
        }
      
    }

    //商品详情添加
    public function add_con()
    {
        if (IS_POST) {
            $data = I("post.");
            // print_r($data);die;
            $goods_id = $data['goods_id'];
            $imag = $this->upload($_FILES);
            $data['goods_cover'] = $imag['goods_cover']['savepath'] . $imag['goods_cover']['savename'];
            $num =  count($imag['array']);
                for ($i=0; $i <=$num-1 ; $i++) { 
                    $rest['goods_id'] = $goods_id;
                    $rest['detailed_path']  = $imag['array'][$i]['savepath'].$imag['array'][$i]['savename'];
                    M("goods_img")->add($rest);
                }
                
            $data['goods_time'] = date("Y-m-d H:i:s", time());
            // $cons = strip_tags($data['goods_content']);
            // echo strip_tags("<p>阿萨德</p>");
            $re = D('goods_detailed')->add($data);
            if ($re) {
                $this->redirect('Goods/product_list', '', 0, '页面跳转中...');
            } else {
                $this->error("添加失败");
            }
        } else {
            $id = I("get.goods_id");
            $this->assign("goods_id", $id);
            $this->display();
        }
    }

   //多图  和 单图 文件上传
    public function upload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = $size ;// 设置附件上传大小
        $upload->exts = $type;// 设置附件上传类型
        $upload->savePath = '/Public/Uploads/'; // 设置附件上传根目录
        $upload->rootPath = './'; // 设置附件上传根目录

        $upload->replace = true;
        foreach($_FILES as $key => $value){
            if(count($_FILES[$key]) == count($_FILES[$key],1)){//判断$_FILES变量是否是二维数组
                $info = $upload->uploadOne($_FILES[$key]);// 如果不是二维数组，使用单文件依次上传的方法
                unset($_FILES[$key]);
                $arr[$key] = $info;
                if(!$info){
                    $this->errorMsg($upload->getError());
                    exit;
                }
            }
        }
        if(count($_FILES)){
            $info = $upload->upload();// 如果是二维数组，使用批量上传文件的方法(上传文件时，每个文件域的name属性是未知的或者以数组形式定义的)
            if(!$info){
                $this->errorMsg($upload->getError());
                exit;
            }
            $arr['array'] = $info;//数组上传的返回信息全部在键名为array的
        }
        return $arr;
    }

    public function add_referral()
    {
        if (IS_POST) {
            print_r($_POST);
            die();
        }
        $this->display();
    }

    /**
     *   @param $goods_status $goods_id string 
     *   @return $result json 
     *   @content  AJAX 修改上架、下架、审核状态
    */
    public function AjaxUpdateStatus()
    {
        if (IS_AJAX) {
            $goods_status = I('get.status');
            $goods_id     = I('get.id');

            if (is_numeric($goods_id)) {
                $goods_detailed = D('goods_detailed');
                $result = $goods_detailed->where("goods_id = '$goods_id'")
                                         ->setField('goods_status',$goods_status);

                if ($result) {
                    self::$message['status'] = 'success';
                    self::$message['message'] = '修改成功！';
                } else {
                    self::$message['status'] = 'error';
                    self::$message['message'] = '系统错误，请稍后重试！';
                }
            } else{
                self::$message['status'] = 'error';
                self::$message['message'] = '请求参数错误，请稍后重试！';
            }
        } else {
            self::$message['status'] = 'error';
            self::$message['message'] = '请求方式错误，请稍后重试';
        }

        echo json_encode(self::$message,JSON_UNESCAPED_UNICODE);
    }


    /**
     *   @param $is_hot string 
     *   @content AJAX修改是否为热销产品
    */
    public function AjaxUpdateHot(){
        if (IS_AJAX) {
            $is_hot   = I('get.is_hot');
            $goods_id = I('get.id');

            $goods_detailed = D('goods_detailed');
            $result = $goods_detailed->where("goods_id = '$goods_id'")
                                     ->setField('is_hot',$is_hot);
            if ($result) {
                self::$message['status'] = 'success';
                self::$message['message'] = '修改成功！';
            } else {
                self::$message['status'] = 'error';
                self::$message['message'] = '系统错误，请稍后重试！';
            }
            echo json_encode(self::$message,JSON_UNESCAPED_UNICODE);
        }
    }

    // 修改商品价格
    public function price()
    {
        $goods_id = I('get.goods_id');
        $price = I('get.price');
        $data['goods_price'] = trim($price,"￥");
        if (floor($data['goods_price'])) {
            $re = M('goods_detailed')->where("goods_id=".$goods_id)->save($data);
            if ($re) {
                echo 1;
            } else {
                echo 3;
            }
        } else {
           echo 2;
        }

    }
    
    // 修改
    public function save_goods()
    {
        $id = I("get.goods_id");
        $goods = M('goods')->where("goods_id=".$id)->find();
        $detailed = M('goods_detailed')->where("goods_id=".$id)->find();
        $type = M('type')->select();
        $brand = M('brand')->select();
        $this->assign('v',$goods);
        $this->assign('d',$detailed);
        $this->assign('type',$type);
        $this->assign('brand',$brand); 
        $this->display();
    }
    // 接值 修改数据
    public function save_goods_do()
    {
        //goods表修改
        $goods_id = I('post.goods_id');
        $goods['goods_name'] = I('post.goods_name');
        $goods['brand_id'] = I('post.brand_id');
        $goods['type_id'] = I('post.type_id');
            M('goods')->where("goods_id=".$goods_id)->save($goods);
            $detailed['goods_stock'] = I('post.goods_stock');
            $detailed['goods_original'] = I('post.goods_original');
            $detailed['goods_price'] = I('post.goods_price');
            $detailed['goods_content'] = I('post.goods_content');
            $detailed['goods_keywords'] = I('post.goods_keywords');
            $detailed['goods_time'] = date("Y-m-d H:i:s",time());
            $goods_cover = $_FILES['goods_cover'];
            if ($goods_cover['error']!=4) {
                $imag = $this->upload();
                $detailed['goods_cover'] = $imag['goods_cover']['savepath'].$imag['goods_cover']['savename'];
                M('goods_detailed')->where("goods_id=".$goods_id)->save($detailed);
            } else {
                M('goods_detailed')->where("goods_id=".$goods_id)->save($detailed);
            }
        $this->redirect('Goods/product_list', '', 0, '页面跳转中...');

    }
}