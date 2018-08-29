<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en" class="login-content" data-ng-app="materialAdmin">
<head>
	<meta charset="utf-8"/>
    <title>55° --SHOP</title>
	<base href="/Public/frontend/">
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link href="css/material/css/material.css" rel="stylesheet" type="text/css">
	<link href="css/app.min.1.css" rel="stylesheet" type="text/css">
</head>
<body class="login-content" data-ng-controller="loginCtrl as lctrl">
	<div class="lc-block" id="l-login" data-ng-class="{'toggled':lctrl.login === 1}">
		<h1 class="lean">55° - shop</h1>

			<div class="input-group m-b-20">
				<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
				<div class="fg-line">						
					<input type="text" name="user_tel" class="form-control" placeholder="请输入您注册的手机号" regex="^[1][3,4,5,7,8][0-9]{9}$"/>
				</div>
			</div>

			<div class="input-group m-b-20">
				<span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
				<div class="fg-line">
					<input type="password" name="user_pass" class="form-control" placeholder="请输入您的密码" regex="^\w+"/>
				</div>
			</div>

			<div class="checkbox">
				<label>
					<input type="checkbox" value="" />
					<i class="input-helper">请记住我,下次我不想登陆了</i>
				</label>
				
			</div>
			<span class="Hint"></span>
			<ul class="login-navigation">
				<li class="bgm-red"> - 注 册 - </li>
				<li data-block="#l-forget-password" class="bgm-orange">忘记密码？</li>
			</ul>

			<a href="javascript:void(0);" id="Login-in" title="点击登录" class="btn btn-login btn-danger btn-float">
				<i class="zmdi zmdi-arrow-forward"></i>
			</a>
	</div>
</body>
<script src="js/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Angular -->
<script src="js/bower_components/angular/angular.min.js"></script>
<script src="js/bower_components/angular-resource/angular-resource.min.js"></script>
<script src="js/bower_components/angular-animate/angular-animate.min.js"></script>
<!-- Angular Modules -->
<script src="js/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
<script src="js/bower_components/angular-loading-bar/src/loading-bar.js"></script>
<script src="js/bower_components/oclazyload/dist/ocLazyLoad.min.js"></script>
<script src="js/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
<!-- Common js -->
<script src="js/bower_components/angular-nouislider/src/nouislider.min.js"></script>
<script src="js/bower_components/ng-table/dist/ng-table.min.js"></script>
<!-- App level -->
<script src="js/app.js"></script>
<script src="js/controllers/main.js"></script>
<!-- Template Modules -->
<script src="js/modules/form.js"></script>
<script>
$("#Login-in").click(function () {
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
                console.log(comeback)
                if(comeback.code == 'success'){
                    $('.Hint').html('<font color="green" size="1">'+comeback.msg+'</font>');
                    setTimeout(function(){
                        window.location.href="<?php echo U('Index/index');?>";//刷新当前页面.
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
	$('.bgm-red').on('click',function(){
		window.location.href = "<?php echo U('Login/register');?>";
	})
</script>
</html>