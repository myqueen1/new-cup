<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>header</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <base href="/new-cup/Public/backend/">
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
</head>
<body>
<div class="header">
 <div class="logo">
  <img src="images/admin_logo.png" title="在哪儿"/>
 </div>
 <div class="fr top-link">
  <a href="admin_list.html" target="mainCont" title="DeathGhost"><i class="adminIcon"></i><span>管理员：<?php echo ($name); ?></span></a>
  <a href="<?php echo U('Login/exit_log');?>" target="_parent" title="安全退出" style="background:rgb(60,60,60);"><i class="quitIcon"></i><span>安全退出</span></a>
 </div>
</div>
</body>
</html>