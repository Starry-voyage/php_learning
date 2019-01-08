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
    public static function autoLoad($class)
    {
        #如果有的话，去除类最左侧的\
        $class = ltrim($class, '\\');
        $class_path = str_replace('\\', '/', $class) . EXT;
        if(file_exists($class_path)){
//            include WEB_PATH.
        }
        die($class_path);
    }
}