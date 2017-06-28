<?php

use Tasky\Common\Interfaces\WorkflowInterface;
use Tasky\Worker\Tasks\WaitWhile;

class WaitWhileFlow implements WorkflowInterface
{
    public function handle()
    {
        $t = execute(new EchoDuration(1));

        execute((new WaitWhile(IncrementEvent::class))->seconds(10));

        $t = execute(new EchoDuration(3));

        return $t;
    }
}
