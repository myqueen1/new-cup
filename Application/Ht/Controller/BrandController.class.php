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

            $rules = array(
                array('brand_name', 'require', '品牌名称不能为空！'), // 品牌不能为空
                array('brand_name', '', '品牌名称已经存在！', 1, 'unique', 1), // 验证用户名是否已经存在
                array('brand_url', 'require', '品牌网址不能为空！'), // 品牌不能为空
                array('brand_url', '/^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+/', '请输入正确网址！'),
            );

            $brand = D("brand"); // 实例化brand对象
            if (!$brand->validate($rules)->create()) {
                // 如果创建失败 表示验证没有通过 输出错误提示信息
                $this->error($brand->getError());
            } else {
                // 验证通过 可以进行其他数据操作
                $imag = $this->upload($_FILES);
                $img = $imag['brand_logo']['savepath'] . $imag['brand_logo']['savename'];
                $data['brand_logo'] = $img;
                if ($brand->add_all($data)) {
                    echo "<script>alert('添加成功');location.href='brand_list'</script>";
                } else {
                    echo "<script>alert('添加失败');location.href='add_brand'</script>";
                }
            }
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

    public function updata_brand()
    {
        $brand_id = I('get.brand_id');
        $res = M('brand')->find($brand_id);
        $this->assign('list', $res);// 赋值分页输出
        $this->display();
    }

    public function updata_do()
    {
        $data = I('post.');
        $brand_id=$data['brand_id'];
        $rules = array(
            array('brand_name', 'require', '品牌名称不能为空！'), // 品牌不能为空
            array('brand_name', '', '品牌名称已经存在！', 1, 'unique', 1), // 验证用户名是否已经存在
            array('brand_url', 'require', '品牌网址不能为空！'), // 品牌不能为空
            array('brand_url', '/^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+/', '请输入正确网址！'),
        );
        $brand = M("brand"); // 实例化brand对象
        if (!$brand->validate($rules)->create()) {
            // 如果创建失败 表示验证没有通过 输出错误提示信息
            $this->error($brand->getError());
        } else {
            if($_FILES ['brand_logo'] ['error']!=4){
                // 验证通过 可以进行其他数据操作
                $imag = $this->upload($_FILES);
                $img = $imag['brand_logo']['savepath'] . $imag['brand_logo']['savename'];
                $data['brand_logo'] = $img;
            }
            if ($brand->save($data)) {
                echo "<script>alert('修改成功');location.href='brand_list'</script>";
            } else {
                echo "<script>alert('修改失败');location.href='updata_brand?brand_id=$brand_id'</script>";
            }
        }
    }
}