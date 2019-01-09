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

//定义路由模式 0为普通模式 1为pathinfo 2rewrite模式
define('ROUTER_METHOD', "0");
// 引入ThinkPHP入口文件
require './Core/start.php';