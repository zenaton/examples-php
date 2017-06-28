<?php

use Tasky\Common\Interfaces\WorkflowInterface;

class LaunchFlow implements WorkflowInterface
{
    protected $n;

    public function __construct($n)
    {
        $this->n = $n;
    }

    public function handle()
    {
        list($n, $t) = execute(
          new SimpleFlow($this->n),
          new EchoDuration($this->n)
        );

        execute(new EchoDuration($n[0]));

        execute(new SimpleFlow($this->n));

        execute(new EchoDuration($n[0]));

    }
}
