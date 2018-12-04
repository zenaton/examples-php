<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class AsynchronousWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        (new TaskA())->dispatch();
        (new TaskB())->dispatch();
        (new TaskC())->execute();
        (new TaskD())->execute();
    }
}
