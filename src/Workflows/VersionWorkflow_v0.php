<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Parallel\Parallel;
use Zenaton\Traits\Zenatonable;

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
