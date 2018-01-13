<?php

namespace Version;

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class OrderFromProviderB implements TaskInterface
{
    use Zenatonable;

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
        echo 'Order "'.$this->item['name'].'" from Provider B' . PHP_EOL;

        if (! is_null($this->version)) echo ' using version '.$this->version . PHP_EOL;
    }
}
