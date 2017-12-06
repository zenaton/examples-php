<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Interfaces\EventInterface;

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

        execute(new SendOrder($this->item, $this->address));
    }

    public function onEvent(EventInterface $event)
    {
        if ($event instanceof AddressUpdatedEvent) {
            $this->address = $event->address;
        }
    }

    public function getId()
    {
        return $this->item['orderId'];
    }
}
