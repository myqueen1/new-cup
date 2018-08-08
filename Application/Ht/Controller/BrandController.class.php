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
        $brand = M('brand'); // 实例化brand对象
        $count = $brand->where('1=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $brand->where('1=1')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

//    添加品牌
    public function add_brand()
    {
        if (IS_POST) {
            $data = I('post.');
            $brand_name = $data['brand_name'];
            $brand_url = $data['brand_url'];
            $brand = M('brand');
            if (empty($brand_name)) {
                echo "<script>alert('品牌不能为空');location.href='add_brand'</script>";
            } elseif (empty($brand_url)) {
                echo "<script>alert('品牌官网不能为空');location.href='add_brand'</script>";
            } elseif ($brand->where("`brand_name`='$brand_name'")->find()) {
                echo "<script>alert('添加的品牌已存在');location.href='add_brand'</script>";
            } else {
                $data = I('post.');
                $imag = $this->upload($_FILES);
                $img = $imag['brand_logo']['savepath'] . $imag['brand_logo']['savename'];
                $data['brand_logo'] = $img;
                if ($brand->add($data)) {
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
        if (IS_POST) {
            $ids = I('post.ids');
            $str = implode($ids, ',');
            $where = "`brand_id` IN ($str)";
        } else {
            $brand_id = I('get.brand_id');
            $where = "`brand_id`=" . $brand_id;
        }
        $brand = M('brand');
        $data = $brand->where($where)->select();
        foreach ($data as $k => $v) {
//          删除图片
            unlink('.' . $v['brand_logo']);
        }
        if ($brand->where($where)->delete()) {
            echo true;
        } else {
            echo false;
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
}