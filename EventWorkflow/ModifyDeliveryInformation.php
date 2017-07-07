<?php

use Zenaton\Common\Interfaces\EventInterface;

class ModifyDeliveryInformation implements EventInterface
{
    protected $adress;

    public function __construct($adress)
    {
        $this->adress = $adress;
    }
}
