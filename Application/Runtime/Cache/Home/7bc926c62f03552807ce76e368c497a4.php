<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>55° --SHOP</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <base href="/Public/frontend/">
    <link rel="stylesheet" href="css/Index/Indexstyle.css"/>
    <link href="css/Index/Indexstyle.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="css/demo.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/fen.css"/>
    <link rel="stylesheet" href="css/new_sou.css"/>
    <link rel="stylesheet" href="css/base.css" />
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css" />
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
</head>

<body>
<div class="header">
    <div class="hea_nav">
        <a href="<?php echo U('Index/index');?>"><img src="img/s0.png" class="logo"/></a>
        <ul>
            <a href="<?php echo U('Index/index');?>" title="网站首页">
                <li>首页</li>
            </a>
            <a href="<?php echo U('Goods/product');?>" title="进入商品页">
                <li>一杯(辈)子</li>
            </a>
            <a href="<?php echo U('User/personal');?>" title="您的个人中心">
                <li>个人中心</li>
            </a>
            <a href="<?php echo U('Blog/blog_list');?>" title="指尖蜜语,让我们告诉您杯子的故事">
                <li>指尖蜜语</li>
            </a>
            <a href="<?php echo U('Index/message');?>" title="看看网站留言">
                <li>留言板</li>
            </a>
        </ul>
    </div>
    <div class="hea_right">
        
<?php  $user_info = json_decode(cookie('user_info'),true); if(empty($user_info)){ ?>
    <p>
        <a href="<?php echo U('Login/register');?>">注册</a>|<a class="login_btn">登录</a>
        <a href="https://api.weibo.com/oauth2/authorize?client_id=2975497433&forcelogin=true&response_type=code&redirect_uri=http://cup.waip.top/index.php/Home/San/index">
       <img src="img/weibo.jpg" width="20px" height="20px">
       </a>
    </p>
<?php }else{ ?>
    <p>
        <a href="<?php echo U('User/personal');?>"><?php echo $user_info['user_nickname'] ?></a>
        <a href="javascript:void(0);" class="loginOut">退出</a>
        <a href="<?php echo U('User/ShoppingCart');?>">
            <p class="head-shopcart"><i class="iconfont">&#xe600;</i>购物车</p>
        </a>
    </p>
<?php } ?>
        
    </div>
</div>

