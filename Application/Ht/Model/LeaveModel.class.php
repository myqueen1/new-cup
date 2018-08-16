<?php
/**
 * 说    明:
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/14
 * 创建时间: 14:34
 */

namespace Ht\Model;

use Think\Model;

class LeaveModel extends Model
{
//    删除
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
    public function select_one($id)
    {
        return $this->join('five_user ON five_user.user_id = five_leave.user_id')->find($id);
    }

//    添加数据
    public function add_all($data)
    {
        return $this->add($data);
    }

//    修改数据
    public function updat($data)
    {
        return $this->save($data);
    }
}