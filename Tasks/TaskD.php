<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskD implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo 'Task D starts'.PHP_EOL;
        sleep(9);
        echo 'Task D ends'.PHP_EOL;

        return 3;
    }
}
