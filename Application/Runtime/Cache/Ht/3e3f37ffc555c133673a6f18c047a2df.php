<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>广告列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <base href="/Public/backend/">
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>广告列表</em></span>
    <span class="modular fr"><a href="<?php echo U('Five/advertising');?>" class="pt-link-btn">+添加广告</a></span>
  </div>
  <table class="list-style Interlaced">
   <tr>
       <th>名称</th>
       <th>轮播图</th>
       <th>是否显示</th>
       <th>操作</th>
   </tr>
<?php if(is_array($path)): foreach($path as $key=>$vo): ?><tr>
        <td>
            <?php echo ($vo["extension_keywords"]); ?>
        </td>
        <td>
            <img src="<?php echo ($vo["extension_img"]); ?>" alt="" width="200"  height="100" >
        </td>
        <td>
            <?php if($vo['is_show'] == 0 ): ?><img src="/Public/backend/images/no.gif">
                <?php else: ?>
                <img src="/Public/backend/images/yes.gif"><?php endif; ?>
        </td>
        <td class="center">
            <a href="advertising.html" title="编辑"><img src="images/icon_edit.gif"/></a>
            <a title="删除"><img src="images/icon_drop.gif"/></a>
        </td>
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
	   <a>第一页</a>
	   <a>1</a>
	   <a>最后一页</a>
	  </div>
  </div>
 </div>
</body>
</html>