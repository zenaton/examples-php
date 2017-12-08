<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class SendRetentionEmail implements TaskInterface
{
    use Zenatonable;
    
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
