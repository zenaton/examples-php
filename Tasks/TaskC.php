<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskC implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo "Task C".PHP_EOL;
        sleep(7);
        return "Task C";
    }
}
