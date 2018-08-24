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
<body>
<center><span id="tishi_info"></span></center>
	<div class="personal">
		<p class="title">我的账户<span>您好，<?php echo ($user_info["user_nickname"]); ?></span></p>
		<ul class="per_nav">
			<li class="active">我的订单</li>
			<li>基本信息</li>
			<li>我的优惠卷</li>
			<li>我的留言</li>
			<li>密码修改</li>
		</ul>
		<div class="per_box">
			<ul class="per_navul">
				<li style="width: 130px;margin-left: 15px;">封面</li>
				<li style="width: 450px;text-align: left;">商品名称</li>
				<li>单价</li>
				<li>数量</li>
				<li>合计</li>
				<li>状态</li>
				<li>操作</li>
			</ul>

			<?php if(is_array($orderlist)): foreach($orderlist as $key=>$val): ?><ul class="per_listul">
				<li style="width: 130px;margin-right: 10px;">
					<input type="radio" style="margin-right: 10px;margin-left: 18px;"/>
					<a href="<?php echo U('Goods/buy');?>?id=<?php echo ($val["goods_id"]); ?>" target="_blank">
						<img src="<?php echo ($val["goods_cover"]); ?>" style="height: 70px;vertical-align: middle;border-radius:200px;vertical-align: middle;"/>
					</a>
				</li>
				<li style="width: 450px;text-align: left;">
					<a href="<?php echo U('Goods/buy');?>?id=<?php echo ($val["goods_id"]); ?>" target="_blank"><?php echo ($val["goods_name"]); ?></a>
				</li>
				<li>￥<?php echo ($val["goods_price"]); ?></li>
				<li><?php echo ($val["goods_number"]); ?></li>
				<li>￥<?php echo ($val["price_sum"]); ?></li>
				<li>
					<?php  if($val['order_status'] == '1'){ echo "<font color='red'>订单未支付</font>"; } else if($val['order_status'] == '2') { echo "<font color='green'>支付成功</font>"; } else if($val['order_status'] == '3'){ echo "<font color='#90EE90'>待收货</font>"; } else if($val['order_status'] == '4') { echo '已完成'; } else { echo "异常已关闭"; } ?>
				</li>
				<li data-id="<?php echo ($val["order_id"]); ?>">
					<button class="order_select">查看</button><button class="order_del">删除</button>
				</li>
				<!-- <p>送货地址：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p> -->
			</ul><?php endforeach; endif; ?>

		</div>
		<div class="per_box per_info" style="display: none;">
			<form>
				<p>
					<span>昵称</span>
					<input type="text" name="user_nickname" value="<?php echo ($user_info["user_nickname"]); ?>"/>
					<span>修改</span>
				</p>
				<p>
					<span>邮箱地址</span>
					<input type="text" name="user_email" value="<?php echo ($user_info["user_email"]); ?>"/>
					<span>修改</span>
				</p>
				<p>
					<span>手机号码</span>
					<input type="text" name="user_tel" value="<?php echo ($user_info["user_tel"]); ?>" />
					<span>修改</span>
					<input type="hidden" name="user_id" value="<?php echo ($user_info["user_id"]); ?>">
				</p>
				<p class="per_info_btn" id="update">保存</p>
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
			<form action="<?php echo U('User/Pwd');?>" method="post">
				<p>
					<span>旧密码</span>
					<input type="password" id="oldpwd" onblur="validate_old()" disabled value="*********"/>
				</p>
				<p>
					<span>新密码</span>
					<input type="password" id="newpwd" disabled/>
				</p>
				<p>
					<span>确认新密码 </span>
					<input type="password" id="newpwd1" disabled onkeyup="validate_pass()"/>
				</p>
				<center><span id="tishi"></span></center>
				<p class="per_info_btn" id="start">开始修改密码</p>
				<p class="per_info_btn" id="end" style="display:none">确认修改密码</p>
			</form>
		</div>
	</div>
</body>
<script>
	$('.order_del').on('click',function(){
		var order_id = $(this).parent('li').attr('data-id');
		order_options(order_id,$(this));
	})

	function order_options(order_id,_this){
		$.ajax({
			url:"<?php echo U('User/OrderOptions');?>",
			type:'GET',data:{order_id:order_id},dataType:'json',
			success:function(come){
				console.log(come)
				if (come.code == 'error') {
					$('#tishi_info').html("<font color='red'>"+come.msg+"</font>");
				}
				if (come.code == 'success') {
					$('#tishi_info').html("<font color='green'>"+come.msg+"</font>");
					_this.parents('.per_listul').remove();
				};
				setTimeout(function() {     //3秒后重启搜索框
		            $('#tishi_info').fadeOut();
		        }, 1000);
			}
		})
	}
</script>
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

	    $(".meau").on("click", function (e) {
	        e.stopPropagation();
	    });
	});
