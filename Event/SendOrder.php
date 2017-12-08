<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class SendOrder implements TaskInterface
{
    use Zenatonable;

    protected $item;
    protected $address;

    public function __construct($item, $address)
    {
        $this->item = $item;
        $this->address = $address;
    }

    public function handle()
    {
        echo 'Sending '.$this->item['name'].' to '.$this->address;
        sleep(rand(5, 10));
        echo '- sent';
    }
}
