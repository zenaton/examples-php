<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Zenaton\Traits\Zenatonable;

class ActivationWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        (new SendActivateEmail1($this->user['email']))->dispatch();

        $event = (new Wait(UserActivatedEvent::class))->seconds(4)->execute();
        if ($event) {
            return (new LogActivateUser(1))->execute();
        }

        (new SendActivateEmail2($this->user['email']))->dispatch();

        $event = (new Wait(UserActivatedEvent::class))->seconds(4)->execute();
        if ($event) {
            return (new LogActivateUser(2))->execute();
        }

        (new LogActivateUser(3))->execute();
    }

    public function getId()
    {
        return $this->user['email'];
    }
}
