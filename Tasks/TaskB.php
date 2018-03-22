<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskB implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo "Task B".PHP_EOL;
        sleep(5);
        return "Task B";
    }
}
