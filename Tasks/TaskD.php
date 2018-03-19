<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskD implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo 'Task D'.PHP_EOL;
        sleep(7);
        return 'Task D';
    }
}
