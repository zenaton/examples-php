<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class SendEventTask implements TaskInterface
{
    use Zenatonable;

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        // send event to current workflow
        RecursiveWorkflow::whereId($this->id)->send(new EndingEvent());
    }
}
