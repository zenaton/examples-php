<?php

use Zenaton\Common\Interfaces\TaskInterface;

class LogActivateUser implements TaskInterface
{
    protected $stage;

    public function __construct($stage)
    {
        $this->stage = $stage;
    }

    public function handle()
    {
        echo 'Ending at stage '.$this->stage;
    }
}
