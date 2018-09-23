<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskB implements TaskInterface
{
    use Zenatonable;

    protected $error;

    public function __construct($error = false)
    {
        $this->error = $error;
    }

    public function handle()
    {
        echo 'Task B starts'.PHP_EOL;
        if ($this->error) {
            throw new \Exception('Error in Task B');
        }
        sleep(5);
        echo 'Task B ends'.PHP_EOL;

        return 1;
    }
}
