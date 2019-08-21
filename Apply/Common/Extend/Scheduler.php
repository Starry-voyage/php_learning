<?php

/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/8/20
 * Time: 17:59
 */
class Scheduler
{
    protected $maxTaskId = 0;
    protected $taskMap = [];
    protected $taskQueue;

    public function __construct()
    {
        $this->taskQueue = new SplQueue();
    }

    public function schedule(\Task $task)
    {
        $this->taskQueue->enqueue($task);
    }

    public function newTask(Generator $generator)
    {
        $tid = ++$this->maxTaskId;
        $task = new \Task($tid, $generator);
        $this->taskMap[$tid] = $task;
        $this->schedule($task);
        return $tid;
    }

    public function run()
    {
        while (!$this->taskQueue->isEmpty()) {
            $task = $this->taskQueue->dequeue();#出队列
            $task->run();

            if ($task->isFinish()) {
                unset($this->taskMap[$task->getTaskId()]);
            } else {
                $this->schedule($task);
            }
        }
    }

}