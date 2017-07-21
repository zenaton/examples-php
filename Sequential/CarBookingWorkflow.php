<?php

use Zenaton\Common\Interfaces\WorkflowInterface;

class CarBookingWorkflow implements WorkflowInterface
{
    protected $booking;

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
