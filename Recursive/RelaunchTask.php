<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class RelaunchTask implements TaskInterface
{
    use Zenatonable;

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        ++$this->id;

        // get iteration of current instance
        echo PHP_EOL.'Iteration: '.$this->id.PHP_EOL;

        // launch new workflow
        (new RecursiveWorkflow($this->id))->dispatch();
    }
}
