<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>55° --SHOP</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
    <base href="/new/new-cup/Public/frontend/">
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
<body><br>
    <center>
        <span style="display:none;" class="reminder"></span>
    </center>
<div class="product">
    <div class="col-lg-6" style="margin-top:20px;">
        <div class="input-group">
            <input type="text" class="form-control" status="open" id="keywords" placeholder="🔍    输入您想要购买的商品名称试一试吧  .  .  .  . ">
                <span class="input-group-btn">
                    <button class="btn btn-default" id="search" type="button">Search!</button>
                </span>
            </div>
        </div>
    </div>
    <div class="product" style="margin-top:20px;margin-left:175px" id="history">
    </div>
</div>

<div class="product" style="margin-top:20px;">
    <div class="cation-content">
        <div class="cation-middle">
            <dl class="cation-list">
                <dt>分类</dt>
                <dd class='parents'>
                    <a href="javascript:void(0);" data-id="all" class="type on">全部</a>
                    <?php if(is_array($type_list)): foreach($type_list as $key=>$val): ?><a href="javascript:void(0);" data-id="<?php echo ($val["type_id"]); ?>" class="type"><?php echo ($val["type_name"]); ?></a><?php endforeach; endif; ?>
                </dd>
            </dl>
            <dl class="cation-list">
                <dt>品牌</dt>
                <dd>
                    <a href="javascript:void(0);" data-id="all" class="brand on">全部</a>
                    <?php if(is_array($brand_list)): foreach($brand_list as $key=>$val): ?><a href="javascript:void(0);" data-id="<?php echo ($val["brand_id"]); ?>" class="brand"><?php echo ($val["brand_name"]); ?></a><?php endforeach; endif; ?>
                </dd>
            </dl>
            <dl class="cation-list">
                <dt>价格</dt>
                <dd>
                    <a href="javascript:void(0);" data-id="all" class="price on">全部</a>
                    <a href="javascript:void(0);" data-id="0-10" class="price">0元 - 10元</a>
                    <a href="javascript:void(0);" data-id="11-25" class="price">11元 - 25元 </a>
                    <a href="javascript:void(0);" data-id="26-55" class="price">26元 - 55元 </a>
                    <a href="javascript:void(0);" data-id="56-82" class="price">56元 - 82元 </a>
                    <a href="javascript:void(0);" data-id="83-100" class="price">83元 - 100元 </a>
                    <a href="javascript:void(0);" data-id="101-129" class="price">101元 - 129元 </a>
                    <a href="javascript:void(0);" data-id="130" class="price">130元以上 </a>
                </dd>
            </dl>
        </div>
    </div>

    <ul>
        <?php if(is_array($goods_list)): foreach($goods_list as $key=>$val): ?><a href="<?php echo U('Goods/buy');?>?id=<?php echo $val['goods_id'] ?>" target="_blank">
                <li>
                    <img src="<?php echo ($val["goods_cover"]); ?>" height="500"/>
                    <div class="proli_bg">
                        <div class="proli_bg_box">
                            <div class="proli_top">
                                <p>本周特推</p>
                                <p><?php echo ($val["goods_name"]); ?></p>
                            </div>
                            <p>￥ <?php echo ($val["goods_price"]); ?></p>
                        </div>
                    </div>
                </li>
            </a><?php endforeach; endif; ?>
    </ul>
</div>
</body>
<script type="text/javascript">
    $(function(){
        update_history();
        // 绑定回车事件
        $(".form-control").bind('keypress',function (event) {
            if (event.keyCode == "13") {
                $("#search").click(); 
            }
        });
        // 搜索点击事件
        $("#search").click(function(){
            if ($('.form-control').attr('status') == 'open') {
           
                Search_interval();  //调用搜索框开关

                var goods_name = $("#keywords").val();
                screen_goods('goods_name',goods_name);      //发送请求

                var keywords = $("#keywords").val();
                history(keywords);  //添加到缓存
                update_history();   //更新搜索历史
            } else {
                $('.reminder').fadeIn().html("<font color='#FF4040' size='3'>您的手速太快了，我都反应不过来了!</font>");
                setTimeout(function(){
                    $('.reminder').fadeOut();
                },1500)
            }    
        })

        // 清空搜索历史
        $("#empty").click(function(){
            mystorage.remove('keywords');
            $("#history").html(" ");
        })
    })
    //设置搜索间隔
    function Search_interval(){
        $('.form-control').attr('status','shut');   //关闭搜索框

        setTimeout(function() {     //3秒后重启搜索框
            $('.form-control').attr('status','open');
        }, 5000);
    }
    /**
     * [update_history 更新搜索历史]
     * @return {[type]} [description]
     */
    function update_history(){
        //console.log(mystorage.get("keywords"));
        var history = mystorage.get("keywords");
        if (history) {
            var html = "";
            $.each(history,function(i,v){
                html += "<a class='btn btn-default' href='javascript:;' role='button'>"+v+"</a>"
            })
            html+="<a id='empty' class='btn btn-default' href='javascript:;'>清除历史搜索记录</a>"
            $("#history").html(html);
        };
    }
    /**
     * [history //搜索历史函数存储]
     * @param  {[type]} value [搜索词]
     * @return {[type]}       [description]
     */
    function history(value){  
        var data = mystorage.get("keywords");
        if (!data) {
            var data = []; //定义一个空数组
        }else if(data.length === 5){ //搜索历史数量
            data.shift();  //删除数组第一个元素有
        }else{
            
        };
        if (value) {  //判断搜索词是否为空
            if (data.indexOf(value)<0) {  //判断搜索词是否存在数组中
                data.push(value);    //搜索词添加到数组中
                mystorage.set("keywords",data);  //存储到本地化存储中
            };
        };
    }
    /**
     * [mystorage 存储localstorage时候最好是封装一个自己的键值，在这个值里存储自己的内容对象，封装一个方法针对自己对象进行操作。避免冲突也会在开发中更方便。]
     * @param  {String} ){                 var ms [description]
     * @return {[type]}     [description]
            console.log(mystorage.set('tqtest','tqtestcontent'));//存储
            console.log(mystorage.set('aa','123'));//存储
            console.log(mystorage.set('tqtest1','tqtestcontent1'));//存储
            console.log(mystorage.set('tqtest1','newtqtestcontent1'));//修改
            console.log(mystorage.get('tqtest'));//读取
            console.log(mystorage.remove('tqtest'));//删除
            mystorage.clear();//整体清除
     */
    var mystorage = (function mystorage(){
        var ms = "mystorage";
        var storage=window.localStorage;
        if(!window.localStorage){
            alert("浏览器不支持localstorage");
            return false;
        }
        var set = function(key,value){
            //存储
            var mydata = storage.getItem(ms);
            if(!mydata){
                this.init();
                mydata = storage.getItem(ms);
            }
            mydata = JSON.parse(mydata);
            mydata.data[key] = value;
            storage.setItem(ms,JSON.stringify(mydata));
            return mydata.data;
        };
        var get = function(key){
            //读取
            var mydata = storage.getItem(ms);
            if(!mydata){
                return false;
            }
            mydata = JSON.parse(mydata);
            return mydata.data[key];
        };
        var remove = function(key){
            //读取
            var mydata = storage.getItem(ms);
            if(!mydata){
                return false;
            }
            mydata = JSON.parse(mydata);
            delete mydata.data[key];
            storage.setItem(ms,JSON.stringify(mydata));
            return mydata.data;
        };
        var clear = function(){
            //清除对象
            storage.removeItem(ms);
        };
        var init = function(){
          storage.setItem(ms,'{"data":{}}');
        };
        return {
            set : set,
            get : get,
            remove : remove,
            init : init,
            clear : clear
        };
    })();
