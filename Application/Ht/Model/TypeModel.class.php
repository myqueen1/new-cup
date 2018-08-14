<?php
/**
 * 说    明:
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/9
 * 创建时间: 16:36
 */

namespace Ht\Model;

use Think\Model;

class TypeModel extends Model
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
}