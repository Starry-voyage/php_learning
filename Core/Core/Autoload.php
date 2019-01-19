<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/1/8
 * Time: 15:32
 */

namespace Core\Core;


class Autoload
{
    private static $map=[];
    public static function autoLoad($class)
    {
        #如果有的话，去除类最左侧的\
        $class = ltrim($class, '\\');
        if(isset(self::$map[$class])){
            include self::$map[$class];
        }else{
            #系统配置类自动加载
            $class_path = str_replace('\\', '/', $class) . EXT;
            if(file_exists($class_path)){
                include WEB_PATH.$class_path;
                self::$map[$class]=WEB_PATH.$class_path;
            }
            #用户应用自动加载
            $class_path = APP_PATH.str_replace('\\', '/', $class) . EXT;
            if(file_exists($class_path)){
                include WEB_PATH.$class_path;
                self::$map[$class]=WEB_PATH.$class_path;
            }

        }

    }
}