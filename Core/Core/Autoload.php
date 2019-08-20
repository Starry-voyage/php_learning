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
    private static $map = [];

    public static function autoLoad($class)
    {
        #如果有的话，去除类最左侧的\
        $class = ltrim($class, '\\');
        if (isset(self::$map[$class])) {
            include self::$map[$class];
        } else {
            #系统配置类自动加载
            $class_path = str_replace('\\', '/', $class) . EXT;
            self::classMap($class, $class_path);
            #用户应用自动加载 (根据命名空间加载)
            $class_path = APP_PATH . str_replace('\\', '/', $class) . EXT;
            self::classMap($class, $class_path);

            #扩展类，自动加载默认扩展类
            $extend_Folder = FRAME_CONFIG['Extend'] ?: '/Common/Extend/';
            $class_path = $extend_Folder . str_replace('\\', '/', $class) . EXT;
            self::classMap($class, $class_path);
        }

    }

    /**
     * 添加类映射
     * @param $class
     * @param $class_path
     */
    public static function classMap($class, $class_path)
    {
        if (file_exists($class_path)) {
            include WEB_PATH . $class_path;
            self::$map[$class] = WEB_PATH . $class_path;
        }
    }
}