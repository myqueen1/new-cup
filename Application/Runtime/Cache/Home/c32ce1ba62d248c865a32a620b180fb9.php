<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>叮咚有礼--BLOG</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport"
          content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <base href="/Public/frontend/">
    <link rel="stylesheet" href="css/demo.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/fen.css"/>
    <script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
</head>

<body>
<div class="header">
    <div class="hea_nav">
        <a href="<?php echo U('Index/index');?>"><img src="img/logo.png" class="logo"/></a>
        <ul>
            <a href="<?php echo U('Index/index');?>">
                <li>首页</li>
            </a>
            <a href="<?php echo U('Index/product');?>">
                <li>叮咚一下</li>
            </a>
            <a href="<?php echo U('Index/blog');?>">
                <li>BLOG</li>
            </a>
            <a href="<?php echo U('Index/personal');?>">
                <li>个人中心</li>
            </a>
            <a href="<?php echo U('Index/message');?>">
                <li>留言板</li>
            </a>
        </ul>
    </div>
    <div class="hea_right">
        <p>
            <?php $arr=cookie('user')?>
            <?php if(empty($arr)){ ?>
            <a href="<?php echo U('User/register');?>">注册</a>|<a class="login_btn">登录</a>
            <?php }else{ ?>
            用户名：<a href="<?php echo U('User/personal');?>"><?php echo $arr[1] ?></a>
            <a href="<?php echo U('User/register');?>">注册</a>|<a href="<?php echo U('User/Singout');?>">退出</a>
            <?php } ?>
        </p>
        <a href="shop_car.html"><p>
            <i class="iconfont">&#xe600;</i>
            <span>0件</span>
        </p>
        </a>


    </div>
</div>

<script>
    $(function () {
        $(".meau").on("click", function (e) {
            $(".meau_box").slideToggle();
            $(document).one("click", function () {
                $(".meau_box").slideUp();
            });
            e.stopPropagation();
        });
        $(".meau").on("click", function (e) {
            e.stopPropagation();
        });

        $(".sub").click(function () {
            var name=$("input[name='name']").val();
            var user_pass=$("input[name='user_pass']").val();
//            alert(user_pass);
//            alert("<?php echo U('User/login');?>");
            $.ajax({
                url:"<?php echo U('User/login');?>",
                type:"POST",
                data: {
                    'name':name,
                    'user_pass':user_pass
                    },
                dataType:"json",
                success:function (e) {
                    if(e==1){
                        window.location=("<?php echo U('Index/index');?>");
//                        alert(1);
                    }else{
                        window.location=("<?php echo U('Index/index');?>");
//                        alert(2)
                    }
                }
            })
        });
    });
</script>


<div>

    <!DOCTYPE html>
