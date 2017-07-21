<?php

use Zenaton\Common\Interfaces\WorkflowInterface;
use Zenaton\Worker\Tasks\Wait;

class WelcomeWorkflow implements WorkflowInterface
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        execute(new SendWelcomeEmail1($this->user->email));

        execute((new Wait())->seconds(4));

        execute(new SendWelcomeEmail2($this->user->email));

        execute((new Wait())->seconds(4));

        execute(new SendWelcomeEmail3($this->user->email));
    }
}
