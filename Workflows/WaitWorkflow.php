<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Zenaton\Traits\Zenatonable;

class WaitWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        (new TaskA())->execute();

        (new Wait())->seconds(5)->execute();

        (new TaskB())->execute();

        (new Wait())->seconds(5)->execute();

        (new TaskC())->execute();
    }
}