<html>


	<body>

		<div class="personal">
			<p class="title">我的账户<span>您好，kore.倩</span></p>
			<ul class="per_nav">
				<li class="active">我的订单</li>
				<li>基本信息</li>
				<li>我的优惠卷</li>
				<li>我的留言</li>
				<li>密码修改</li>
			</ul>
			<ul class="per_nav2">
				<li class="active">订单</li>
				<li>信息</li>
				<li>优惠卷</li>
				<li>留言</li>
			</ul>
			<div class="per_box">
				<ul class="per_navul">
					<li style="width: 130px;margin-right: 10px;">
						<input type="checkbox" style="margin-right: 20px;"/>
						全选
					</li>
					<li style="width: 450px;text-align: left;">商品名称</li>
					<li>单价</li>
					<li>数量</li>
					<li>合计</li>
					<li>专属码</li>
					<li>状态</li>
				</ul>
				<ul class="per_listul">
					<li style="width: 130px;margin-right: 10px;">
						<input type="checkbox" style="margin-right: 10px;margin-left: 18px;"/>
						<img src="img/order_pic5.jpg" style="vertical-align: middle;"/>
					</li>
					<li style="width: 450px;text-align: left;">泉立方防串染色母片</li>
					<li>￥49</li>
					<li>2</li>
					<li>￥98</li>
					<li>8800</li>
					<li>已完成</li>
					<p>送货地址：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
				</ul>
			</div>
			<div class="per_box per_info" style="display: none;">
				<form action="" method="post">
					<p>
						<span>昵称</span>
						<input type="text" value="八月"/>
						<span>修改</span>
					</p>
					<p>
						<span>邮箱地址</span>
						<input type="email" value="1017848476@qq.com"/>
						<span>修改</span>
					</p>
					<p>
						<span>手机号码</span>
						<input type="tel" value="15281083076" />
						<span>修改</span>
					</p>
					<p class="per_info_btn">保存</p>
				</form>
			</div>
			<div class="per_box per_coupon" style="display: none;">
				<ul class="per_couponul">
					<li class="active">未使用(4)</li>
					<li>已使用(1)</li>
					<li>已过期(2)</li>
				</ul>
				<div class="per_coupon_box">
					<div class="per_coupon_list">
						<p>￥40</p>
						<p>【消费满200元可用】</p>
						<p>2016-1-11——2016-2-22</p>
					</div>
					<div class="per_coupon_list">
						<p>￥40</p>
						<p>【消费满200元可用】</p>
						<p>2016-1-11——2016-2-22</p>
					</div>
					<div class="per_coupon_list">
						<p>￥40</p>
						<p>【消费满200元可用】</p>
						<p>2016-1-11——2016-2-22</p>
					</div>
					<div class="per_coupon_list">
						<p>￥40</p>
						<p>【消费满200元可用】</p>
						<p>2016-1-11——2016-2-22</p>
					</div>
				</div>
				<div class="per_coupon_box" style="display: none;">
					<div class="per_coupon_list per_coupon_old">
						<p>￥40</p>
						<p>【消费满200元可用】</p>
						<p>2016-1-11——2016-2-22</p>
					</div>
				</div>
				<div class="per_coupon_box" style="display: none;">
					<div class="per_coupon_list per_coupon_old">
						<p>￥40</p>
						<p>【消费满200元可用】</p>
						<p>2016-1-11——2016-2-22</p>
					</div>
					<div class="per_coupon_list per_coupon_old">
						<p>￥40</p>
						<p>【消费满200元可用】</p>
						<p>2016-1-11——2016-2-22</p>
					</div>
				</div>
			</div>
			<div class="per_box" style="display: none;">
				我的留言
			</div>
			<div class="per_box per_info" style="display: none;">
				<form action="" method="post">
					<p>
						<span>旧密码</span>
						<input type="password"/>
					</p>
					<p>
						<span>新密码</span>
						<input type="password"/>
					</p>
					<p>
						<span>确认新密码</span>
						<input type="password"/>
					</p>
					<p class="per_info_btn">保存</p>
				</form>
			</div>
		</div>
		<script>
			$(function(){
				$(".per_couponul li").click(function(){
					$(".per_couponul li").removeClass("active");
					$(this).addClass("active");
					$(".per_coupon_box").hide();
					$(".per_coupon_box").eq($(".per_couponul li").index(this)).fadeIn();
				});
				$(".per_nav li").click(function(){
					$(".per_nav li").removeClass("active");
					$(this).addClass("active");
					$(".per_box").hide();
					$(".per_box").eq($(".per_nav li").index(this)).fadeIn();
				});
				$(".per_nav2 li").click(function(){
					$(".per_nav2 li").removeClass("active");
					$(this).addClass("active");
					$(".per_box").hide();
					$(".per_box").eq($(".per_nav2 li").index(this)).fadeIn();
				});
			});
				</script>



	</body>

</html>

</div>


<div class="login_bg">
    <div class="login">
        <img src="img/close.png" class="close"/>
        <img src="img/login.png" style="margin: 25px 0px;"/>
        <form action="" method="post">
            <p class="list">
                <img src="img/login_pic2.png"/>
                <input type="text" name="name" placeholder="请输入注册时的邮箱/手机号"/>
            </p>
            <p class="list">
                <img src="img/login_pic3.png"/>
                <input type="password" name="user_pass" placeholder="请输入密码"/>
            </p>
            <a href="find.html">忘记密码?</a>
            <p>
                <a href="javascript:void(0)" class="sub">登录</a>
            </p>
        </form>
    </div>
</div>


<!--<div class="footer">-->
    <!--<div class="footer_con">-->
        <!--<p>享有 | enjoy</p>-->
        <!--<img src="img/footer.png"/>-->
    <!--</div>-->
    <!--<div class="footer_con2">-->
        <!--<p>© 2015 dingdongyouli.com All rights reserved.</p>-->
        <!--<img src="img/footer_p2.jpg"/>-->
    <!--</div>-->

<!--</div>-->

</body>

</html>