<?php
/**
 * 说    明:
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/21
 * 创建时间: 13:53
 */

namespace Ht\Controller;

class BlogsController extends CommonController
{
//    展示
    public function Blog_list()
    {
        $blog = D('blog');
        $count = $blog->where('1=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $data['show'] = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data['list'] = $blog->where('1=1')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $data['list']);// 赋值数据集
        $this->assign('page', $data['show']);// 赋值分页输出
        $this->display(); // 输出模板
    }

//    添加
    public function add_blog()
    {
        $this->display();
    }

//    添加入库
    public function add_blog_do()
    {
        $data = I('post.');
        $data['date'] = date("Y-m-d");
        $userinfo = cookie('userInfo');
        $data['name'] = $userinfo['admin_name'];
        $obj = D('blog');
        $res = $obj->add($data);
        if ($res) {
            echo header("location:Blog_list");
        } else {
            echo header("location:Blog_list");
        }
    }

//    删除
    public function del_blogs()
    {
        if (IS_POST) {
            $ids = I('post.ids');
            $str = implode($ids, ',');
            $where = "`id` IN ($str)";
        } else {
            $id = I('get.id');
            $where = "`id`=" . $id;
        }
        $blog = D('blog');
        if ($blog->where($where)->delete()) {
            echo true;
        } else {
            echo false;
        }
    }

    public function updata()
    {
        $id = I('get.id');
        $res = D('blog')->find($id);
        $this->assign('list', $res);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function updata_do()
    {
        $data = I('post.');
        $data['date'] = date("Y-m-d");
        $userinfo = cookie('userInfo');
        $data['name'] = $userinfo['admin_name'];
        $obj = D('blog');
        $res=$obj->save($data);
        if ($res) {
            echo header("location:Blog_list");
        } else {

            echo "<script>alert('修改失败');location.href='updata'</script>";
        }
    }
}