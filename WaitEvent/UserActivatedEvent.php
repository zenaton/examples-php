<?php

use Zenaton\Common\Interfaces\EventInterface;

class UserActivatedEvent implements EventInterface
{
    public $action;

    public function __construct($action)
    {
        $this->action = $action;
    }
}
