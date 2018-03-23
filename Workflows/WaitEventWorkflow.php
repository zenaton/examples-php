<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Zenaton\Traits\Zenatonable;

class WaitEventWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        // Wait until the event or 4 seconds
        $event = (new Wait(MyEvent::class))->seconds(4)->execute();

        // If event has been triggered
        if ($event) {
            // Execute TaskB
            (new TaskA())->execute();
        } else {
            // Execute Task B
            (new TaskB())->execute();
        }
    }

    public function getId()
    {
        return 'MyId';
    }
}
