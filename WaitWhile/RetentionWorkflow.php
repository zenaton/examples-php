<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\WaitWhile;
use Zenaton\Traits\Zenatonable;

class RetentionWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        (new WaitWhile(UserRetentionEvent::class))->seconds(5)->execute();

        (new SendRetentionEmail($this->user['email']))->execute();
    }

    public function getId()
    {
        return $this->user['email'];
    }
}
