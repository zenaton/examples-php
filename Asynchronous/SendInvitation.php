<?php

use Zenaton\Common\Interfaces\TaskInterface;

class SendInvitation implements TaskInterface
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function handle()
    {
        // Fake API request to send invitation
        echo 'Sending Invitation to: '.$this->name;
        sleep(rand(1, 3));
        echo '- invitation sent to '.$this->name;
    }
}
