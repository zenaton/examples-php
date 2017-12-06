<?php

use Zenaton\Interfaces\TaskInterface;

class SendActivateEmail2 implements TaskInterface
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        echo 'Sending activate email 2 to: '.$this->email;
        sleep(1);
        echo '- email 2 sent';
    }
}