</script>
<script>
    //热词
    $(".sous").click(function () {
        var names=$(this).html();
        $.ajax({
            url:"<?php echo U('Goods/searchGoods');?>",
            type:"POST",
            data:{'names':names,},
            dataType:"json",
            success:function (comeback) {
                if(comeback == ''){
                    $('.reminder').fadeIn().html("<font color='#FF4040' size='3'>诶呀，不知道咋回事没有数据了!</font>");
                    setTimeout(function(){
                        window.location.reload();
                    },3000)
                }
                Splicing_goodsList(comeback)
            }
        })
    });
</script>
<script>
    $('.type').on('click',function(){
        Filtering_interval($(this),'type_id');    //调用开关
    })
    $('.brand').on('click',function(){
        Filtering_interval($(this),'brand_id');    //调用开关
    })
    $('.price').on('click',function(){
        Filtering_interval($(this),'goods_price');    //调用开关
    })
    //设置条件筛选时间间隔
    function Filtering_interval(_this,options){
        if (_this.attr('status') != 'shut') {
            _this.siblings('a').removeClass(' on');
            _this.addClass(' on');
            _this.siblings('a').attr('status','shut');
            _this.attr('status','shut');
            
            screen_goods(options,_this.attr('data-id'));    //发起请求

            setTimeout(function() {
                _this.siblings('a').attr('status','open');
            }, 5000);       //5秒打开开关
        } else {
            $('.reminder').fadeIn().html("<font color='#FF4040' size='3'>您的手速太快了，我都反应不过来了!</font>");
            setTimeout(function(){
                $('.reminder').fadeOut();
            },1500)
        };
    }
</script>
<script>
    /**
     *   params option,parameter sting
     *   return 接收参数,发送请求,拿到数据,调用Splicing_goodsList方法
    */
    function screen_goods(options,parameter){
        //alert(parameter)
        $.ajax({
            url:"<?php echo U('Goods/product');?>",type:"POST",
            data:[{name:options,value:parameter}],  //序列化,重中之重!
            dataType:"json",
            success:function(comeback){
                console.log(comeback);
                if(comeback == ''){
                    $('.reminder').fadeIn().html("<font color='#FF4040' size='3'>诶呀，不知道咋回事没有数据了!</font>");
                    setTimeout(function(){
                        window.location.reload();
                    },3000)
                }
                Splicing_goodsList(comeback)                                                      
            }
        })
    }
    /**
     *   params:goods_list 想要拼接的json字符串
     *   return:一个完整的HTML展示数据
    */
    function Splicing_goodsList(goods_list){
        var str='';

        $.each(goods_list,function (key,val){
            str+='<a href="'+"<?php echo U('Goods/buy');?>?id="+val.goods_id+'"><li>';
            str+='<img src="'+val.goods_cover+'" height="500"/>';
            str+='<div class="proli_bg"><div class="proli_bg_box">';
            str+='<div class="proli_top"><p>本周特推</p>';
            str+='<p>￥ '+val.goods_name+'</p></div>';
            str+='<p>'+val.goods_price+'</p></div></div></li></a>';
        });
        $(".product ul").html(str);
    }
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
                        <img src="/new/new-cup/Public/frontend/img/ad1.jpg" style="width:100%">
                    </a>
                    <a href="" target="_blank" class="mySlides fade">
                        <img src="/new/new-cup/Public/frontend/img/ad2.jpg" style="width:100%">
                    </a>
                    <a href="" target="_blank" class="mySlides fade">
                        <img src="/new/new-cup/Public/frontend/img/ad3.jpg" style="width:100%">
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