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
        echo 'starting ' . get_class($task) . ' task for ' . $task->name . PHP_EOL;
    }

    public function onSuccess($task, $output)
    {
        echo 'done ' . get_class($task) . ' task for ' . $task->name . PHP_EOL;
    }

    public function onFailure($task, $error)
    {
        echo 'failed ' . get_class($task) . ' task for ' . $task->name . ' with msg ' . $error->getMessage() . PHP_EOL;
    }
}
