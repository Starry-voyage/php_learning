<?php

/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/1/9
 * Time: 15:38
 */

namespace Home\Controller;

class IndexController
{
    public function index()
    {
        $sc = new \Scheduler();
        $sc->newTask($this->task(10));
        $sc->newTask($this->task(5));

        $sc->run();
    }


    public function task($max){
        for ($i = 1; $i <= $max; $i++) {
            echo "task 生成器" . $i . "<br/>";
            yield;
        }
    }


    public function p($data)
    {
        print_r($data . "<br/>");
    }

    public function test()
    {
        die("这是home模块index控制器下的test");
    }

}