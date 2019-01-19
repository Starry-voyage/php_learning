<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/1/8
 * Time: 15:43
 */

namespace Core\Core;


class Router
{
    private static $model;
    private static $controller;
    private static $action;


    /*
     * 普通路由解析
     *
     */
    public static function parseRouter()
    {
        $router_model = ROUTER_METHOD;
        $request_uri = $_SERVER['REQUEST_URI'];

        #只管url映射到方法
        switch ($router_model) {
            case 0:
                #普通模式 www.xx.com/home/index/index
                #判断是否有参数
                $num = strpos($request_uri, '?');
                if ($num !== false) {
                    #去掉参数
                    $request_uri = substr($request_uri, 0, $num);
                }
                $request = array_filter(explode('/', $request_uri));
                self::$action = isset($request[count($request)]) ? ucfirst($request[count($request)]) : DEFAULT_ACTION;
                self::$controller = isset($request[count($request) - 1]) ? ucfirst($request[count($request) - 1]) : DEFAULT_CONTROLLER;
                self::$model = isset($request[count($request) - 2]) ? ucfirst($request[count($request) - 2]) : DEFAULT_MODULE;
                break;
            case 1:
                break;
            case 2:
                break;
            default:
                die("404");
                break;
        }
        self::run();
    }

    /*
     *
     * 执行方法 (后续跟新)
     *
     */
    public static function run()
    {
        $class = '\\' . self::$model . '\\' . "Controller" . '\\' . self::$controller . SUFFIX;
        if (class_exists($class)) {
            $obj = new $class();
            call_user_func([
                $obj,
                self::$action
            ]);
        } else {
            die($class . "方法不存在");
        }
    }
}