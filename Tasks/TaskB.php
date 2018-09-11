<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskB implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo 'Task B starts'.PHP_EOL;
        sleep(5);
        echo 'Task B ends'.PHP_EOL;

        return 1;
    }
}
