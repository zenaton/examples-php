<?php

use Tasky\Common\Interfaces\TaskInterface;

class GetTime implements TaskInterface
{
    public function handle()
    {
        return microtime(true);
    }
}
