<?php

use Tasky\Common\Interfaces\EventInterface;
use Tasky\Common\Interfaces\WorkflowInterface;
use Tasky\Common\Tasks\Wait;

class EventFlow implements WorkflowInterface
{
    protected $n;

    public function __construct()
    {
        $this->n = 1;
    }

    public function handle()
    {
        $t = 0;

        execute(new Wait(SecondEvent::class));

        $this->n *= 2;

        execute(new Wait(SecondEvent::class));

        $this->n *= 2;

        var_dump('Final value : '.$this->n);

        return $this->n;
    }

    public function onEvent(EventInterface $event)
    {
        if ($event instanceof IncrementEvent) {
            $this->n += $event->increment;
        }
    }
}
