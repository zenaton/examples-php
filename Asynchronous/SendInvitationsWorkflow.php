<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class SendInvitationsWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $invitations;

    public function __construct($invitations)
    {
        $this->invitations = $invitations;
    }

    public function handle()
    {
        foreach ($this->invitations as $invitation) {
            (new SendInvitation($invitation))->dispatch();
        }
    }

    public function onStart($task)
    {
        echo get_class($task) . ' ' . $task->name;
    }

    public function onCompleted($task, $output)
    {
        echo get_class($task) . ' ' . $task->name;
    }
}
