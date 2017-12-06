<?php

use Zenaton\Interfaces\TaskInterface;

class SendRetentionEmail implements TaskInterface
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        echo 'Sending retention email to: '.$this->email;
        sleep(1);
        echo '- email sent';
    }
}
