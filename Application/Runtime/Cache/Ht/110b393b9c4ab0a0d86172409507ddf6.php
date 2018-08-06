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
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr type_id="<?php echo ($v["type_id"]); ?>">
                <td>
                    <input type="checkbox"/>
                    <span><?php echo ($v["type_name"]); ?></span>
                </td>
                <td class="center"><a href="<?php echo U('Classify/del');?>?type_id=<?php echo ($v["type_id"]); ?>&p=<?php echo I('get.p');?>" class="block" title="移除"><img
                        src="images/icon_trash.gif"/></a></td>
            </tr><?php endforeach; endif; ?>

    </table>

    <!-- BatchOperation -->
    <div style="overflow:hidden;">
        <!-- Operation -->
        <div class="BatchOperation fl">
            <input type="checkbox" id="del"/>
            <label for="del" class="btnStyle middle">全选</label>
            <input type="button" value="批量删除" class="btnStyle"/>
        </div>
        <!-- turn page -->


        <div class="turnPage center fr">
            <?php echo ($page); ?>
        </div>
    </div>
</div>
</body>
</html>