<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskA implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo "Task A".PHP_EOL;
        sleep(1);
        return "Task A";
    }
}
