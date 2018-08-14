<?php
/*
 *                            _ooOoo_
 *                           o8888888o
 *                           88" . "88
 *                           (| -_- |)
 *                            O\ = /O
 *                        ____/`---'\____
 *                      .   ' \\| |// `.
 *                       / \\||| : |||// \
 *                     / _||||| -:- |||||- \
 *                       | | \\\ - /// | |
 *                     | \_| ''\---/'' | |
 *                      \ .-\__ `-` ___/-. /
 *                   ___`. .' /--.--\ `. . __
 *                ."" '< `.___\_<|>_/___.' >'"".
 *               | | : `- \`.;`\ _ /`;.`/ - ` : | |
 *                 \ \ `-. \_ __\ /__ _/ .-` / /
 *         ======`-.____`-.___\_____/___.-`____.-'======
 *                            `=---='
 *
 *         .............................................
 *                  佛祖镇楼                 BUG辟易
 *          佛曰:
 *                  写字楼里写字间，写字间里程序员；
 *                  程序人员写程序，又拿程序换酒钱。
 *                  酒醒只在网上坐，酒醉还来网下眠；
 *                  酒醉酒醒日复日，网上网下年复年。
 *                  但愿老死电脑间，不愿鞠躬老板前；
 *                  奔驰宝马贵者趣，公交自行程序员。
 *                  别人笑我忒疯癫，我笑自己命太贱；
 *                  不见满街漂亮妹，哪个归得程序员？
*/

/**
 * 说    明:
 * 创建用户: 郭佳伟
 * 创建日期: 2018/8/9
 * 创建时间: 11:09
 */

namespace Ht\Controller;

class MemberController extends CommonController
{
    public function user_list()
    {
        if (IS_POST) {
            $text = I('POST.');
            $where = "`user_nickname` like '%" . $text['text'] . "%' or `user_tel` like '%" . $text['text'] . "%'";
        }
        $user = M('user'); // 实例化user对象
        $count = $user->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $user->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('text', $text['text']);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

//    删除
    public function del()
    {
        if (IS_POST) {
            $ids = I('post.ids');
            $str = implode($ids, ',');
            $where = "`user_id` IN ($str)";
        } else {
            $user_id = I('get.user_id');
            $where = "`user_id`=" . $user_id;
        }
        $user = D('user');
        if ($user->delet($where)) {
            echo true;
        } else {
            echo false;
        }
    }

//    查单条
    public function edit_user()
    {
        $user_id = I('get.user_id');
        $user = D('user'); // 实例化user对象
        $where = "`user_id`=$user_id";
        $data = $user->select_one($where);
        $this->assign('user_list', $data);// 赋值分页输出
        $this->display(); // 输出模板
    }

//    修改
    public function updata()
    {
        $data = I('post.');
        if ($data['user_pass'] == $data['user_pass_ok']) {
            $user = D('user'); // 实例化user对象
            $data['user_pass'] = md5($data['user_pass']);
            $res = $user->updata($data);
            if ($res) {
                echo "<script>alert('修改成功');location.href='user_list'</script>";
            } else {
                echo "<script>alert('修改失败');location.href='edit_user'</script>";
            }
        } else {
            echo 2;
        }
    }
}