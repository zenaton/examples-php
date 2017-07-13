<?php

use Zenaton\Common\Interfaces\EventInterface;

class DeliveryAddressUpdatedEvent implements EventInterface
{
    public $address;

    public function __construct($address)
    {
        $this->address = $address;
    }
}
