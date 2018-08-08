<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>产品列表</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/Public/backend/style/adminStyle.css" rel="stylesheet" type="text/css" />
	<script src="/Public/backend/js/jquery.js"></script>
	<script src="/Public/backend/js/public.js"></script>
</head>
<body>
	<div class="wrap">
		<div class="page-title">
			<span class="modular fl"><i></i><em>产品列表</em></span>
			<span class="modular fr">
			<a href="<?php echo U('edit_product');?>" class="pt-link-btn">+添加商品</a>
			</span>
		</div>
		<div class="operate">
			<form>
				<input type="text" class="textBox length-long" placeholder="输入商品名称..."/>
				<input type="button" value="查询" class="tdBtn"/>
			</form>
		</div>
		<table class="list-style Interlaced">
			<tr>
				<th>ID编号</th>
				<th>产品</th>
				<th>名称</th>
				<th>商品原价</th>
				<th>商品售价</th>
				<th>库存</th>
				<th>状态</th>
				<th>热销</th>
				<th>操作</th>
			</tr>

		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
			<td>
				<span>
					<input type="checkbox" class="middle children-checkbox"/>
					<i><?php echo ($v["goods_id"]); ?></i>
				</span>
			</td>
			<td class="center pic-area">
				<img src="<?php echo ($v["goods_cover"]); ?>" class="thumbnail"/>
			</td>
			<td class="td-name">
				<span class="ellipsis td-name block"><?php echo ($v["goods_name"]); ?></span>
			</td>
			<td class="center">
				<span><i>￥</i><em><?php echo ($v["goods_original"]); ?></em></span>
			</td>
			<td class="center">
				<span><i>￥</i><em><?php echo ($v["goods_price"]); ?></em></span>
			</td>
			<td class="center"><?php echo ($v["goods_stock"]); ?>件</td>
			<td class="center">
				<select class="change" data-id="<?php echo ($v["goods_id"]); ?>">
					<option <?php if($v['goods_status']==2){ echo 'selected'; } ?> value="2">售卖中</option>
					<option <?php if($v['goods_status']==1){ echo 'selected'; } ?> value="1">待审核</option>
					<option <?php if($v['goods_status']==0){ echo 'selected'; } ?> value="0">下架</option>
				</select>
			</td>
			<td class="center" data-id='<?php echo ($v["goods_id"]); ?>'>
				<?php if($v['is_hot']==1){ ?>
					<img class="hot_good" data-id='0' src="/Public/backend/images/yes.gif"/>
				<?php }else{ ?>
					<img class="hot_good" data-id='1' src="/Public/backend/images/no.gif"/>
				<?php } ?>
			</td>
			<td class="center">
				<a href="edit_product.html" title="添加商品规格">
					<img src="/Public/backend/images/icon_edit.gif"/>
				</a>&nbsp;&nbsp;&nbsp;
				<a title="删除">
					<img src="/Public/backend/images/icon_trash.gif"/>
				</a>
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
<script>
	$("#del").click(function(){
		// $(":checkbox").toggle("checked")
	})
</script>
<script>
	$(".change").on('change',function(){
		var status  = $(this).children('option:selected').val();
		var good_id = $(this).attr('data-id');
		
		$.ajax({
			url:"<?php echo U('Goods/AjaxUpdateStatus');?>",
			dataType:'json',type:'GET',
			data:{status:status,id:good_id},
			success:function(comeback){
				//alert(status)
				if (comeback.status == 'error') {
					alert(comeback.message)
					window.location.href="<?php echo U('Goods/product_list');?>"
				};
			}
		});
	})
</script>
<script>
	$('.hot_good').on('click',function(){
		var is_hot = $(this).attr('data-id');
		var goods  = $(this).parent().attr('data-id');
		var _this  = $(this);

		$.ajax({
			url:"<?php echo U('Goods/AjaxUpdateHot');?>",
			dataType:'json',type:'GET',
			data:{is_hot:is_hot,id:goods},
			success:function(comeback){
				//alert(goods)
				if (comeback.status == 'error') {
					alert(comeback.message)
					window.location.href="<?php echo U('Goods/product_list');?>"
				} else {
					if (is_hot == 1) {
						_this.attr('src','/Public/backend/images/yes.gif')
					} else {
						_this.attr('src','/Public/backend/images/no.gif')
					};
				};
			}
		})
	})
</script>
</html>