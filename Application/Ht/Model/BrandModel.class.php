<?php
/**
 * 说    明:
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/9
 * 创建时间: 16:36
 */

namespace Ht\Model;

use Think\Model;

class BrandModel extends Model
{
    public function delet($where)
    {
        return $this->where($where)->delete();

    }

//    查找多条
    public function selec($where)
    {
        return $this->where($where)->select();
    }

//    查找单条
    public function select_one($where)
    {
        return $this->where($where)->find();
    }

//    添加数据
    public function add_all($data)
    {
        return $this->add($data);
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
}