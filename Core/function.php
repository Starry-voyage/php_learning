<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/1/25
 * Time: 15:43
 * 框架通用函数
 */

/**
 * 打印方法
 * @param string $data
 * @param bool|false $status
 */
function x($data = [], $status = false)
{
    header("Content-type:text/html;charset=utf-8");
    echo "<pre>";
    print_r($data);
    if (!$status) {
        die;
    }
    echo "***************************";
}

/**
 * URL重定向
 * @param string $url 重定向的URL地址
 * @param integer $time 重定向的等待时间（秒）
 * @param string $msg 重定向前的提示信息
 * @return void
 */
function redirect($url, $time=0, $msg='') {
    //多行URL地址支持
    $url        = str_replace(array("\n", "\r"), '', $url);
    if (empty($msg))
        $msg    = "系统将在{$time}秒之后自动跳转到{$url}！";
    if (!headers_sent()) {
        // redirect
        if (0 === $time) {
            header('Location: ' . $url);
        } else {
            header("refresh:{$time};url={$url}");
            echo($msg);
        }
        exit();
    } else {
        $str    = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0)
            $str .= $msg;
        exit($str);
    }
}