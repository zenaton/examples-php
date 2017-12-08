<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class LogActivateUser implements TaskInterface
{
    use Zenatonable;

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
