<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;
use Zenaton\Parallel\Parallel;

class VersionWorkflow_v0 implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        (new Parallel(
            new TaskA(),
            new TaskB()
        ))->execute();
    }
}
