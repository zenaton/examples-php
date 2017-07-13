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
        // Fake API request to send invitation to someone
        echo 'Sending Invitation to: '.$this->name.PHP_EOL;
        sleep(rand(1, 3));
        echo 'Invitation Well sent to '.$this->name.PHP_EOL;
    }
}
