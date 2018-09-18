<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Zenaton\Traits\Zenatonable;

class WaitEventWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        // Wait until the event at most 4 seconds
        $event = (new Wait(MyEvent::class))->seconds(4)->execute();

        if ($event) {
            // if event has been triggered within 4 seconds
            (new TaskA())->execute();
        } else {
            // else
            (new TaskB())->execute();
        }
    }

    public function getId()
    {
        return $this->id;
    }
}
