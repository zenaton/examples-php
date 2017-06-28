<?php

use Tasky\Common\Interfaces\WorkflowInterface;
use Tasky\Worker\Tasks\Wait;
use Tasky\Worker\Tasks\WaitWhile;

class WaitFlow implements WorkflowInterface
{
    public function handle()
    {
        $t = execute(new EchoDuration(1));

        execute((new Wait(IncrementEvent::class))->seconds(15));

        $t = execute(new EchoDuration(2));

        execute((new Wait())->seconds(5));

        $t = execute(new EchoDuration(3));

        return $t;
    }
}
