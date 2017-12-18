<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Interfaces\EventInterface;
use Zenaton\Traits\Zenatonable;

class OrderWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $item;
    protected $address;

    public function __construct($item, $orderId, $address)
    {
        $this->item = $item;
        $this->orderId = $orderId;
        $this->address = $address;
    }

    public function handle()
    {
        (new PrepareOrder($this->item))->execute();

        (new SendOrder($this->item, $this->address))->execute();
    }

    public function onEvent(EventInterface $event)
    {
        if ($event instanceof AddressUpdatedEvent) {
            $this->address = $event->address;
        }
    }

    public function getId()
    {
        return $this->orderId;
    }
}
