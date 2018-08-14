<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>产品列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <base href="/new-cup/Public/backend/">
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="add"></i><em>编辑/添加产品</em></span>
    <span class="modular fr"><a href="<?php echo U('Goods/product_list');?>" class="pt-link-btn">产品列表</a></span>
  </div>
  <form action="<?php echo U('Goods/edit_product');?>" enctype="multipart/form-data" method="post"  >
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">商品名称：</td>
    <td><input type="text" class="textBox length-long" name="goods_name" /></td>
   </tr>

   <tr>
    <td style="text-align:right;">商品品牌：</td>
    <td>
     <select class="textBox" name="brand_id" >
      <?php if(is_array($brand)): foreach($brand as $key=>$v): ?><option value="<?php echo ($v["brand_id"]); ?>" ><?php echo ($v["brand_name"]); ?></option><?php endforeach; endif; ?>
     </select>
    </td>
   </tr>

   <tr>
    <td style="text-align:right;">商品分类：</td>
    <td>
     <select class="textBox" name="type_id">
          <?php if(is_array($fen)): foreach($fen as $key=>$v): ?><option value="<?php echo ($v["type_id"]); ?>" ><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
     </select>
    </td>
   </tr>

   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" value="下一步" class="tdBtn"/></td>
   </tr>
  </table>
  </form>
 </div>
</body>
</html>