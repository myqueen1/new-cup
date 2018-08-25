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

    <div class="blog">
    <div class="blog_list">
        <p class="title">2016年1月15日 花束主题 | 感谢之意</p>
        <p class="date">2016/01/25</p>
        <p class="info">待客人们各自找到自己最舒适的位置，慢慢的喝着咖啡，我们再点上几只蜡烛，播上音乐。我们的感谢之意就这样开始了。想要坐到他们身边，
            看着他们的眼睛，问他们近况如何，听他们讲自己的生活，自己的爱人，自己的孩子，自己的小狗，自己的一切一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下
        </p>
        <a href="<?php echo U('Blog/blog');?>">
            <div class="b_l_bg">
                <img src="img/blog_p1.png"/>
            </div>
        </a>
    </div>
    <div class="blog_list">
        <p class="title">2016年1月15日 花束主题 | 感谢之意</p>
        <p class="date">2016/01/25</p>
        <p class="info">待客人们各自找到自己最舒适的位置，慢慢的喝着咖啡，我们再点上几只蜡烛，播上音乐。我们的感谢之意就这样开始了。想要坐到他们身边，
            看着他们的眼睛，问他们近况如何，听他们讲自己的生活，自己的爱人，自己的孩子，自己的小狗，自己的一切一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下
        </p>
        <a href="<?php echo U('Blog/blog');?>">
            <div class="b_l_bg">
                <img src="img/blog_p1.png"/>
            </div>
        </a>
    </div>
    <div class="blog_list">
        <p class="title">2016年1月15日 花束主题 | 感谢之意</p>
        <p class="date">2016/01/25</p>
        <p class="info">待客人们各自找到自己最舒适的位置，慢慢的喝着咖啡，我们再点上几只蜡烛，播上音乐。我们的感谢之意就这样开始了。想要坐到他们身边，
            看着他们的眼睛，问他们近况如何，听他们讲自己的生活，自己的爱人，自己的孩子，自己的小狗，自己的一切一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下
        </p>
        <a href="<?php echo U('Blog/blog');?>">
            <div class="b_l_bg">
                <img src="img/blog_p1.png"/>
            </div>
        </a>
    </div>
    <div class="blog_list">
        <p class="title">2016年1月15日 花束主题 | 感谢之意</p>
        <p class="date">2016/01/25</p>
        <p class="info">待客人们各自找到自己最舒适的位置，慢慢的喝着咖啡，我们再点上几只蜡烛，播上音乐。我们的感谢之意就这样开始了。想要坐到他们身边，
            看着他们的眼睛，问他们近况如何，听他们讲自己的生活，自己的爱人，自己的孩子，自己的小狗，自己的一切一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下一切，我们就静静的听着就好。
            就这样慢慢的聊下去，也不觉得时间将尽，我们一起看日落，一起看晚霞，直到夜幕降临。在漫天繁星下
        </p>
        <a href="<?php echo U('Blog/blog');?>">
            <div class="b_l_bg">
                <img src="img/blog_p1.png"/>
            </div>
        </a>
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