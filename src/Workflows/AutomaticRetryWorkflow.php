<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class AutomaticRetryWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        (new TaskWithRetry())->execute();
    }
}
