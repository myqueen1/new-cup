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
        if (IS_POST) {
            $data = I("post.");
            //判断商品名 是否为空
            if (empty($data['goods_name'])) {
                //为空跳回页面
                echo "<script>alert('商品名不能为空');location.href='product_list'</script>";
            } else {
                //不为空 查询商品名称是否唯一
                $goods = M('goods')->where("goods_name=" . "'" . $data['goods_name'] . "'")->find();
                if ($goods) {
                    echo "<script>alert('商品已存在');location.href='product_list'</script>";
                } else {
                    //不存在 添加
                    M("goods")->add($data);
                    $id = M("goods")->getLastInsID();
                    $this->redirect('Goods/add_con', array('goods_id' => $id), 0, '页面跳转中...');
                }
            }
        }
        $this->display();
    }

    //商品回收站
    public function recycle_bin()
    {
        $this->display();
    }

    //商品添加
    public function edit_product()
    {
        //分类表
        $fen = D('type')->select();
        //品牌表
        $brand = D('brand')->select();
        $this->assign("fen", $fen);
        $this->assign("brand", $brand);
        $this->display();
    }

    //商品详情添加
    public function add_con()
    {
        if (IS_POST) {
            $data = I("post.");
            $imag = $this->upload($_FILES);
            $data['goods_cover'] = $imag['goods_cover']['savepath'] . $imag['goods_cover']['savename'];
            $data['goods_time'] = date("Y-m-d H:i:s", time());
            $re = D('goods_detailed')->add($data);
            if ($re) {
                $this->redirect('Goods/product_list', '', 0, '页面跳转中...');
            }
        } else {
            $id = I("get.goods_id");
            $this->assign("goods_id", $id);
            $this->display();
        }
    }

    //文件长传
    public function upload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath = '/Public/Uploads/'; // 设置附件上传目录    // 上传文件
        $upload->rootPath = "./";
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功
            return $info;
        }
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