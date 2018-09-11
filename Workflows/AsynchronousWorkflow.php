<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class AsynchronousWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        (new TaskB)->dispatch();

        (new TaskA)->execute();
    }
}
