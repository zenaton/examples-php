<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class SendWelcomeEmail2 implements TaskInterface
{
    use Zenatonable;

    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        echo 'Sending welcome email 2 to: ' . $this->email . PHP_EOL;
        sleep(rand(1, 3));
        echo '- email 2 sent' . PHP_EOL;
    }
}
