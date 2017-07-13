<?php

use Zenaton\Common\Interfaces\TaskInterface;

class SendOrder implements TaskInterface
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
        // Fake
        echo 'Sending '.$this->item->name.' to '.$this->address;
    }
}
