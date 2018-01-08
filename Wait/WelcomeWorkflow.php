<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Zenaton\Traits\Zenatonable;

class WelcomeWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        (new SendWelcomeEmail1($this->user['email']))->execute();

        (new Wait)->seconds(5)->execute();

        (new SendWelcomeEmail2($this->user['email']))->execute();

        (new Wait)->seconds(5)->execute();

        (new SendWelcomeEmail3($this->user['email']))->execute();
    }

    public function onStart($task)
    {
        echo 'starting ' . get_class($task) . ' task ';
    }
}
