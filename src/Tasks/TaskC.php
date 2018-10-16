<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskC implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo 'Task C starts'.PHP_EOL;

        sleep(7);

        echo 'Task C ends'.PHP_EOL;

        return 2;
    }
}
