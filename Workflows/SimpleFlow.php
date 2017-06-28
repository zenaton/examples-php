<?php

use Tasky\Common\Interfaces\WorkflowInterface;

class SimpleFlow implements WorkflowInterface
{
    protected $max;
    protected $n;
    protected $f;

    public function __construct($max)
    {
        $this->max = $max;
        $this->n = 0;
    }

    public function handle()
    {

        // execute(new EchoDuration(1, 1));
        $t = execute(new GetTime());
        $n = $this->n;
        // throw new Exception("Error Processing Request");

        while ($n < $this->max) {
            $t = execute(new EchoDuration($n, $t));
            ++$n;
            $this->n = $n;
        }

        $this->n = $n;

        return [$this->n, $t];
    }

    // public function getId()
    // {
    //     return "hello";
    // }
}
