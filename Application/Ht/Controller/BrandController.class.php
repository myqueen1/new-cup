<?php
/**
 * 说    明: 品牌控制器
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/2
 */

namespace Ht\Controller;

use Ht\Controller\CommonController;

class BrandController extends CommonController
{
//    品牌列表
    public function brand_list()
    {
        $brand = D('brand');
        $count = $brand->where('1=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $data['show'] = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $data['list'] = $brand->where('1=1')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $data['list']);// 赋值数据集
        $this->assign('page', $data['show']);// 赋值分页输出
        $this->display(); // 输出模板
    }

//    添加品牌
    public function add_brand()
    {
        if (IS_POST) {
            $data = I('post.');
            $brand_name = $data['brand_name'];
            $brand_url = $data['brand_url'];
            $brand = D('brand');
            if (empty($brand_name)) {
                echo "<script>alert('品牌不能为空');location.href='add_brand'</script>";
            } elseif (empty($brand_url)) {
                echo "<script>alert('品牌官网不能为空');location.href='add_brand'</script>";
            } elseif ($brand->select_one("`brand_name`='$brand_name'")) {
                echo "<script>alert('添加的品牌已存在');location.href='add_brand'</script>";
            } else {
                $data = I('post.');
                $imag = $brand->upload($_FILES);
                $img = $imag['brand_logo']['savepath'] . $imag['brand_logo']['savename'];
                $data['brand_logo'] = $img;
                if ($brand->add_all($data)) {
                    echo "<script>alert('添加成功');location.href='brand_list'</script>";
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
//        拼接where条件
        if (IS_POST) {
            $ids = I('post.ids');
            $str = implode($ids, ',');
            $where = "`brand_id` IN ($str)";
        } else {
            $brand_id = I('get.brand_id');
            $where = "`brand_id`=" . $brand_id;
        }
//        查当前准备删除的数据
        $data = D('brand')->selec($where);
//        循环删除图片文件
        foreach ($data as $k => $v) {
//          删除图片
            unlink('.' . $v['brand_logo']);
        }
//        删除数据
        $res = D('brand')->delet($where);
        if ($res) {
            echo true;
        } else {
            echo false;
        }
    }


}