<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;
use Zenaton\Parallel\Parallel;

class VersionWorkflow_v1 implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        (new Parallel(
            new TaskA(),
            new TaskB(),
            new TaskC()
        ))->execute();
    }
}
