<?php

use Zenaton\Interfaces\WorkflowInterface;

class SendInvitationsWorkflow implements WorkflowInterface
{
    protected $invitations;

    public function __construct($invitations)
    {
        $this->invitations = $invitations;
    }

    public function handle()
    {
        foreach ($this->invitations as $invitation) {
            executeAsync(new SendInvitation($invitation));
        }
    }
}
