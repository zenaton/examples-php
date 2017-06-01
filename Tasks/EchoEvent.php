<?php

use Tasky\Interfaces\EventInterface;
use Tasky\Interfaces\TaskInterface;

class EchoEvent implements TaskInterface
{
    protected $event;

    public function __construct(EventInterface $event)
    {
        $this->event = $event;
    }

    public function handle()
    {
        if ($this->event instanceof IncrementEvent) {
            echo get_class($this->event).'('.$this->event->increment.')'.PHP_EOL;
        }
    }
}
