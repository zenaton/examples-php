<?php

use Tasky\Interfaces\TaskInterface;

class GetTime implements TaskInterface
{
    public function handle()
    {
        return microtime(true);
    }
}
