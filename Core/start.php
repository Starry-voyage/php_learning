<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/1/8
 * Time: 11:39
 */
require_once "./Core/Core/Start.php";
#加载框架默认配置
$frame_config = require_once './Core/Config/config.php';
#定义变量
define('EXT', '.php');

define('FRAME_CONFIG', $frame_config);
//define('MODULE_NAME') or define('MODULE_NAME','Home');


\Core\Core\Start::run();
//die("一切从这里开始");