<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/1/8
 * Time: 11:33
 */
return array(
    'APP_SUB_DOMAIN_RULES' => array( // 子域名部署规则
        'admin' => 'Admin',
        'api' => 'Api',
        'www' => 'Home',
        'wechat' => 'Wechat',
    ),
    #允许的模块
    'MODULE_ALLOW_LIST' => array(
        'Home',
        'Admin',
        'Api'
    ),
    'DB_TYPE' => 'mysql',
    #测试服
    'db_host' => '192.168.0.88', //localhost
    'db_user' => 'mysql',
    'db_pwd' => '123456',
    'db_name' => 'db_info',
    'db_port' => '3306',
    'DB_PREFIX' => '',
    'DB_FIELDTYPE_CHECK' => false, // 是否进行字段类型检查
    'DB_FIELDS_CACHE' => true, // 启用字段缓存
    'DB_CHARSET' => 'utf8mb4', // 数据库编码默认采用utf8

    /* 默认设定 */
    'DEFAULT_M_LAYER' => 'Model', // 默认的模型层名称
    'DEFAULT_C_LAYER' => 'Controller', // 默认的控制器层名称
    'DEFAULT_V_LAYER' => 'View', // 默认的视图层名称
    'DEFAULT_LANG' => 'zh-cn', // 默认语言
    'DEFAULT_THEME' => '', // 默认模板主题名称
    'DEFAULT_MODULE' => 'Home', // 默认模块
    'DEFAULT_CONTROLLER' => 'Home', // 默认控制器名称
);