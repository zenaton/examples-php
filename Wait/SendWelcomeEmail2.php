<?php

use Zenaton\Common\Interfaces\TaskInterface;

class SendWelcomeEmail2 implements TaskInterface
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        echo 'Sending welcome email 2 to: '.$this->email.PHP_EOL;
        sleep(rand(1, 3));
        echo '- email 2 sent'.PHP_EOL;
    }
}
