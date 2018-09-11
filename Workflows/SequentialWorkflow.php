<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class SequentialWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        $a = (new TaskA)->execute();

        if (0 === $a) {
            (new TaskB)->execute();
        } else {
            (new TaskC)->execute();
        }
    }
}
