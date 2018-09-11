<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Interfaces\EventInterface;
use Zenaton\Traits\Zenatonable;

class EventWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $id;
    protected $state = true;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        (new TaskA)->execute();

        if ($this->state) {
            (new TaskB)->execute();
        } else {
            (new TaskC)->execute();
        }
    }

    public function onEvent(EventInterface $event)
    {
        if ($event instanceof MyEvent) {
            $this->state = false;
        }
    }

    public function getId()
    {
        return $this->id;
    }
}
