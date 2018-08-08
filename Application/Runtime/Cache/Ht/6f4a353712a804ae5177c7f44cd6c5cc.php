<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>新增产品品牌</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="/Public/backend/"/>
    <link href="style/adminStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="wrap">
    <div class="page-title">
        <span class="modular fl"><i></i><em>添加品牌</em></span>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <table class="list-style">
            <tr>
                <td style="text-align:right;width:15%;">品牌名称：</td>
                <td>
                    <input type="text" name="brand_name" class="textBox"/>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;width:15%;">品牌LOGO：</td>
                <td>
                    <input type="file" name="brand_logo"/>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;width:15%;">品牌官网：</td>
                <td>
                    <input type="text" name="brand_url" class="textBox"/>
                </td>
            </tr>

            <tr>
                <td style="text-align:right;"></td>
                <td><input type="submit" value="保存" class="tdBtn"/></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>