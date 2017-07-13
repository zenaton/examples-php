<?php

use Zenaton\Common\Interfaces\TaskInterface;

class CancelOrder implements TaskInterface
{
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        // Fake API request to get price from provider B
        echo 'Canceling order for item: '.$this->item->name.PHP_EOL;
        sleep(rand(1, 2));
        echo 'Order canceled'.PHP_EOL;
    }
}
