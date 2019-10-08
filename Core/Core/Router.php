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
        if (IS_CLI) {
            #cli模式
            $request_uri = isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : '';
        } else {
            $request_uri = $_SERVER['REQUEST_URI'];
        }

        #只管url映射到方法
        //不管是哪种模式，最终解析的结果是一样的  模型model、控制器controller、方法action
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
                $request = array_values($request);
                self::$action = isset($request[count($request) - 1]) ? ucfirst($request[count($request) - 1]) : DEFAULT_ACTION;
                self::$controller = isset($request[count($request) - 2]) ? ucfirst($request[count($request) - 2]) : DEFAULT_CONTROLLER;
                self::$model = isset($request[count($request) - 3]) ? ucfirst($request[count($request) - 3]) : DEFAULT_MODULE;
                break;
            case 1:
                #正则匹配模式
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
        #根据命名空间调用类
        $class = '\\' . self::$model . '\\' . "Controller" . '\\' . self::$controller . SUFFIX;
        if (class_exists($class)) {
            $obj = new $class();
            if (method_exists($obj, self::$action)) {
                call_user_func([
                    $obj,
                    self::$action
                ]);
            } else {
                die("非法操作：" . self::$action);
            }

        } else {
            die($class . "控制器不存在");
        }
    }
}