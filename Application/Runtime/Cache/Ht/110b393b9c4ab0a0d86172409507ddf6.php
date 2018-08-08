<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>产品分类</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="/Public/backend/"/>
    <link href="style/adminStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="wrap">
    <div class="page-title">
        <span class="modular fl"><i></i><em>产品分类</em></span>
        <span class="modular fr"><a href="<?php echo U('Classify/add_category');?>" class="pt-link-btn">+添加新分类</a></span>
    </div>

    <table class="list-style">
        <tr>
            <th>分类名称</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                <td>
                    <input type="checkbox" name="checkbox" value="<?php echo ($v["type_id"]); ?>"/>
                    <span><?php echo ($v["type_name"]); ?></span>
                </td>
                <td class="center"><a href="<?php echo U('Classify/del');?>?type_id=<?php echo ($v["type_id"]); ?>&p=<?php echo I('get.p');?>"
                                      class="block" title="移除"><img
                        src="images/icon_trash.gif"/></a></td>
            </tr><?php endforeach; endif; ?>

    </table>

    <!-- BatchOperation -->
    <div style="overflow:hidden;">
        <!-- Operation -->
        <div class="BatchOperation fl">
            <input type="checkbox" id="del"/>
            <label for="del" class="btnStyle middle">全选</label>
            <input type="button" value="批量删除" class="btnStyle delete"/>
        </div>
        <!-- turn page -->

        <div class="turnPage center fr">
            <?php echo ($page); ?>
        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script>
    $(document).on('click','.block',function () {
        event.preventDefault()
        var url=$(this).attr('href');
        $.ajax({
            url:url,
            success:function(result){
                if (result){
                    alert('删除成功');
                    location.href = "<?php echo U('Classify/product_category');?>?p=<?php echo I('get.p');?>";
                } else {
                    alert('删除失败');
                    location.href = "<?php echo U('Classify/product_category');?>?p=<?php echo I('get.p');?>";
                }
            }});
    })
    // 全选反选
    $(function () {
        //实现全选反选
        $("#del").on('click', function () {
            $(".list-style input:checkbox").prop("checked", $(this).prop('checked'));
        })
        $(".list-style input:checkbox").on('click', function () {
            //当选中的长度等于checkbox的长度的时候,就让控制全选反选的checkbox设置为选中,否则就为未选中
            if ($(".list-style input:checkbox").length === $(".list-style input:checked").length) {
                $("#del").prop("checked", true);
            } else {
                $("#del").prop("checked", false);
            }
        })
    })

    // 批删
    $(document).on('click', '.delete', function () {
        //    alert("ds");
        var checkedNum = $("input[name='checkbox']:checked").length;
        if (checkedNum == 0) {
            alert("请选择至少一项！");
            return;
        }
// // 批量选择
        if (confirm("确定要删除所选项目？")) {
            var che = $("input[name='checkbox']:checked");
            var ids = new Array();
            for (var a = 0; a < che.length; a++) {
                ids[a] = che[a].value;
            }
            $.ajax({
                type: "POST",
                url: "<?php echo U('Classify/del');?>?p=<?php echo I('get.p');?>",
                data: {'ids': ids},
                success: function (result) {
                    if (result) {
                        alert('删除成功');
                        location.href = "<?php echo U('Classify/product_category');?>?p=<?php echo I('get.p');?>";
                    } else {
                        alert('删除失败');
                        location.href = "<?php echo U('Classify/product_category');?>?p=<?php echo I('get.p');?>";
                    }

                }
            });
        }
    })

</script>
</body>
</html>