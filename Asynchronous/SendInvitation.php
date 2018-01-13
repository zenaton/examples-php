<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class SendInvitation implements TaskInterface
{
    use Zenatonable;

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function handle()
    {
        // Fake API request to send invitation
        sleep(2);
        echo '- invitation sent to ' . $this->name . PHP_EOL;
    }
}
