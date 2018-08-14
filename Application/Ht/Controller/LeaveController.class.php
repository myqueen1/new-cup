<?php
/**
 * 说    明:
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/14
 * 创建时间: 9:39
 */

namespace Ht\Controller;


class LeaveController extends CommonController
{
//    留言列表
    public function user_message()
    {
        $leave = M('leave'); // 实例化leave对象
        $count = $leave->where('1=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $leave
            ->join('five_user ON five_user.user_id = five_leave.user_id')
            ->where('1=1')->order('status')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

//    删除留言
    public function delet()
    {
        $id = I('get.id');
        $where = "`id`=" . $id;
        $res = D('leave')->delet($where);
        if ($res) {
            echo true;
        } else {
            echo false;
        }
    }

//    查看留言信息
    public function reply_message()
    {
        $id = I('get.id');
        $res = D('leave')->select_one($id);
        $this->assign('list', $res);
        $this->display(); // 输出模板
    }

//    回复消息
    public function reply_do()
    {
        $data = I('post.');
        $data['status'] = 1;
        $data['reply_time']=date("Y-m-d H:i:s");
        $user=cookie('userInfo');
        $data['admin_id']=$user['admin_id'];
        $leave = D('leave');
        $res = $leave->updat($data);
        if ($res) {
            $res = $leave->select_one($data['id']);
            echo json_encode($res);
        } else {
            echo false;
        }
    }
}