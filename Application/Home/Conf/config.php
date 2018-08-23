<?php
return array(
    //'配置项'=>'配置值'
    'LAYOUT_ON' => true,
    'LAYOUT_NAME' => 'layout',
    'SESSION_AUTO_START'    =>  true,    // 是否自动开启Session
    'SESSION_OPTIONS'       =>  array('expire'=>60), // session 配置数组 支持type name id path expire domain 等参数
    'TMPL_ACTION_ERROR'     =>  'Common/404error', // 默认错误跳转对应的模板文件
    //'TMPL_ACTION_SUCCESS'   =>  'Common/error', // 默认成功跳转对应的模板文件
    //'TMPL_EXCEPTION_FILE'   =>  THINK_PATH.'Tpl/think_exception.tpl',// 异常页面的模板文件
    
    //第三方支付配置
    "config_alipay"=>array(
	//应用ID,您的APPID。
		'app_id' => "2016091700532315",

		//商户私钥
		'merchant_private_key' => "MIIEogIBAAKCAQEAn2XIPUYINzc9g3EzxiURIviOKZ8TSNxdb4Ip00Q+WujoERbRo7i1rqh4S9iFvVyUbn9YtuaOmbCv9PFxIoDaGYceAbwGeogn6zrCxaOAdWAev9/RtFQgfAASSXLTQICEGhpvPIkl4D8NM18P9zG569FweWY/QIPylzFz3roZyvB5ueK6Ur5iZYjW8iZ0w3UKVr7awzinDJ8SSbU0BippeCvte/F+T5iTrViPPNC54sus92TReD43CFygEscZVjfbGAer67fN/L7DEC/6wrZmJ67wckYyD00C02WCX885YSRT+N2zgCHmQO7KchwSfcttPTfi060oZUjFPWSciVdH5QIDAQABAoIBAFT1WCQolqpvfA76IGFlUlv0ZTmT+yBjrD2KACcGAcJMz5yEMBr2kYfVbcDnWGlU1hyLLcrW2nzaav7ATc/ZI+ZlWT4NbNqUhcpgGH5lJkvpfppAfrKCAIp3M0gItsZzeXW8TzvR0elTUgLmkUjtLS6fBDcAo4gMjBnAFwVI5gR/DtK/TozFGkO1RRNRmGzHLWA0vkFBPon65++29sAzFGbFOcbVVRf14qde8yEnQlHT4LUA+YPPDjvi12bfV+1oi3XVbqntV+qC2+22B7dZP+VBBghmSIF4eBf5Hv5TYh1uOh6T8jR8JMpVAbi+WMnPFfR2zZGSgafWR6D4wt/ZwsUCgYEAzaziMRIbYY6K+q4V3eBxefoB05tOXuL2+Dfp13UkpH7Uyu8K5Ru+XFoMyjoSu7fDgFHoEgaiUYyTEmvPFa0qbDRuSxUJCkf30mGSMypsOay6zQuGRJ0UX3RmeROkKsqk24pOucBKEHTlSIOV6tdxqPafJLc8KDcmF7dLjfM1kvMCgYEAxmYl2hSdlkvLB6et6s4sheie/c3xp/ZYTMPgQn1afDVFKTCWVa5HcGZRI0tLNO2BecZfqAIRnDf3dzp4ATjCFmCOCX37ov/EMEx0oC2c6dJfE7q8FKRdV/omup7MAeVYY7ypC6SbYr8//wy5qibEAXlXsyqi+UJmXrOR303m/8cCgYAbrtpfCnXfAqWYKhhNXelIJqtaRPweb2QYcsYptt2wulV/3v7TaZGMsp4oFfrxg0FwIxYeXwA4A7jD8PjVjRI5sDDsMC+gT6F+kp1v/5TDiok2EggHcjEMzAkC4O7mx5G67vm7rLMLVgCKaxOhoU/uEwvGkFcrfojFBmnH+GVMmwKBgCKxUgUkfbn+Xu5jv+HDU73Gw6aWEJ/ST/Z8egambOAzYHinamJpK0zYV2/YhromnfFxYuC6G+I5VyieLMXp6uaG08+NHCeQmfnoJKytzTaF9uI4URM6+qebspIHmpzqQd6O6vCCRDmsP8CVtRGv3a50TYWi+wSjO8trkyJ9ONuZAoGAdytmKbUvY1awGWPXrnZJjsOnoJt+aeC9ptDJEUAuLgpNZka4eEQ6xZvoMijlKhVoVoZDXiGSAG8LEfq/YjslVjlV5vlXgrPw9naD2FJ5QanXBMDaBgH/91HITqE1ojW2qQvtjjtju7StOoGbrw0uvCdCoMKqbqguB576pHviQ/o=",
		
		//异步通知地址
		'notify_url' => "http://nn377k.natappfree.cc/asynchronous.php",
		
		//同步跳转
		'return_url' => "http://www.cup1.com/index.php/Home/Pay/synchronization",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0qVLoAFj951LnetYJ6q1lgql8OPwBW4lUG0dicIgGX1QnUwPtiKhmGJGY37ttI3FNE74wgY3+H9jggkgyWqi1HQnooZexm3YnUbMk6lDOJaGdPcqPKdwVrsSaJ+u7vj12zuixp+V94DG04yeS9Ve8sdHR/qVcZq43ydU8ekVWYEiuBs2zg18e0Oi8348TnC4qmc/9lmpaacWxo8/Ko0MolUadzULNgC7N3RGZoLxP3YcAkRkepLjUg7usxVmnks9FSGgVdWiVTdVWb8HEihWFAnaJ5QtQIO/+bhaCYTwXZG1/LT5V+MyNATwI0knQJ2spi7wREKjy+VEL54Vb8DnoQIDAQAB",
),
);
