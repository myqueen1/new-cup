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
            <a href="<?php echo U('User/register');?>">注册</a>|<a class="login_btn">登录</a>
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

                }
            })
        });
    });
</script>


<div>

    <!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>叮咚有礼--购买</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
		<base href="/Public/">
		<link rel="stylesheet" href="css/demo.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/fen.css" />
		<link rel="stylesheet" type="text/css" href="css/swiper.min.css" />
		<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
		<script type="text/javascript" src="js/swiper.min.js"></script>
	</head>

	
		<div class="header2">
			<img src="img/phone_meau.png" class="meau" />
			<img src="img/logo.png" class="logo" />
			<a href="shop_car.html"><i class="iconfont">&#xe600;</i></a>
			<ul class="meau_box">
				<a href="index.html">
					<li>首页</li>
				</a>
				<a href="product.html">
					<li>叮咚一下</li>
				</a>
				<a href="blog.html">
					<li>BLOG</li>
				</a>
				<a href="personal.html">
					<li>个人中心</li>
				</a>
				<a href="message.html">
					<li>留言板</li>
				</a>
				<p style="border-right:1px #fff solid;" class="login_btn">登录</p>
				<a href="register.html">
					<p>注册</p>
				</a>
			</ul>
		</div>
		<div class="buy">
			<p class="crumb">
				<a>Home</a>>
				<a>All products</a>>大笑花束</p>
			<div class="buy_info">
				<div class="buy_img">
					<div class="page">
						<div class="middle_img">
							<img src="img/buy_img.jpg" style="display: block;">
							<img src="img/buy_img.jpg">
							<img src="img/buy_img.jpg">
							<img src="img/buy_img.jpg">
						</div>
						<div class="small_img">
							<img src="img/buy_img.jpg" class="active">
							<img src="img/buy_img.jpg">
							<img src="img/buy_img.jpg">
							<img src="img/buy_img.jpg">
						</div>
					</div>
				</div>
				<div class="buy_right">
					<p class="p1">本周特推|叮咚礼盒50G</p>
					<p class="p2">订购价：￥
						<font style="font-size: 23px;">99</font>
					</p>
					<p class="p3">规格：</p>
					<p class="p4 buy_p4">
						尺码：
						<span class="active">M10</span>
						<span>M13</span>
						<span>M16</span>
					</p>
					<p class="p3">花束数量：</p>
					<p class="p5">
						<span class="num">-</span>
						<input type="text" value="0" />
						<span class="num">+</span>
					</p>
					<span>花束设计</span>
					<p class="p6">
						<img src="img/like1.png" class="like"/>
						<span>999人喜欢</span>
					</p>
					<p class="p7">
						<a class="btn-buy">加入礼单</a>
						<a href="fill_order.html">立即购买</a>
					</p>
				</div>
			</div>
			<img src="img/info.jpg" class="info_img" />
		</div>
		<script>
			$('.btn-buy').bind('click',function(){
				var img = $(".middle_img").find('img');
				var flyElm = img.clone().css('opacity', 0.75);
				$('body').append(flyElm);
				flyElm.css({
					'z-index': 9000,
					'display': 'block',
					'position': 'absolute',
					'top': img.offset().top +'px',
					'left': img.offset().left +'px',
					'width': img.width() +'px',
					'height': img.height() +'px'
				});
				flyElm.animate({
					top: $('.head-shopcart').offset().top,
					left: $('.head-shopcart').offset().left,
					width: 20,
					height: 32
				}, 'slow', function() {
					flyElm.remove();
				});
			}); 
			</script>
		<div class="big_img">
			<img src="img/close2.png" class="close" />
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><span><img src="img/buy_img.jpg"></span></div>
					<div class="swiper-slide"><span><img src="img/buy_img.jpg"></span></div>
					<div class="swiper-slide"><span><img src="img/buy_img.jpg"></span></div>
					<div class="swiper-slide"><span><img src="img/buy_img.jpg"></span></div>
				</div>
			</div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
		<script type="text/javascript">
			var swiper = new Swiper(".swiper-container", {
				paginationClickable: true,
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				autoHeight: true, //enable auto height
			});
		</script>
		<div class="footer">
			<div class="footer_con">
				<p>享有 | enjoy</p>
				<img src="img/footer.png" />
			</div>
			<div class="footer_con2">
				<p>© 2015 dingdongyouli.com All rights reserved.</p>
				<img src="img/footer_p2.jpg" />
			</div>
		</div>
		<script>
			$(function() {
				var bool=true;
				$(".like").click(function(){
					if(bool){
						$(this).attr("src","img/like2.png");
						bool=false;
					}else{
						$(this).attr("src","img/like1.png");
						bool=true;
					}
				});
				$(".meau").on("click", function(e) {
					$(".meau_box").slideToggle();
					$(document).one("click", function() {
						$(".meau_box").slideUp();
					});
					e.stopPropagation();
				});
				$(".meau").on("click", function(e) {
					e.stopPropagation();
				});
				$(".small_img").children("img").click(function() {
					$(".small_img").children("img").removeClass("active");
					$(this).addClass("active");
					$(".middle_img").children("img").hide();
					$(".middle_img").children("img").eq($(".small_img").children("img").index(this)).fadeIn();
				});
				$(".buy_p4 span").click(function() {
					$(".buy_p4 span").removeClass("active");
					$(this).addClass("active");
				});
				$(".big_img").hide();
				$(".middle_img").children("img").click(function() {
					$(".big_img").css("display", "block");
				});
				$(".close").click(function() {
					$(".big_img").fadeOut();
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