<?php

use Tasky\Interfaces\WorkflowInterface;

class AsyncFlow implements WorkflowInterface
{
    protected $max;

    public function handle()
    {
        $t = execute(new EchoDuration(2));

        executeAsync(
            new EchoDuration(10),
            new EchoDuration(10)
        );

        $t = execute(new EchoDuration(2, $t));

        executeAsync(
            new EchoDuration(10)
        );

        return $t;
    }

    public function getId()
    {
        return "hello";
    }
}
