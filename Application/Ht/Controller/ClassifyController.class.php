<?php
/**
 * 说    明: 分类控制器
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/2
 */

namespace Ht\Controller;

use Think\Controller;

class ClassifyController extends Controller
{
//    分类列表
    public function product_category()
    {
        $type = M('type'); // 实例化type对象
        $count = $type->where('1=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $type->where('1=1')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

//    添加分类
    public function add_category()
    {
        if (IS_POST) {
            $data = I('post.');
            $type_name = $data['type_name'];
            $type = M('type');
            if (empty($type_name)) {
                echo "<script>alert('分类名不能为空');location.href='add_category'</script>";
            } elseif ($type->where("`type_name`='$type_name'")->find()) {
                echo "<script>alert('添加的分类已存在');location.href='add_category'</script>";
            } else {
                if ($type->add($data)) {
                    echo "<script>alert('添加成功');location.href='product_category'</script>";
                } else {
                    echo "<script>alert('添加失败');location.href='add_category'</script>";
                }
            };
            die;
        }
        $this->display();
    }

//    删除
    public function del()
    {
        $p = I('get.p');
        $type_id = I('get.type_id');
        $type = M('type');
        if ($type->delete($type_id)) {
            echo "<script>alert('删除成功');location.href='product_category?p=$p'</script>";
        } else {
            echo "<script>alert('删除失败');location.href='product_category?p=$p'</script>";
        }


    }
}