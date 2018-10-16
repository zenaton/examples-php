<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskA implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo 'Task A starts'.PHP_EOL;

        sleep(3);

        echo 'Task A ends'.PHP_EOL;

        return 0;
    }
}
