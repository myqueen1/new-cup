<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="nofollow"/>
 <base href="/Public/backend/">
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<style>
body{width:100%;height:100%;overflow:hidden;background:url(images/pc_loginBg.jpg) no-repeat;background-size:cover;position:absolute;}
</style>
<script src="js/jquery.js"></script>
<script src="js/Particleground.js"></script>
<script>
$(document).ready(function() {
  $('body').particleground({
    dotColor:'green',
    lineColor:'#c9ec6e'
  });
  $('.intro').css({
    'margin-top': -($('.intro').height() /2)
  });
  $(".loginform input[type='button']").click(function(){
     var $name = $("#name").val();
      var $pwd = $("#pwd").val();
      $.ajax({
          type: "POST",
          url: "<?php echo U('Login/adminLogin');?>",
          data: "name="+$name+"&"+"pwd="+$pwd,
          success: function(msg){
              alert(msg);
             if (msg==1){
                 alert("用户名不存在");
             } else if(msg==2)
             {
                 alert("密码错误");
             } else {
                 alert("3")
             }
          }
      });
	  // location.href="<?php echo U('Index/index');?>";
	  });
});
</script>

</head>
<body>
  <section class="loginform">
   <h1>后台管理系统</h1>
   <ul>
    <li>
     <label>账号：</label>
     <input type="text" class="textBox" placeholder="管理员账号" id="name" />
    </li>
    <li>
     <label>密码：</label>
     <input type="password" class="textBox" placeholder="登陆密码" id="pwd" />
    </li>
    <li>
     <input type="button" value="立即登陆"/>
    </li>
   </ul>
  </section>
</body>
</html>