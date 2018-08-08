<?php
/*
 * @content  后台商品控制器
 * @time 2018年8月2日14:25:37
 * @author 冯印韬
 */

namespace Ht\Controller;

use Think\Controller;

class GoodsController extends Controller
{
    //商品列表
    public function product_list()
    {
        $num = M('goods')->count();
        $goods_name = I("get.goods_name");
        $map['goods_name'] =array('like',"%$goods_name%");
        $count      = M('goods')->where($map)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data = M('goods')->join("five_goods_detailed ON five_goods.goods_id = five_goods_detailed.goods_id")->where($map)->order('five_goods.goods_id')->limit($Page->firstRow.','.$Page->listRows)->select();
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
        $upload->rootPath  =      './'; // 设置附件上传根目录
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
}