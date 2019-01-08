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
    public static function run(){
        #构造函数
        #加载框架配置文件
        #自动加载类
        spl_autoload_register('\Core\Core\Autoload::autoLoad');
        $r = new Router();
        die($r->test());
    }
}