<?php

use Tasky\Common\Interfaces\EventInterface;

class IncrementEvent implements EventInterface
{
    public $increment;

    public function __construct($increment)
    {
        $this->increment = $increment;
    }
}
