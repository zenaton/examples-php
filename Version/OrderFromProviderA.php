<?php

namespace Version;

use Zenaton\Interfaces\TaskInterface;

class OrderFromProviderA implements TaskInterface
{
    protected $item;
    protected $version;

    public function __construct($item, $version = null)
    {
        $this->item = $item;
        $this->version = $version;
    }

    public function handle()
    {
        // Fake API request to order from provider A
        echo 'Order "'.$this->item['name'].'" from Provider A';

        if (! is_null($this->version)) echo ' using version '.$this->version;
    }
}
