<?php

use Tasky\Interfaces\WorkflowInterface;
use Tasky\Tasks\Wait;

class WelcomeFlow implements WorkflowInterface
{
    protected $email;
    protected $n;

    public function __construct($email)
    {
        $this->email = $email;
        $this->n = 0;
    }

    public function handle()
    {
        $this->n = execute(new SendWelcomeMail($this->email, $this->n));

        execute((new Wait())->seconds(1));

        $this->n = execute(new SendWelcomeMail($this->email, $this->n));

        execute((new Wait())->seconds(1));

        $this->n = execute(new SendWelcomeMail($this->email, $this->n));

        execute((new Wait())->seconds(1));

        $this->n = execute(new SendWelcomeMail($this->email, $this->n));

        return $this->n;
    }
}
