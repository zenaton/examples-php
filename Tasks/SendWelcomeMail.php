<?php

use Tasky\Interfaces\TaskInterface;

class SendWelcomeMail implements TaskInterface
{
    protected $email;
    protected $index;

    public function __construct($email, $index)
    {
        $this->email = $email;
        $this->index = $index;
    }

    public function handle()
    {
        // send mail number index
        echo 'sending mail '.$this->index.' to '.$this->email.PHP_EOL;

        ++$this->index;

        return $this->index;
    }
}
