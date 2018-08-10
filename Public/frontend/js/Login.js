//弹出登录框 关闭登录框
$(function(){
	$(".close").click(function(){
		$(".login_bg").fadeOut();
	});
	$(".login_btn").click(function(){
		$(".login_bg").slideDown();
		$(".meau_box").slideUp();
	});

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
});

//退出登录
$('.loginOut').on('click',function(){
    if (confirm("你确定退出登录吗？")) { 
        $.ajax({url:"{:U('User/Singout')}",type:"GET",success:function (comeback) {
                window.location.reload();
            }
        })
    }
})

//验证登录 发送请求
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
            url:"{:U('User/login')}",type:"GET",dataType:"json",
            data:{user_tel:user_tel,user_pass:user_pass}, 
            success:function (comeback) {
                //console.log(comeback)
                if(comeback==1){
                    $('.Hint').html('<font color="green" size="1">登录成功,请稍后....</font>');
                    setTimeout(function(){
                        window.location.reload();//刷新当前页面.
                    },1500)
                }else{
                    $('.Hint').html('<font color="red" size="1">手机号 或密码 不正确 请核对后重试!@</font>');
                }
            }
        })
    } else {
        $('.Hint').html('<font color="red" size="1">请输入格式正确的手机号 或 密码</font>');
    };
});