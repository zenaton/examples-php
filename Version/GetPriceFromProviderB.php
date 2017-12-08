<?php

namespace Version;

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class GetPriceFromProviderB implements TaskInterface
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
        // Fake API request to get price from provider B
        echo 'Contacting provider B to get the price...';
        if (! is_null($this->version)) echo ' using version '.$this->version;
        sleep(2);
        $price = rand(80, 100);
        echo '- price from Provider B is: '.$price;

        return $price;
    }
}
