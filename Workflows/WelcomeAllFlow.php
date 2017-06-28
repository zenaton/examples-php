<?php

use Tasky\Common\Interfaces\WorkflowInterface;
use Tasky\Worker\Tasks\Wait;

class WelcomeAllFlow implements WorkflowInterface
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        // execute((new Wait())->monday()->at('8:00'));

        for ($i = 0; $i < 15; ++$i) {
            execute(new WelcomeFlow($this->email.$i));
        }
    }
}
