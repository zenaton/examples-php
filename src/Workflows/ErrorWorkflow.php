<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;
use Zenaton\Parallel\Parallel;

class ErrorWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        // Execute taskA and taskE in parallel
        (new Parallel(new TaskA,new TaskE))->execute();

        // Wait for the end of execution of both tasks
        (new TaskC)->execute();
    }
}
