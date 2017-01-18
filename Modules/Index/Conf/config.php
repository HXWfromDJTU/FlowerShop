<?php
return array(
    //数据库配置信息
//    'DB_HOST'   => '42.96.195.83', // 服务器地址
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'ffhysc', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    'VIEW_PATH'	=>'./View/Index/',
    'TMPL_PARSE_STRING'=>array(
        '__PUBLIC__' => __ROOT__ . '/Common',
        '__RES__' => __ROOT__.'/View/'.BIND_MODULE.'/Public',
        '__IMG__'=>__ROOT__.'/View/'.BIND_MODULE.'/Public/img',
        '__CSS__'=>__ROOT__.'/View/'.BIND_MODULE.'/Public/css',
        '__JS__'=> __ROOT__.'/View/'.BIND_MODULE.'/Public/js',
    ),
    'URL_CASE_INSENSITIVE'  =>  true,
    'SETTINGS_XML' => './settings.xml',
    'UPLOAD_PATH' => __ROOT__.'/upload/',
    //上传文件时候路径
    'UPLOAD_PATH2' => 'upload/',
    //-----------------------------邮件相关------------------------
    'MAIL_HOST' =>'smtp.126.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'a597371030@126.com',//你的邮箱名
    'MAIL_FROM' =>'a597371030@126.com',//发件人地址
    'MAIL_FROMNAME'=>'芬芳花艺商城',//发件人姓名
    'MAIL_PASSWORD' =>'*6282816*',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE // 是否HTML格式邮件
);