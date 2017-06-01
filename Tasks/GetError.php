<?php

use Tasky\Interfaces\TaskInterface;

class GetError implements TaskInterface
{
    public function handle()
    {
        var_dump('Error !');
        // this generate an exception
        spl_autoload_register('foo');

        return microtime(true);
    }
}
