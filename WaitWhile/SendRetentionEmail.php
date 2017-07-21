<?php

use Zenaton\Common\Interfaces\TaskInterface;

class SendRetentionEmail implements TaskInterface
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        echo 'Sending retention email to: '.$this->email.PHP_EOL;
        echo '- email sent'.PHP_EOL;
    }
}
