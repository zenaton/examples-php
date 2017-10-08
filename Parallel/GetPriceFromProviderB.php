<?php

use Zenaton\Common\Interfaces\TaskInterface;

class GetPriceFromProviderB implements TaskInterface
{
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        // Fake API request to get price from provider B
        echo 'Contacting provider B to get the price...';
        sleep(2);
        $price = rand(80, 100);
        echo '- price from Provider B is: '.$price;

        return $price;
    }
}
