<?php

namespace Version;

use Zenaton\Common\Interfaces\TaskInterface;

class OrderFromProviderD implements TaskInterface
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
        // Fake API request to order from provider B
        echo 'Order "'.$this->item['name'].'" from Provider D';

        if (! is_null($this->version)) echo ' using version '.$this->version;
    }
}
