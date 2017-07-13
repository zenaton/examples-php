<?php

use Zenaton\Common\Interfaces\WorkflowInterface;
use Zenaton\Common\Interfaces\EventInterface;

class OrderWorkflow implements WorkflowInterface
{
    protected $item;
    protected $address;

    public function __construct($item, $address)
    {
        $this->item = $item;
        $this->address = $address;
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
        if ($event instanceof CancelOrderEvent) {
            $this->cancelled = true;
            executeAsync(new CancelOrderPrepation($this->item));
        }

        if ($event instanceof ModifyDeliveryInformation) {
            $this->adress = $event->adress;
        }
    }
}
