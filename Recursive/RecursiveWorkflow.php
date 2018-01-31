<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Zenaton\Traits\Zenatonable;

class RecursiveWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $id;
    protected $counter;

    public function __construct($id)
    {
        $this->id = $id;
        $this->counter = 0;
    }

    public function handle()
    {
        while ($this->counter < 10) {
            (new DisplayTask($this->counter))->execute();
            ++$this->counter;
        }

        (new SendEventTask($this->id))->dispatch();

        (new Wait(EndingEvent::class))->execute();

        (new RelaunchTask($this->id))->execute();
    }

    public function getId()
    {
        return $this->id;
    }
}
