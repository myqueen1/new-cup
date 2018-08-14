<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>左侧导航</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="/Public/backend/">
    <link href="style/adminStyle.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.js"></script>
    <script src="js/public.js"></script>
</head>
<body style="background:#313131">
<div class="menu-list">
    <ul>
        <li class="menu-list-title">
            <span>商品管理</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="<?php echo U('Goods/product_list');?>" title="商品列表" target="mainCont">商品列表</a></li>
                <li><a href="<?php echo U('Classify/product_category');?>" title="商品分类" target="mainCont">商品分类</a></li>
                <li><a href="<?php echo U('Brand/brand_list');?>" title="商品品牌" target="mainCont">商品品牌</a></li>
                <li><a href="<?php echo U('Goods/recycle_bin');?>" title="商品回收站" target="mainCont">商品回收站</a></li>
            </ul>
        </li>
        
        <li class="menu-list-title">
            <span>会员管理</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="<?php echo U('Login/user_list');?>" title="会员列表" target="mainCont">会员列表</a></li>
                <li><a href="<?php echo U('Login/add_user');?>" title="添加会员" target="mainCont">添加会员</a></li>
              <!--   <li><a href="user_rank.html" title="会员等级" target="mainCont">会员等级</a></li> -->
                <li><a href="user_message.html" title="会员留言" target="mainCont">会员留言</a></li>
            </ul>
        </li>

        <li class="menu-list-title">
            <span>会员管理</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="<?php echo U('Member/user_list');?>" title="会员列表" target="mainCont">会员列表</a></li>
                <!--<li><a href="<?php echo U('Member/add_user');?>" title="添加会员" target="mainCont">添加会员</a></li>-->
                   <!--<li><a href="<?php echo U('Member/user_rank');?>" title="会员等级" target="mainCont">会员等级</a></li>-->
                <li><a href="<?php echo U('Member/user_message');?>" title="会员留言" target="mainCont">会员留言</a></li>
            </ul>
        </li>


        <li class="menu-list-title">
            <span>订单管理</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="<?php echo U('Index/order_list');?>" title="订单列表" target="mainCont">订单列表</a></li>
            </ul>
        </li>

        <li class="menu-list-title">
            <span>系统设置</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="basic_settings.html" title="站点基本设置" target="mainCont">站点基本设置</a></li>
                <li><a href="admin_list.html" title="站点基本设置" target="mainCont">站点管理员</a></li>
            </ul>
        </li>

        <li class="menu-list-title">
            <span>轮播图管理</span>
            <i>◢</i>
        </li>
        <li>
            <ul class="menu-children">
                <li><a href="<?php echo U('Five/advertising_list');?>" title="站点基本设置" target="mainCont">轮播图列表</a></li>
            </ul>
        </li>

    </ul>
</div>
</body>
</html>