</script>
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
<script>
	var oldpassword = null;
	//开始修改密码 点击事件
	$('#start').on('click',function(){
		//移除 oldpwd 禁用属性/设置空值/新增 oldpwd提示语/修改button提示语
		$('#oldpwd').removeAttr('disabled');
		$('#oldpwd').val('');
		$('#oldpwd').attr('placeholder','请输入您的旧密码');
		$(this).hide();
	})

	//验证旧密码事件
	function validate_old(){
		var oldpwd = $('#oldpwd').val();
		var mreg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,18}$/;

		if (mreg.test(oldpwd)) {
			$.ajax({
				url:"<?php echo U('User/VerificationOld');?>",
				type:'POST',data:{'oldpwd':oldpwd},dataType:'json',
				success:function(come){
					if (come == 'error') {
						$('#tishi').html("<font color='red' size='2'>旧密码不正确,请核对...</font>");
					}
					if (come == 'success') {
						//上锁
						$('#tishi').html("<font color='green' size='2'>请设置您的新密码</font>");	
						$('#oldpwd').attr('disabled','disabled');
						//赋值给公共成员属性
						oldpassword = oldpwd;

						$('#newpwd').removeAttr('disabled');
						$('#newpwd1').removeAttr('disabled');
					};
				}
			})
		} else {
			$("#tishi").html("<font color='red' size='2'>密码格式不正确,请核对</font>");
		};
	}

	//验证两次密码方法
	function validate_pass() {
	    var pwd1 = $("#newpwd").val();
	    var pwd2 = $("#newpwd1").val();
	    var mreg = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,18}$/;

	   	if (pwd1 == oldpassword) {
	   		$("#tishi").html("<font color='red' size='2'>新密码与旧密码不能相同</font>");
	   	} else{
	   		if (mreg.test(pwd1)) {
		    	//对比两次输入的密码 
			    if(pwd1 == pwd2){
			        $("#tishi").html("");
			        $('#newpwd').attr('disabled','disabled');
			        $('#newpwd1').attr('disabled','disabled');
			        $('#start').hide();
			        $('#end').show();
			        return true;
			    }else {
			        $("#tishi").html("<font color='red' size='2'>两次密码不相同</font>");
			        return false;
			    }
		    } else {
		    	$("#tishi").html("<font color='red' size='2'>密码不能为纯数字或空！</font>");
		    	return false;
		    };
	   	};  
	}

	//AJAX 修改密码
	$('#end').on('click',function(){
		var newpassword = $('#newpwd1').val();
		if (confirm("你确定要修改密码吗？")) { 
			$.ajax({
					url:"<?php echo U('User/AjaxUpdatePass');?>",
					type:'POST',data:{'newpass':newpassword},dataType:'json',
					success:function(come){
						if (come == 'error') {
							$('#tishi').html("<font color='red' size='2'>系统错误,请稍后重试...</font>");
						}
						if (come == 'success') {

							$('#tishi').html("<font color='green' size='2'>修改成功,请牢记您的新密码</font>");	
							setTimeout(function(){
		                        window.location.reload();//刷新当前页面.
		                    },1500)
						};
					}
				})
		}
	})
</script>
<script>
	$(function(){
		// alert(1);
		$(document).on('click',"#update",function(){
			var user_id=$("input[name='user_id']").val();
			var user_nickname=$("input[name='user_nickname']").val();
			// alert(id);
			var user_email=$("input[name='user_email']").val();
			var user_tel=$("input[name='user_tel']").val();
            $.ajax({
            	url:"<?php echo U('User/UseSave');?>",
            	type:'POST',
            	data:
            	{
            		'user_id':user_id,
            		'user_nickname':user_nickname,
            		'user_email':user_email,
            		'user_tel':user_tel,
            	},
            	dataType:'json',
            	success:function(e)
            	{
            		// alert(e.status);
            		// alert(e);
                  if (e.status==0) 
                  {
                     alert("您输入的修改信息有误");
                  }
                  else
                  {
                  	// alert(e.user_nickname='null'?'没有信息':e.user_nickname);
                     e.user_nickname='null'?'没有信息':e.user_nickname;
                     e.user_email='null'?'没有信息':e.user_email;
                     var str='<form>';
                     str+='<p>';
                     str+='<span>昵称</span>';
                     str+='<input type="text" name="user_nickname" value="'+e.user_nickname+'"/>';
                     str+='<span>修改</span></p>';
                     str+='<p>';
                     str+='<span>邮箱地址</span>';
                     str+='<input type="text" name="user_email" value="'+e.user_email+'"/>';
                     str+='<span>修改</span></p>';
                     str+='<p>';
                     str+='<span>手机号码</span>';
                     str+='<input type="text" name="user_tel" value="'+e.user_tel+'"/>';
                     str+='<span>修改</span></p>';
                     str+='<input type="hidden" name="user_id" value="'+e.user_id+'"/>';
                     str+='<p class="per_info_btn" id="update">保存</p>';
                     str+='</form>';
                  }
                  $(".per_info").html(str);
            	}
            })
		})
	})
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