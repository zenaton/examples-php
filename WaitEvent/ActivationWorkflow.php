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
        list($tmp, $event) = execute(
            new SendActivateEmail1($this->user['email']),
            (new Wait(UserActivatedEvent::class))->seconds(4)
        );

        if ($event) {
            return execute(new LogActivateUser(1));
        }

        list($tmp, $event) = execute(
            new SendActivateEmail2($this->user['email']),
            (new Wait(UserActivatedEvent::class))->seconds(4)
        );

        if ($event) {
            return execute(new LogActivateUser(2));
        }

        execute(new LogActivateUser(3));
    }

    public function getId()
    {
        return $this->user['email'];
    }
}
