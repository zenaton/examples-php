<?php

use Zenaton\Common\Interfaces\TaskInterface;

class SendActivateEmail2 implements TaskInterface
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        echo 'Sending activate email 2 to: '.$this->email.PHP_EOL;
        echo '- email 2 sent'.PHP_EOL;
    }
}