<div>

    <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>叮咚有礼--留言</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
		<base href="/Public/">
		<link rel="stylesheet" href="css/demo.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link rel="stylesheet" href="css/fen.css" />
		<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
	</head>

	<body style="background: url(img/BG.jpg) center center;height: 100%;overflow: hidden;">
		<script>
			var _PageHeight = document.documentElement.clientHeight,
				_PageWidth = document.documentElement.clientWidth;
			//计算loading框距离顶部和左部的距离（loading框的宽度为215px，高度为61px）
			var _LoadingTop = _PageHeight > 61 ? (_PageHeight - 61) / 2 : 0,
				_LoadingLeft = _PageWidth > 215 ? (_PageWidth - 215) / 2 : 0;
			//在页面未加载完毕之前显示的loading Html自定义内容
			var _LoadingHtml = '<div id="loadingDiv" style="position:absolute;left:0;width:100%;height:' + _PageHeight + 'px;top:0;background:#f3f8ff;opacity:0.8;filter:alpha(opacity=80);z-index:10000;"><div style="position: absolute; cursor1: wait; left: ' + _LoadingLeft + 'px; top:' + _LoadingTop + 'px; width: auto; height: 57px; line-height: 57px; padding-left: 50px; padding-right: 5px; background: #fff url(img/load.gif) no-repeat scroll 5px 10px; border: 2px solid #95B8E7; color: #696969; font-family:\'Microsoft YaHei\';">页面加载中，请等待...</div></div>';
			//var _LoadingHtml=='<img src="img/load.gif" id="loadingDiv" style="left: ' + _LoadingLeft + 'px; top:' + _LoadingTop + 'px;"/>';
			//呈现loading效果
			document.write(_LoadingHtml);

			//window.onload = function () {
			//    var loadingMask = document.getElementById('loadingDiv');
			//    loadingMask.parentNode.removeChild(loadingMask);
			//};
			//监听加载状态改变
			document.onreadystatechange = completeLoading;

			//加载状态为complete时移除loading效果
			function completeLoading() {
				if(document.readyState == "complete") {
					var loadingMask = document.getElementById('loadingDiv');
					loadingMask.parentNode.removeChild(loadingMask);
				}
			}
		</script>
			<div class="message_box" style="overflow: hidden;margin: 0px auto;margin-top: 100px;">
				<img src="img/page1_p1.png" id="img1" />
				<div class="message" style="transform: translateY(-3408px);">
					<div class="page1">
						<div class="header2" style="display:block;">
							<img src="img/phone_meau.png" class="meau" />
							<a href="index.html"><img src="img/logo.png" class="logo" /></a>
							<a href="shop_car.html"><i class="iconfont">&#xe600;</i><span>1</span></a>
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
						<script>
							$(function() {
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
							});
						</script>
						
						<div class="xiang">
							<img src="img/text.png"/>
							<p>字传朋友圈</p>
							<p style="right:40px;">不如情唤朋友缘</p>
						</div>
						<img src="img/page1_p2.png" class="img2" />
						<img src="img/page1_p3.png" class="img3" />
						<img src="img/page1_p4.png" class="img4" />
						<a href="message2.html"><img src="img/zz.png" class="img5" /></a>
						<img src="img/page1_p6.png" class="img6" />
						<img src="img/page1_p7.png" class="img7" />
					</div>
					<div class="page2">
						<img src="img/page2_p1.png" class="img1" />
						<img src="img/page7_p2.png" class="img2" />
						<img src="img/page7_p3.png" class="img3" />
						<p class="word">记得，捎上你的心意问候<br />或者一切想说的话儿<br />因为有一天<br />如果礼物不再只是物品<br />那样的生活是多么美妙无比
						</p>
						<span>——爱你的杰</span>
						<img src="img/page2_p2.png" class="img4" />
						<img src="img/page2_p3.png" class="img5" />
						<img src="img/page7_p2.png" class="img6" />
						<img src="img/to.png" class="to_top"/>
					</div>
					<div class="page3">
						<img src="img/page3_p1.png" class="img1" />
						<img src="img/page3_p2.png" class="img2" />
						<img src="img/page7_p2.png" class="img3" />
						<img src="img/page7_p2.png" class="img4" />
						<img src="img/page1_p6.png" class="img5" />
						<p class="word">我们的人生因为各种各样<br /> 的礼物而丰富多彩，<br /> 因为种各样的礼物而变得有 <br />情谊有意义.</p>
						<img src="img/to.png" class="to_top"/>
					</div>
					<div class="page4">
						<img src="img/page4_p1.png" class="img1" />
						<img src="img/page4_p2.png" class="img2" />
						<img src="img/page3_p3.png" class="img3" />
						<img src="img/page7_p2.png" class="img4" />
						<img src="img/page2_p2.png" class="img5" />
					</div>
					<div class="page5">
						<p class="word">我们生活的城市没有绝对的完美 但我们会精心挑选 <br />我们眼里最美好的礼物 <br />因为TA值得最好 </p>
						<img src="img/page5_p1.png" class="img1" />
						<img src="img/page7_p2.png" class="img2" />
						<img src="img/page5_p2.png" class="img3" />
						<img src="img/page2_p3.png" class="img4" />
						<img src="img/to.png" class="to_top"/>
					</div>
					<div class="page6">
						<img src="img/page6_p5.png" class="img1" />
						<img src="img/page6_p1.png" class="img2" />
						<img src="img/page6_p3.png" class="img3" />
						<img src="img/page7_p3.png" class="img4" />
						<img src="img/page6_p4.png" class="img5" />
						<img src="img/page5_p2.png" class="img6" />
						<img src="img/page2_p3.png" class="img7" />
						<img src="img/page3_p3.png" class="img8" />
						<img src="img/page2_p2.png" class="img9" />
						<img src="img/page3_p2.png" class="img10" />
						<img src="img/page5_p2.png" class="img11" />
					</div>
					<div class="page7">
						<img src="img/page7_p1.png" class="img1" />
						<img src="img/page7_p2.png" class="img2" />
						<img src="img/page7_p3.png" class="img3" />
						<img src="img/page7_p4.png" class="img4" />
						<img src="img/page7_p5.png" class="img5" />
						<img src="img/page7_p6.png" class="img6" />
						<p>至小丸子</p>
					</div>
				</div>
			</div>
		<!--音樂-->
		<audio autoplay="autoplay" controls="controls" id="yin" style="opacity: 0;">
		  <source src="yin.mp3" type="audio/mpeg">
			Your browser does not support the audio element.
		</source>
		</audio>
		<script type="text/javascript">
			$(function(){
				$(".page1").find(".img4").click(function(){
					$(".page1").find(".xiang").fadeIn();
					$(".page1").find(".xiang").children("img").addClass("xiang_p");
					$(".page1").find(".xiang").children("p").addClass("xiang_p");
					$(".xiang").click(function(){
						$(this).hide();
					});
					setTimeout(function(){
						$(".xiang").hide();
					},5000);
				});
			});
		</script>
		<script type="text/javascript">
		if(window.screen.width < 800) {
			var wechatInfo = navigator.userAgent.match(/MicroMessenger\/([\d\.]+)/i);
			if(wechatInfo[1] < "6.0") {
				alert("为了看到更好的页面效果，请更新你的微信!");
			}
		}
		</script>
		<script>
			var x = document.getElementById("yin");
			var bo=true;
			$("#img1").click(function(){
				if(bo){
					x.pause();
					$(this).removeClass("pg1_img").css("opacity","1");
					$(this).attr("src","img/pause.png")
					bo=false;
				}else{
					x.play();
					$(this).addClass("pg1_img");
					$(this).attr("src","img/page1_p1.png")
					bo=true;
				}
			});
		</script>
		<!--音樂-->
		<script>
			$(function() {
				$(".word").each(function() {
					var old = $(this).text();
					var len = $(this).text().length;
					var nn = old.substring(0, 2);
					var ee = old.substring(2, len);
					$(this).html("<font style='font-size: 30px;'>" + nn + "</font>" + ee);
				});
				$("#img1").addClass("pg1_img");
				$(".page7").find(".img4").addClass("qiu");
				$(".page7").find(".img5").addClass("qiu2");
				$(".page7").find(".img6").addClass("qiu3");
				$(".page7").find(".img2").addClass("left_yue");
				$(".page7").find(".img3").addClass("right_yue");
				$(".page7").find("p").addClass("qiu4");
				$(".page7").find(".img1").addClass("qiu5");
			});
			document.body.addEventListener('touchmove', function(event) {
				event.preventDefault();
			}, false);
		</script>
		<!--滚动效果-->
		<script>
			$(function() {
				$(".page7").find(".img6").click(function() {
					$(".message").addClass("big");
					$(".page6").find(".img11").addClass("p6_an1");
					$(".page6").find(".img8").addClass("p6_an2");
					$(".page6").find(".img9").addClass("p6_an3");
					$(".page6").find(".img10").addClass("p6_an4");
					$(".page6").find(".img5").addClass("p6_an5");
					$(".page6").find(".img6").addClass("p6_an6");
					$(".page5").find("p").addClass("pg5_p");
					$(".page5").find(".img4").addClass("pg5_img4");
					$(".page5").find(".img3").addClass("pg5_img3");
					$(".page5").find(".img2").addClass("pg5_img2");
					$(".page5").find(".to_top").addClass("tt");
				});
				$(".page5").find(".to_top").click(function() {
					$(".message").addClass("big2");
					$(".page5").find(".img3").addClass("p6_an7");
					$(".page4").find(".img4").addClass("left_yue2");
					$(".page4").find(".img3").addClass("pg5_img2");
					$(".page4").find(".img5").addClass("pg5_img");
					$(".page3").find(".img5").addClass("pg5_img3");
					$(".page3").find(".img4").addClass("page3_img4");
					$(".page3").find(".img2").addClass("pg5_i3");
					$(".page3").find("p").addClass("pg3_p");
					$(".page3").find(".img1").addClass("pg5_i1");
					$(".page3").find(".img3").addClass("page3_img3");
					$(".page3").find(".to_top").addClass("tt");
				});
				$(".page3").find(".to_top").click(function() {
					$(".message").addClass("big3");
					$(".page2").find("p").addClass("pg2_p");
					$(".page2").find("span").addClass("pg2_p");
					$(".page2").find(".img6").addClass("p2_right_yue");
					$(".page2").find(".img5").addClass("pg5_img");
					$(".page2").find(".img4").addClass("pg2_img4");
					$(".page2").find(".img1").addClass("pg2_img1");
					$(".page2").find(".img2").addClass("page3_img3");
					$(".page2").find(".img3").addClass("right_yue");
					$(".page2").find(".to_top").addClass("tt2");
					$(".page3").find(".img2").addClass("p6_an8");
				});
				$(".page2").find(".to_top").click(function() {
					$(".message").addClass("big4");
					$(".page1").find(".img2").addClass("pg3_img1");
					$(".page1").find(".img4").addClass("p1_left_yue");
					$(".page1").find(".img5").addClass("p1_right_yue");
					$(".page1").find(".img1").addClass("pg1_img");
					$(".page1").find(".img3").addClass("pg3_img1");
					$(".page2").find(".img4").addClass("p6_an8");
					$(".page1").find(".img6").addClass("p6_an9");
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
                <input type="text" name="user_tel" placeholder="请输入注册的手机号"/>
            </p>
            <p class="list">
                <img src="img/login_pic3.png"/>
                <input type="password" name="user_pass" placeholder="请输入您设置的密码"/>
            </p>
            <p class="Hint"></p>
            <p><a href="javascript:void(0)" class="sub">登录</a></p>
        </form>
    </div>
</div>

    <div class="footer">
        <div class="footer_con">
            <div class="ydc-right-banner">
                <div class="slideshow-container">
                    <a href="www.baidu.com" target="_blank" class="mySlides fade">
                        <img src="/Public/frontend/img/ad1.jpg" style="width:100%">
                    </a>
                    <a href="" target="_blank" class="mySlides fade">
                        <img src="/Public/frontend/img/ad2.jpg" style="width:100%">
                    </a>
                    <a href="" target="_blank" class="mySlides fade">
                        <img src="/Public/frontend/img/ad3.jpg" style="width:100%">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer_con2">
            <p>© 2015 dingdongyouli.com All rights reserved.</p>
            <img src="img/footer_p2.jpg" />
        </div>
    </div>

</body>
<script>
    $(function () {
        $(".meau").on("click", function (e) {
            $(".meau_box").slideToggle();
            $(document).one("click", function () {
                $(".meau_box").slideUp();
            });
            e.stopPropagation();
        });
        $(".close").click(function(){
            $(".login_bg").fadeOut();
        });
        $(".login_btn").click(function() {
            $(".login_bg").slideDown();
            $(".meau_box").slideUp();
        });

        $(".meau").on("click", function (e) {
            e.stopPropagation();
        });
    });
</script>
<script>
    $(".sub").click(function () {
        //获取用户填写验证码
        var user_tel  = $("input[name='user_tel']").val();
        var user_pass = $("input[name='user_pass']").val();
        //编写手机号正则  密码正则
        var tel_myreg = /^[1][3,4,5,7,8][0-9]{9}$/;
        var pass_myreg= /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,18}$/;
        //判断是否通过请求 然后再去请求控制器
        if (tel_myreg.test(user_tel) && pass_myreg.test(user_pass)) {
            $('.Hint').html('');
            $.ajax({ 
                url:"<?php echo U('Login/login');?>",type:"POST",dataType:"json",
                data:{'user_tel':user_tel,'user_pass':user_pass}, 
                success:function (comeback) {
                    //console.log(comeback)
                    if(comeback.code == 'success'){
                        $('.Hint').html('<font color="green" size="1">'+comeback.msg+'</font>');
                        setTimeout(function(){
                            window.location.reload();//刷新当前页面.
                        },1500)
                    }else{
                        $('.Hint').html('<font color="red" size="1">'+comeback.msg+'</font>');
                    }
                }
            })
        } else {
            $('.Hint').html('<font color="red" size="1">请输入格式正确的手机号 或 密码</font>');
        };
    });
</script>
<script>
    $('.loginOut').on('click',function(){
        if (confirm("你确定退出登录吗？")) { 
            $.ajax({url:"<?php echo U('Login/SingOut');?>",type:"GET",
                success:function (comeback) {
                    window.location.reload();
                }
            })
        }
    })
</script>
<script type="text/javascript">
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex> slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 3000); // 滚动时间
    }
</script>
</html>