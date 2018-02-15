<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class RelaunchTask implements TaskInterface
{
    use Zenatonable;

    protected $id;
    protected $max;

    public function __construct($id, $max)
    {
        $this->id = $id;
        $this->max = $max;
    }

    public function handle()
    {
        if ($this->id < $this->max) {
            ++$this->id;

            // get iteration of current instance
            echo PHP_EOL.'Iteration: '.$this->id.PHP_EOL;

            // launch new workflow
            (new RecursiveWorkflow($this->id, $this->max))->dispatch();
        }
    }
}
