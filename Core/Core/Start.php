<?php

/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/1/8
 * Time: 11:40
 */

namespace Core\Core;

require_once "./Core/Core/Autoload.php";
class Start
{
    protected function __construct()
    {

    }
    #初始化配置文件
    protected static function init(){
        include WEB_PATH."Core/function.php";#导入框架通用函数
        define('DEFAULT_MODULE', "Home");
        define('DEFAULT_CONTROLLER', "Index");
        define('F_VERSION',"1.0.0");
        define('IS_CLI',PHP_SAPI=='cli'? 1   :   0);
        define('MODULE_PATH', APP_PATH.MODULE_NAME.'/');
    }

    public static function run(){
        #构造函数
        #加载框架配置文件
        #自动加载类
//        $user_config= require_once "./Apply/Common/config.php";
        spl_autoload_register('\Core\Core\Autoload::autoLoad');
        self::init();
        #注册错误处理
        set_exception_handler('\Core\Core\ErrorException::exceptionHandler');
        #路由
        Router::parseRouter();
    }

}