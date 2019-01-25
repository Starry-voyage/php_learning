<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/1/8
 * Time: 11:23
 */
// 定义应用目录
define('APP_PATH', './Apply/');
//定义网站根目录
define('WEB_PATH', dirname(__FILE__) . "/");
define('APP_DEBUG',true);#是否开启调试模式 关闭调试模式，错误将写进错误日志
define('ERROR_PAGE','404.html');#错误页面 关闭调试模式后遇到未知错误的返回页面
define('SHOW_ERROR_MSG',true);#是否显示错误信息


define('DEFAULT_ACTION', "Index");#默认方法
define('SUFFIX', "Controller");#默认控制器
define('MODULE_NAME','Home');#默认模块

//定义路由模式 0为普通模式 1为pathinfo 2rewrite模式
define('ROUTER_METHOD', "0");


// 引入ThinkPHP入口文件
require './Core/start.php';