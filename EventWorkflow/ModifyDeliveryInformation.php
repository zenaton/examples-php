<?php

use Zenaton\Common\Interfaces\EventInterface;

class ModifyDeliveryInformation implements EventInterface
{
    protected $address;

    public function __construct($address)
    {
        $this->address = $address;
    }
}
