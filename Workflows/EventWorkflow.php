<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Interfaces\EventInterface;
use Zenaton\Traits\Zenatonable;

class EventWorkflow implements WorkflowInterface
{
    use Zenatonable;

    public function handle()
    {
        (new TaskA())->execute();

        (new TaskB())->execute();
    }

    public function onEvent(EventInterface $event)
    {
        // When an event is received - dispatch TaskB
        echo 'Event received: '. get_class($event).PHP_EOL;
        if ($event instanceof MyEvent) {
            (new TaskC())->dispatch();
        }
    }

    public function getId()
    {
        return 'MyEventWorkflowExample';
    }
}
