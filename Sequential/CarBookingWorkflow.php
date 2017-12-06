<?php

use Zenaton\Interfaces\WorkflowInterface;

class CarBookingWorkflow implements WorkflowInterface
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $request = execute(new BookCar($this->request));

        execute(new SendBookingConfirmation($request));
    }
}
