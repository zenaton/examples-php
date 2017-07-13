<?php

use Zenaton\Common\Interfaces\WorkflowInterface;
use Zenaton\Common\Interfaces\EventInterface;

class OrderWorkflow implements WorkflowInterface
{
    protected $item;
    protected $address;
    protected $cancelled;

    public function __construct($item, $address)
    {
        $this->item = $item;
        $this->address = $address;
        $this->cancelled = false;
    }

    public function handle()
    {
        execute(new PrepareOrder($this->item));

        if (!$this->cancelled) {
            $id = execute(new SendOrder($this->item, $this->address));
        }
    }

    public function onEvent(EventInterface $event)
    {
        if ($event instanceof OrderCanceledEvent) {
            $this->cancelled = true;
            execute(new CancelOrder($this->item));
        }

        if ($event instanceof DeliveryAddressUpdatedEvent) {
            $this->address = $event->address;
        }
    }
}
