<?php

use Zenaton\Interfaces\TaskInterface;

class PrepareOrder implements TaskInterface
{
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        echo 'Preparing order for item: '.$this->item['name'];
        sleep(10);
        echo '- order prepared';
    }
}
