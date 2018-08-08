<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>产品品牌</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="/Public/backend/"/>
    <link href="style/adminStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="wrap">
    <div class="page-title">
        <span class="modular fl"><i></i><em>产品品牌</em></span>
        <span class="modular fr"><a href="<?php echo U('Brand/add_brand');?>" class="pt-link-btn">+添加新品牌</a></span>
    </div>

    <table class="list-style">
        <tr>
            <th>品牌名称</th>
            <th>品牌LOGO</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr type_id="<?php echo ($v["brand_id"]); ?>">
                <td>
                    <input type="checkbox"/>
                    <span><a href="<?php echo ($v["brand_url"]); ?>"><?php echo ($v["brand_name"]); ?></a></span>
                </td>
                <td>
                    <span><img src="<?php echo ($v["brand_logo"]); ?>" alt="" width="80px"/></span>
                </td>

                <td class="center"><a href="<?php echo U('Brand/del');?>?brand_id=<?php echo ($v["brand_id"]); ?>&p=<?php echo I('get.p');?>"
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