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

<div class="product">
    <ul>
        <a href="<?php echo U('Index/buy');?>">
            <li>
                <img src="img/pro_pic1.png"/>
                <div class="proli_bg">
                    <div class="proli_bg_box">
                        <div class="proli_top">
                            <p>本周特推</p>
                            <p>叮咚叮咚礼盒50G</p>
                        </div>
                        <p>99.00</p>
                    </div>
                </div>
            </li>
        </a>
        <a href="<?php echo U('Index/buy');?>">
            <li>
                <img src="img/pro_pic2.png"/>
                <div class="proli_bg">
                    <div class="proli_bg_box">
                        <div class="proli_top">
                            <p>本周特推</p>
                            <p>叮咚叮咚礼盒50G</p>
                        </div>
                        <p>99.00</p>
                    </div>
                </div>
            </li>
        </a>
        <a href="<?php echo U('Index/buy');?>">
            <li>
                <img src="img/pro_pic3.png"/>
                <div class="proli_bg">
                    <div class="proli_bg_box">
                        <div class="proli_top">
                            <p>本周特推</p>
                            <p>叮咚叮咚礼盒50G</p>
                        </div>
                        <p>99.00</p>
                    </div>
                </div>
            </li>
        </a>
        <a href="<?php echo U('Index/buy');?>">
            <li>
                <img src="img/pro_pic4.png"/>
                <div class="proli_bg">
                    <div class="proli_bg_box">
                        <div class="proli_top">
                            <p>本周特推</p>
                            <p>叮咚叮咚礼盒50G</p>
                        </div>
                        <p>99.00</p>
                    </div>
                </div>
            </li>
        </a>
        <a href="<?php echo U('Index/buy');?>">
            <li>
                <img src="img/pro_pic3.png"/>
                <div class="proli_bg">
                    <div class="proli_bg_box">
                        <div class="proli_top">
                            <p>本周特推</p>
                            <p>叮咚叮咚礼盒50G</p>
                        </div>
                        <p>99.00</p>
                    </div>
                </div>
            </li>
        </a>
        <a href="<?php echo U('Index/buy');?>">
            <li>
                <img src="img/pro_pic4.png"/>
                <div class="proli_bg">
                    <div class="proli_bg_box">
                        <div class="proli_top">
                            <p>本周特推</p>
                            <p>叮咚叮咚礼盒50G</p>
                        </div>
                        <p>99.00</p>
                    </div>
                </div>
            </li>
        </a>
    </ul>
</div>


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