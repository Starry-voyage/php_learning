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
        $sc->newTask($this->task1());
        $sc->newTask($this->task2());

        $sc->run();
    }


    public function task1()
    {
        for ($i = 1; $i <= 10; $i++) {
            echo "task1 生成器" . $i . "<br/>";
            yield;
        }
    }

    public function task2()
    {
        for ($i = 1; $i <= 5; $i++) {
            echo "task2 生成器" . $i . "<br/>";
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