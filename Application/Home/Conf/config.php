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
);