<?php

use Tasky\Interfaces\WorkflowInterface;

class BranchFlow implements WorkflowInterface
{
    public function handle()
    {
        $t = execute(new GetTime());

        list($t1, $t2) = execute(
            new EchoDuration(2),
            new EchoDuration(2)
        );

        list($t1, $t2) = execute(
            new EchoDuration(3),
            new EchoDuration(3)
        );

        $t = execute(new EchoDuration(1));

        return $t;
    }
}
