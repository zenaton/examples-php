<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Zenaton\Traits\Zenatonable;

class WaitEventWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        (new TaskA())->dispatch();

        // Wait until the event or 4 seconds
        $event = (new Wait(MyEvent::class))->seconds(4)->execute();

        // If event has been triggered
        if ($event) {
            // Execute TaskB
            return (new TaskB())->execute();
        }

        // Dispatch Task C
        (new TaskC())->dispatch();

        // Wait until the event or 6 seconds
        $event = (new Wait(MyEvent::class))->seconds(6)->execute();
        // If event has been triggered
        if ($event) {
            // Execute TaskD
            return (new TaskD())->execute();
        }
    }

    public function getId()
    {
        return 'MyWaitEventWorkflowExample';
    }
}
