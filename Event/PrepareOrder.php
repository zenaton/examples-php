<?php

use Zenaton\Common\Interfaces\TaskInterface;

class PrepareOrder implements TaskInterface
{
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        echo 'Preparing order for item: '.$this->item->name.PHP_EOL;
        sleep(rand(5, 10));
        echo '- Order prepared'.PHP_EOL;
    }
}
