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
	<base href="/Public/">
	<link rel="stylesheet" href="css/demo.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/fen.css" />
	<script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
</head>
<body>
	<div class="register">
		<p class="res_title">用户注册</p>
		<div class="res_box">
			<ul class="res_nav">
				<li class="active">
					<i class="iconfont">&#xe602;</i>
					<span>手机注册</span>
				</li>
				<li>
					<i class="iconfont">&#xe603;</i>
					<span>邮箱注册</span>
				</li>
				<li>
					<i class="iconfont">&#xe604;</i>
					<span>用户名注册</span>
				</li>
			</ul>
			<div class="res_form" id="res_form">
				<form action="<?php echo U('Index/index');?>" mentend="post">
					<p class="res_list">
						<span>手机号码</span>
						<input type="user_tel" id="telphone" title="请输入手机号码" onkeyup="validate_tel()"/>
					</p>
					<p class="tip">仅支持中国大陆地区手机号码！</p>
						<p class="res_list" style="margin-top: 0px;">
							<span>手机验证码</span>
							<input type="text" id="code" style="width: 70px;" title="请输入接收到的手机验证码" onkeyup="validate_code()"/>
							<span class="yan_code">获取验证码</span>
						</p>
					<p class="res_list">
						<span>设置密码</span>
						<input type="password" id="password" title="6-18位数字字母组合"/>
					</p>
					<p class="res_list">
						<span>确认密码</span>
						<input type="password" id="password1" onkeyup="validate_pass()" title="请输入确认密码"/>
						<span id="tishi"></span>
					</p>
					<p class="res_btn">注册</p>
				</form>
				<p>已有账号？请<a style="color: #AE191B;" class="login_btn">直接登录</a></p>
			</div>
			<div class="res_form" style="padding-top: 40px;display: none;">
				<h1>该通道已关闭</h1>
			</div>
			<div class="res_form" style="padding-top: 20px;display: none;">
				<h1>该通道已关闭</h1>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
    $(function(){
        $(".close").click(function(){
            $(".login_bg").fadeOut();
        });
        $(".login_btn").click(function(){
            $(".login_bg").slideDown();
            $(".meau_box").slideUp();
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $(".res_nav").children("li").click(function(){
            $(".res_nav").children("li").stop().removeClass("active");
            $(this).stop().addClass("active");
            $(".res_form").stop().slideUp();
            $(".res_form").eq($(".res_nav").children("li").index(this)).stop().slideDown();
        });
    });
</script>
<script type="text/javascript">
$(".yan_code").on('click',function(){
	var telphone = $('#telphone').val();
	var back_tel = validate_tel();

	if (back_tel) {
        $.ajax({
            url:"<?php echo U('Send/SendMessage');?>",type:'GET',dataType:'json',
            data:{telphone:telphone},
            success:function(comeback){
            	console.log(comeback)

            	if(comeback.code == 'success'){
            		$('.yan_code').html("验证码已发送...")
					$(".yan_code").unbind();
            	} else{
            		$('.tip').html("<font color='red'>"+comeback.msg+"</font>")
            	}
            }
        });
	};
});

//验证手机号方法
function validate_tel(){
	var telphone = $('#telphone').val();

	var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
	if (!myreg.test(telphone)) {
		$('.tip').html("<font color='red'>手机号格式不正确</font>")
		return false;
	} else {
		$(".tip").html("仅支持中国大陆地区手机号码！");
        return true;
	}
}

//验证两次密码方法
function validate_pass() {
    var pwd1 = $("#password").val();
    var pwd2 = $("#password1").val();
    var mreg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,18}$/;

    if (mreg.test(pwd1)) {
    	//对比两次输入的密码 
	    if(pwd1 == pwd2){
	        $("#tishi").html("");
	        return true;
	    }else {
	        $("#tishi").html("两次密码不相同");
	        $("#tishi").css("color","red")
	        $("button").attr("disabled","disabled");  
	        return false;
	    }
    } else {
    	$("#tishi").html("密码不能为纯数字或空！");
	    $("#tishi").css("color","red")
    	return false;
    };
}

//判断验证码方法
function validate_code(){
	var code = $('#code').val();
	var mreg = /^[0-9]{6}$/;
	if (mreg.test(code)) {
		return true;
	}else {
		return false;
	};
}

//点击注册时验证全部input框，然后发送数据入口保存
$('.res_btn').on('click',function(){
	var back_tel  = validate_tel();
	var back_code = validate_code();
	var back_pass = validate_pass();

	if (back_tel && back_pass && back_code) {

		var telphone = $('#telphone').val();
		var pwd1 	 = $("#password").val();
		var code 	 = $('#code').val();
		//判断用户输入眼验证码是否正确
		$.ajax({
			url:"<?php echo U('Send/Verification');?>",
			type:"GET",dataType:'json',data:{code:code},
			success:function(comeback){
				if (comeback == 1) {
					//将数据发送到后台入库
					$.ajax({
						url:"<?php echo U('Login/register');?>",dataType:'json',type:'POST',
						data:{tel:telphone,pass:pwd1},
						success:function(come){
							if (come.code == 'success') {
								$("#tishi").html("<font color='green' size='2'>"+come.msg+"</font>");
								setTimeout(function(){
			                        window.location.href = "<?php echo U('Index/index');?>";
			                    },1500)
								
							} else{
								$('.tip').html("<font color='red'>"+come.msg+"</font>")
							};
						}
					})
				} else {
					alert('验证码不正确，请核对后重试！')
				};
			}
		})
	} else {
		if (!back_code) {
			alert('验证码格式不正确，请核对后重试！')
		};
		return false;
	};
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