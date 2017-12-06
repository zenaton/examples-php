<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Carbon\Carbon;

class WelcomeWorkflow implements WorkflowInterface
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        execute(new SendWelcomeEmail1($this->user['email']));

        execute((new Wait())->seconds(5));

        execute(new SendWelcomeEmail2($this->user['email']));

        execute((new Wait())->seconds(5));

        execute(new SendWelcomeEmail3($this->user['email']));
    }
}
