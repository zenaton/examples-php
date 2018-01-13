<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class GetPriceFromProviderB implements TaskInterface
{
    use Zenatonable;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        // Fake API request to get price from provider B
        echo 'Contacting provider B to get the price...' . PHP_EOL;
        sleep(4);
        $price = rand(80, 100);
        echo '- price from Provider B is: ' . $price . PHP_EOL;

        return $price;
    }
}
