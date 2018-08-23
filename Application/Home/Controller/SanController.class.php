<?php

 namespace Home\Controller;

 use Think\Controller;

 class SanController extends Controller
 {
 	 function index(){
        // echo "111";
        $code=$_GET['code'];
        // echo $code;
        $ch= curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.weibo.com/oauth2/access_token?client_id=2975497433&client_secret=17a808b77d67269894bd437365a85652&grant_type=authorization_code&code=$code&redirect_uri=http://cup.waip.top/index.php/Home/San/index");//抓取指定网页
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);//运行curl
        $data=json_decode($data,true);
        curl_close($ch);
        $token=$data['access_token'];

        // var_dump($token);die;

        $ch= curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://api.weibo.com/oauth2/get_token_info?access_token=$token");//抓取指定网页
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        //curl_setopt($ch, CURLOPT_POSTFIELDS,);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        $data=json_decode($data,true);
        // var_dump($data);
         // die;
        // 微博 uid
        if ($data['uid']) {
        	// var_dump($data['uid']);die;
        	// $db=D('qq_login_info');
        	// $res=$db->add($data);
        	// // var_dump($res);die;
        	$uid=$data['uid'];
        	$db=D('weibo');
        	$data=$db->join("five_user on five_weibo.user_id=five_user.user_id")->where("uid='$uid'")->find();
        	// echo $db->getLastSql();
        	
        	// print_r($data);die;
        	cookie('uid',$uid);
        	// die;
        	if ($data) {
        		cookie('user_info',json_encode($data));
        		header("location:../Index/index.html");
        	}else{
                header("location:../Login/login.html");
        	}
            
        }
        
     }
   } 