<?php

use Zenaton\Common\Interfaces\WorkflowInterface;
use Zenaton\Worker\Tasks\Wait;

class ActivationWorkflow implements WorkflowInterface
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        execute(new SendActivateEmail1($this->user->email));
        $event = execute((new Wait(UserActivatedEvent::class))->seconds(5));
        if ($event) {
            echo 'user activated at stage 1 - '.$event->action;

            return;
        }

        execute(new SendActivateEmail2($this->user->email));
        $event = execute((new Wait(UserActivatedEvent::class))->seconds(5));
        if ($event) {
            echo 'user activated at stage 2 - '.$event->action;

            return;
        }

        echo 'We failed to activate user';
    }

    public function getId()
    {
        return $this->user->email;
    }
}
