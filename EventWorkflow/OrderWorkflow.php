<?php

use Zenaton\Common\Interfaces\WorkflowInterface;
use Zenaton\Common\Interfaces\EventInterface;

class OrderWorkflow implements WorkflowInterface
{
    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function handle()
    {
        execute(new PrepareOrder($this->order));

        if (! $this->cancelled) {
            $id = execute(new SendOrder($order));
        }


    }

    public function onEvent(EventInterface $event){

        if ($event instanceOf CancelOrderEvent) {
            $this->cancelled = true;
            executeAsync(new CancelOrderPrepation($this->order));
        }

        if ($event instanceOf ModifyDeliveryInformation) {
            $this->user->adress = $event->adress;
        }
    }
}
