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


    public function task($max)
    {
        $tid = (yield $this->getTaskId()); //here's the syscall
        for ($i = 1; $i <= $max; $i++) {
            echo "task " . $tid . " 生成器" . $i . "<br/>";
            yield;
        }
    }

    function newTask()
    {
    }

    function killTask($tid)
    {
    }

    function getTaskId()
    {
        return new \SystemCall(function (\Task $task, \Scheduler $scheduler) {
            $task->setSendValue($task->getTaskId());
            $scheduler->schedule($task);
        });
    }


    public function p($data)
    {
        print_r($data . "<br/>");
    }

    function t()
    {
        echo "hahh";
        yield 1;
        yield 2;
    }

    public function test()
    {
        $a = $this->t();
        foreach ($a as $t) {
            echo $t;
        }
        die("这是home模块index控制器下的test");
    }

}