<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class GetPriceFromProviderA implements TaskInterface
{
    use Zenatonable;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        // Fake API request to get price from provider A
        echo 'Contacting provider A to get the price...';
        sleep(2);
        $price = rand(80, 100);
        echo '- price from Provider A is: '.$price;

        return $price;
    }
}
