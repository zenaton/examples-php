<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class DisplayTask implements TaskInterface
{
    use Zenatonable;

    protected $counter;

    public function __construct($counter)
    {
        $this->counter = $counter;
    }

    public function handle()
    {
        echo $this->counter;
        sleep(1);
    }
}
