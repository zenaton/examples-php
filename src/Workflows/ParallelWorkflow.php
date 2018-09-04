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
        list($a, $b) = (new Parallel(
            new TaskA,
            new TaskB
        ))->execute();

        // Wait for the end of execution of both tasks
        if ($a > $b) {
            (new TaskC)->execute();
        } else {
            (new TaskD)->execute();
        }
    }
}
