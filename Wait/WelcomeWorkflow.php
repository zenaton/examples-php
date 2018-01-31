<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Tasks\Wait;
use Zenaton\Traits\Zenatonable;

class WelcomeWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        (new SendWelcomeEmail1($this->email))->execute();

        (new Wait())->seconds(5)->execute();

        (new SendWelcomeEmail2($this->email))->execute();

        (new Wait())->seconds(5)->execute();

        (new SendWelcomeEmail3($this->email))->execute();
    }
}
