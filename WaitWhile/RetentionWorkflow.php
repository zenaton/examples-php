<?php

use Zenaton\Common\Interfaces\WorkflowInterface;
use Zenaton\Worker\Tasks\WaitWhile;

class RetentionWorkflow implements WorkflowInterface
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        execute((new WaitWhile(UserRetentionEvent::class))->seconds(10));

        execute(new SendRetentionEmail($this->user->email));
    }

    public function getId()
    {
        return $this->user->email;
    }
}
