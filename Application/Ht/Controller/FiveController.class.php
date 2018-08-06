<?php
/**
 * 说    明: 轮播图
 * 创建用户: 冯印韬
 * 创建日期: 2018年8月2日14:39:15
 */

namespace Ht\Controller;

use Think\Controller;

class FiveController extends Controller
{
    //轮播图列表
    public function advertising_list()
    {
        //轮播图表 five_goods_extension
        $goods_extension = D('goods_extension');
        $data = $goods_extension->select();
        $this->assign('path',$data);
        $this->display();
    }

    //添加轮播图
    public function advertising()
    {
        if (IS_POST){
            $goods_extension = D('goods_extension');
            $data = I('post.');
            $imag = $this->upload($_FILES);
            $img = $imag['extension_img']['savepath'].$imag['extension_img']['savename'];
            $data['extension_img'] = $img;
            $data['start_time'] = date("Y-m-d H:i:s",time());
            $re = $goods_extension->add($data);
            if ($re) {
                $this->redirect('Five/advertising_list', '', 3, '页面跳转中...');
            }
        } else {
            $this->display();
        }
    }

    //文件长传
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath  =      '/Public/Uploads/'; // 设置附件上传目录    // 上传文件
        $upload->rootPath  =    "./";
        $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                return $info;
            }
    }



}