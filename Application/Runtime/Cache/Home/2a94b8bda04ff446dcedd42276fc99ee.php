<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>55°--BLOG</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <base href="/new-cup/Public/frontend/">
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
            <a href="<?php echo U('Index/index');?>">
                <li>首页</li>
            </a>
            <a href="<?php echo U('Goods/product');?>">
                <li>一杯(辈)子</li>
            </a>
            <a href="<?php echo U('Blog/blog_list');?>">
                <li>BLOG</li>
            </a>
            <a href="<?php echo U('User/personal');?>">
                <li>个人中心</li>
            </a>
            <a href="<?php echo U('Index/message');?>">
                <li>留言板</li>
            </a>
        </ul>
    </div>
    <div class="hea_right">
        
<?php  $user_info = json_decode(cookie('user_info'),true); if(empty($user_info)){ ?>
    <p>
        <a href="<?php echo U('Login/register');?>">注册</a>|<a class="login_btn">登录</a>
    </p>
<?php }else{ ?>
    <p>
        <a href="<?php echo U('User/personal');?>"><?php echo $user_info['user_nickname'] ?></a>
        <a href="javascript:void(0);" class="loginOut">退出</a>
        <a href="<?php echo U('User/ShoppingCart');?>">
            <p class="head-shopcart">
                <i class="iconfont">&#xe600;</i><span>0件</span>
            </p>
        </a>
    </p>
<?php } ?>
        
    </div>
</div>

<div>

    <!DOCTYPE html>
<html>
<body>
<div class="banner">
	<div class="index_b_hero">
		<div class="hero-wrap">
			<ul class="heros">
				<li class="hero"><a href="javascript:void(0);"><img class="thumb" src="images/img01.jpg" /></a></li>
				<li class="hero"><a href="javascript:void(0);"><img class="thumb" src="images/img02.jpg" /></a></li>
				<li class="hero"><a href="javascript:void(0);"><img class="thumb" src="images/img03.jpg" /></a></li>
				<li class="hero"><a href="javascript:void(0);"><img class="thumb" src="images/img04.jpg" /></a></li>
				<li class="hero"><a href="javascript:void(0);"><img class="thumb" src="images/img05.jpg" /></a></li>
				<li class="hero"><a href="javascript:void(0);"><img class="thumb" src="images/img06.jpg" /></a></li>
				<li class="hero"><a href="javascript:void(0);"><img class="thumb" src="images/img07.jpg" /></a></li>
			</ul>
		</div>
		<div class="helper">
			<div class="mask-left"></div>
			<div class="mask-right"></div>
			<a href="javascript:;" class="page_btn prev"></a>
			<a href="javascript:;" class="page_btn next"></a>
		</div>
	</div>
	
	<div id="lt_ss_tus" class="little_img">
		<ul class="small_list">
			<li class="on">
				<img id="0" src="images/img01.jpg" height="65" width="162">
				<div class="bg"></div>
			</li>
			<li>
				<img id="1" src="images/img02.jpg" height="65" width="162">
				<div class="bg"></div>
			</li>
			<li>
				<img id="2" src="images/img03.jpg" height="65" width="162">
				<div class="bg"></div>
			</li>
			<li>
				<img id="3" src="images/img04.jpg" height="65" width="162">
				<div class="bg"></div>
			</li>
			<li>
				<img id="4" src="images/img05.jpg" height="65" width="162">
				<div class="bg"></div>
			</li>
			<li>
				<img id="5" src="images/img06.jpg" height="65" width="162">
				<div class="bg"></div>
			</li>
			<li class="last">
				<img id="6" src="images/img07.jpg" height="65" width="162">
				<div class="bg"></div>
			</li>
		</ul>
	</div>
</div>

	<!-- <div class="box1">
		<img src="img/s1.jpg" class="pc_h" />
		<img src="img/mobile_h.jpg" class="mobile_h" />
	</div> -->
	
	

	<div class="img_box">
		<img src="img/z1.gif" class="pc" />
	</div>
	<div class="ydc-right-banner">
		<div class="slideshow-container">
			<a href="https://xihazahuopu.taobao.com/" target="_blank" class="mySlides fade">
				<img src="/new-cup/Public/frontend/img/ad1.jpg" style="width:100%">
			</a>
			<a href="https://weibo.com/525135676" target="_blank" class="mySlides fade">
				<img src="/new-cup/Public/frontend/img/ad2.jpg" style="width:100%">
			</a>
			<a href="http://www.a-ui.cn/" target="_blank" class="mySlides fade">
				<img src="/new-cup/Public/frontend/img/ad3.jpg" style="width:100%">
			</a>
		</div>
	</div>
</body>
<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="js/carousel_focus.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		$(".login_btn").click(function() {
			$(".login_bg").slideDown();
			$(".meau_box").slideUp();
		});
	});
</script>
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