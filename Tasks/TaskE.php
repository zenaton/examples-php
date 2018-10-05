<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class TaskE implements TaskInterface
{
    use Zenatonable;

    public function handle()
    {
        echo 'Task E starts'.PHP_EOL;
        
        throw new \Exception('Error in Task E');
    
        echo 'Task E ends'.PHP_EOL;
    }
}