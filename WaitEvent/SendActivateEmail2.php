<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class SendActivateEmail2 implements TaskInterface
{
    use Zenatonable;

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
