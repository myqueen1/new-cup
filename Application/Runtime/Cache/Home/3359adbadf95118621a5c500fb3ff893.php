<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>叮咚有礼--BLOG</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport"
          content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <base href="/18-08-03/cup/new-cup/Public/frontend/">
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
<head>
	<meta charset="utf-8" />
	<title>叮咚有礼--注册</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
	<base href="/18-08-03/cup/new-cup/Public/">
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
			<div class="res_form">
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
	<div class="login_bg">
		<div class="login">
			<img src="img/close.png" class="close"/>
			<img src="img/login.png" style="margin: 25px 0px;"/>
			<form action="" method="post">
				<p class="list">
					<img src="img/login_pic2.png"/>
					<input type="text" placeholder="请输入注册时的邮箱/手机号"/>
				</p>
				<p class="list">
					<img src="img/login_pic3.png"/>
					<input type="password" placeholder="请输入注册时的邮箱/手机号"/>
				</p>
				<p>
					<a href="register.html" >注册</a>
					<a>登录</a>
				</p>
			</form>
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
            url:"<?php echo U('Send/SendMessage');?>",
            type:'GET',
            dataType:'json',
            data:{telphone:telphone},
            success:function(comeback){
            	console.log(comeback)

            	if(comeback.status == '200'){
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
						url:"<?php echo U('User/register');?>",dataType:'json',type:'POST',
						data:{tel:telphone,pass:pwd1},
						success:function(come){
							if (come == 1) {
								alert('注册成功，请稍后。。。')
								window.location.href="<?php echo U('Index/index');?>"
							} else{
								$('.tip').html("<font color='red'>系统错误，请稍后重试！</font>")
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