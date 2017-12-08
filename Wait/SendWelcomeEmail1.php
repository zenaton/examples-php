<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class SendWelcomeEmail1 implements TaskInterface
{
    use Zenatonable;
    
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        echo 'Sending welcome email 1 to: '.$this->email;
        sleep(rand(1, 3));
        echo '- email 1 sent';
    }
}
