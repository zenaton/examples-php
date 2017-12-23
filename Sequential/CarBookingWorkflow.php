<?php

use Zenaton\Interfaces\WorkflowInterface;
use Zenaton\Traits\Zenatonable;

class CarBookingWorkflow implements WorkflowInterface
{
    use Zenatonable;

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $request = (new BookCar($this->request))->execute();
        
        (new SendBookingConfirmation($request))->execute();
    }
}
