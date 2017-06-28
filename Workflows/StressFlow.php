<?php

use Tasky\Common\Interfaces\WorkflowInterface;

class StressFlow implements WorkflowInterface
{
    protected $max;
    protected $n;

    public function __construct($max, $n)
    {
        $this->max = $max;
        $this->n = $n;
    }

    public function handle()
    {
        for ($i = 0; $i < $this->max; ++$i) {
            executeAsync(new EchoDuration($this->n));
        }
    }
}
