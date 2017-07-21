<?php

use Zenaton\Common\Interfaces\TaskInterface;

class SendActivateEmail1 implements TaskInterface
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        echo 'Sending activate email 1 to: '.$this->email.PHP_EOL;
        echo '- email 1 sent'.PHP_EOL;
    }
}
