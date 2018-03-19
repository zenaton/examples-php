<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;
use Zenaton\Parallel\Parallel;

class ParallelWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        // Execute taskA and taskB in parallel
        list($resultA, $resultB) = (new Parallel(
            new TaskA(),
            new TaskB()
        ))->execute();

        // Wait for the end of execution of both tasks
        // Execute Task C
        (new TaskC())->execute();
    }
}
