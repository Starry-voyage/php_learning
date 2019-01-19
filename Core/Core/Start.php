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
        define('DEFAULT_MODULE', "Home");
        define('DEFAULT_CONTROLLER', "Index");
        define('DEFAULT_ACTION', "Index");
        define('SUFFIX', "Controller");
        define('MODULE_NAME','Home');
        define('MODULE_PATH', APP_PATH.MODULE_NAME.'/');
    }
    public static function run(){
        #构造函数
        #加载框架配置文件
        #自动加载类
//        $user_config= require_once "./Apply/Common/config.php";
        spl_autoload_register('\Core\Core\Autoload::autoLoad');
        self::init();
        Router::parseRouter();
    }
}