<?php

/**
 * Created by PhpStorm.
 * User: tim
 * Date: 2019/8/21
 * Time: 16:30
 */
class SystemCall
{
    /**
     * TODO任务与调度器之间通信
     */
    protected $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function __invoke(Task $task, Scheduler $scheduler)
    {
        // TODO: Implement __invoke() method.
        $callback = $this->callback;
        return $callback($task, $scheduler);
    }
}