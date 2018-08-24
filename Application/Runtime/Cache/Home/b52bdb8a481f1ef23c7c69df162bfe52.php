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
</head>
	<div class="buy">
		<p class="crumb">
			<a href="<?php echo U('Goods/product');?>">首页</a>>
			<a href="<?php echo ($data["brand_url"]); ?>" target="_blank">
                <?php echo ($data["brand_name"]); ?>
            </a>><?php echo ($data["goods_name"]); ?>水杯
		</p>
		<div class="buy_info">
			<div class="buy_img">
				<div class="page">
					<div class="middle_img">
						<img src="<?php echo ($data["goods_cover"]); ?>" style="display: block;">

						<?php foreach($Img as $val){ ?>
							<img src="<?php echo ($val["detailed_path"]); ?>">
						<?php } ?>
					</div>
					<div class="small_img">
						<img src="<?php echo ($data["goods_cover"]); ?>" class="active">

						<?php foreach($Img as $val){ ?>
							<img src="<?php echo ($val["detailed_path"]); ?>">
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="buy_right">
				<p class="p1">本周特推|<?php echo ($data["goods_name"]); ?></p>
				<p class="p2">
					<input type="hidden" class="UnitPrice" disabled value="<?php echo ($data["goods_price"]); ?>">
					<font style="font-size: 23px;" >售价：￥<?php echo ($data["goods_price"]); ?></font>
					<span style="text-decoration:line-through">原价 : ￥<?php echo ($data["goods_original"]); ?></span>
				</p>
				<!--规格属性-->
				<p class="p4 buy_p4">选择颜色：
					<span class="active" data-id='红色'>红色</span>
					<span data-id='黑色'>黑色</span>
					<span data-id='纯白'>纯白</span>
                    <span data-id='藏青色'>藏青色</span>
                    <span data-id='少女粉'>少女粉</span>
				</p>

				<p class="p3">选择数量：</p>
				<p class="p5">
					<span class="num" id='min'>-</span>
					<input class="number" type="text" value="1" disabled />
					<span class="num" id='max'>+</span>
				</p>
				<span class='SumPrice_info'>总价: ￥<?php echo ($data["goods_price"]); ?></span>
				<p class="p6">
					<img src="img/like1.png" class="like"/>
					<span>999人喜欢</span>
                    <span class="tishi"></span>
				</p>
				<p class="p7">
					<?php if (!isset($_COOKIE['user_info'])) { ?>
						<a class='login_btn' href="javascript:void(0);">加入购物车</a>
                        <a class='login_btn' href="javascript:void(0);">立即购买</a>
					<?php } else { ?>
						<a class='btn-buy' data-id="<?php echo ($data["goods_id"]); ?>">加入购物车</a>
                        <!-- <a href="<?php echo U('User/fill_order');?>?goods_id=<?php echo ($data["goods_id"]); ?>&goods_number=1" target="_blank">立即购买</a> -->
                        <a href="javascript:void(0);" class="buy_now">立即购买</a>
					<?php } ?>
				</p>
			</div>
		</div>
		<img src="img/info.jpg" class="info_img" />
	</div>

	<div class="big_img">
		<img src="img/close2.png" class="close" />
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php foreach($Img as $val){ ?>
					<div class="swiper-slide">
						<span>
							<img src="<?php echo ($val["detailed_path"]); ?>" width="700px;" height="500px;">
						</span>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>
</body>
<script type="text/javascript">
	//点击查看大图 左右切换
    var swiper = new Swiper(".swiper-container", {
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        autoHeight: true, //enable auto height
    });
</script>
<script>
    var sku_color = '红色';
	//大图切换 路径 
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

        $(".buy_p3 span").click(function() {
            $(".buy_p3 span").removeClass("active");
            $(this).addClass("active");
        });
        $(".buy_p4 span").click(function() {
            sku_color = $(this).attr('data-id');
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
<script>
	//规格 选中
    $(function(){
        $(".sys_item_spec .sys_item_specpara").each(function(){
            var i=$(this);
            var p=i.find("ul>li");
            p.click(function(){
                if(!!$(this).hasClass("selected")){
                    $(this).removeClass("selected");
                    i.removeAttr("data-attrval");
                }else{
                    $(this).addClass("selected").siblings("li").removeClass("selected");
                    i.attr("data-attrval",$(this).attr("data-aid"))
                }
            })
        })
    })
</script>
<script>
	//点击 商品数量增加,减少
    var number = $(".number");
    var UnitPrice = $(".UnitPrice").val();
    
    function updateMoney(){
        var numbers  = number.val();
        var sumprice = UnitPrice*numbers;   //输入框中的份额数与每份金额数相乘得到总金额

        $('.SumPrice_info').html("共[ "+numbers+" ]件,总价: ￥"+sumprice)
    }

    $(function(){
        $("#max").click(function() {
            number.val(parseInt(number.val()) + 1); //点击加号输入框数值加1
            if (number.val()>=3) number.val(3); 
            updateMoney();  //显示总金额
        });
        $("#min").click(function(){
            number.val(parseInt(number.val())-1); //点击减号输入框数值减1
            if(number.val()<=0){
                number.val(parseInt(number.val())+1); //最小值为1
            }
            updateMoney();
        });
    });
</script>
<script>
	//加入购物车的点击效果.....
    $('.btn-buy').bind('click',function(){
        var goods_id = $(this).attr('data-id');
        var sku_number = $('.number').val();

        $.ajax({ 
            url:"<?php echo U('User/ShoppingCart');?>",type:"POST",dataType:"json",
            data:{'goods_id':goods_id,'sku_number':sku_number,'sku_color':sku_color}, 
            success:function (comeback) {
                console.log(comeback)
                if(comeback.code == 'success'){
                    var img = $(".middle_img").find('img');
                    var flyElm = img.clone().css('opacity', 0.75);
                    $('body').append(flyElm);
                    flyElm.css({
                        'z-index': 9000,'display': 'block','position': 'absolute',
                        'top': img.offset().top +'px','left': img.offset().left +'px',
                        'width': img.width() +'px','height': img.height() +'px'
                    });
                    flyElm.animate({
                        top: $('.head-shopcart').offset().top,
                        left: $('.head-shopcart').offset().left,
                        width: 20,height: 32
                    }, 'slow', function() {
                        flyElm.remove();
                    });
                }else{
                    $('.tishi').html('<font color="red" size="1">'+comeback.msg+'</font>');  
                }
            }
        })
    });
</script>
<script>
    $('.buy_now').on('click',function(){
        var goods_number = $('.number').val();
        var goods_id     = $('.btn-buy').attr('data-id');
        //alert(goods_id)
        window.open("<?php echo U('User/fill_order');?>?goods_id="+goods_id+"&goods_number="+goods_number);
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