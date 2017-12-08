<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class PrepareOrder implements TaskInterface
{
    use Zenatonable;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        echo 'Preparing order for item: '.$this->item['name'];
        sleep(6);
        echo '- order prepared';
    }
}
