<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>产品列表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <base href="/Public/backend/">
    <link href="style/adminStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="wrap">
    <div class="page-title">
        <span class="modular fl"><i class="add"></i><em>编辑/添加产品</em></span>
        <span class="modular fr"><a href="product_list.html" class="pt-link-btn">产品列表</a></span>
    </div>
    <form action="<?php echo U('Goods/add_con');?>" enctype="multipart/form-data" method="post">
        <input type="hidden" name="goods_id" id="" value="<?php echo ($goods_id); ?>">
        <table class="list-style">
            <tr>
                <td style="text-align:right;">商品原价：</td>
                <td>
                    <input type="text" class="textBox length-short" name="goods_original"/>
                    <span>元</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">商品售价：</td>
                <td>
                    <input type="text" class="textBox length-short" name="goods_price"/>
                    <span>元</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">商品库存：</td>
                <td>
                    <input type="text" class="textBox length-short" name="goods_stock"/>
                    <span>件</span>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">商品封面：</td>
                <td>
                    <input type="file" name="goods_cover"/>
                    <!--<label for="chanpinzhutu" class="labelBtn2">本地上传(最多选择N张)</label>-->
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">商品图片：</td>
                <td>
                    <input type="file" multiple="multiple" id="chanpinzhutu" class="hide"/>
                    <label for="chanpinzhutu" class="labelBtn2">本地上传(最多选择N张)</label>
                </td>
            </tr>
            <tr>
                <td style="text-align:right;">商品推广词：</td>
                <td><input type="text" class="textBox length-long" name="goods_keywords"/></td>
            </tr>

            <tr>
                <td style="text-align:right;">产品详情：</td>
                <td>
 
                </td>
            </tr>
            <tr>
                <td style="text-align:right;"></td>
                <td><input type="submit" value="发布新商品" class="tdBtn"/></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>