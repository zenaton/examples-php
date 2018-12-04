<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Zenaton\Traits\Zenatonable;

class RecursiveWorkflow implements WorkflowInterface
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
        $counter = 0;
        while ($counter < 10) {
            (new DisplayTask($counter))->execute();
            ++$counter;
        }

        (new SendEventTask($this->id))->dispatch();

        (new Wait(EndingEvent::class))->execute();

        (new RelaunchTask($this->id, $this->max))->execute();
    }

    public function getId()
    {
        return $this->id;
    }
}
