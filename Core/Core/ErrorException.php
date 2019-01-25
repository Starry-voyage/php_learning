<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/1/24
 * Time: 16:33
 */

namespace Core\Core;


class ErrorException extends \Exception
{
    public static function exceptionHandler($e)
    {
        self::showError($e);
        die("eeee");
    }

    /**
     * 错误输出
     * @param mixed $error 错误
     * @return void
     */
    static public function halt($error) {
        $e = array();
        if (APP_DEBUG || IS_CLI) {
            //调试模式下输出错误信息
            if (!is_array($error)) {
                $trace          = debug_backtrace();
                $e['message']   = $error;
                $e['file']      = $trace[0]['file'];
                $e['line']      = $trace[0]['line'];
                ob_start();
                debug_print_backtrace();
                $e['trace']     = ob_get_clean();
            } else {
                $e              = $error;
            }
            if(IS_CLI){
                exit(iconv('UTF-8','gbk',$e['message']).PHP_EOL.'FILE: '.$e['file'].'('.$e['line'].')'.PHP_EOL.$e['trace']);
            }
        } else {
            #没有开启调试模式  跳转404页面
            //否则定向到错误页面
            $error_page         = ERROR_PAGE;
            if (!empty($error_page)) {
                redirect($error_page);
            } else {
                $message        = is_array($error) ? $error['message'] : $error;
                $e['message']   = SHOW_ERROR_MSG? $message : "未知错误";
            }
        }

        // 包含异常页面模板
        $exceptionFile =  WEB_PATH."Core/Tpl/exception.tpl";
        include $exceptionFile;
        exit;
    }

    #展示报错信息
    protected static function showError($exception)
    {
        $data = [
            'name' => get_class($exception),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'message' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString(),
            'code' => $exception->getCode(),
        ];
        self::halt($data);
//        echo("错误：" . ($data["message"]) . "<br/>");
//        echo("错误位置：" . $data["file"] . "第" . $data["line"] . "行<br/>");
//        foreach ($data["trace"] as $key=>$value){
//            if($value["function"]){
//                #方法错误
//            }else{
//                #文件
//                echo "#".$key.$value["file"].$value["line"];
//            }
//        }
//        echo ("错误："+($e->getMessage())+"<br/>");
    }

    #收集错误信息
    protected static function report(\Exception $exception)
    {
        $data = [
            'name' => get_class($exception),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'message' => $exception->getMessage(),
            'trace' => $exception->getTrace(),
            'code' => $exception->getCode(),
            'source' => $exception->getSourceCode(),
            'datas' => $exception->getExtendData(),
        ];
        print_r($data);
    }

}