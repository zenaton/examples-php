<?php

use Zenaton\Common\Interfaces\WorkflowInterface;

class TransportBookingWorkflow implements WorkflowInterface
{
    protected $booking;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        if ($this->request->transport === 'air') {
            $request = execute(new ReserveAir($this->request));
        }

        if ($this->request->transport === 'car') {
            $request = execute(new ReserveCar($this->request));
        }

        execute(new SendConfirmation($request));
    }
}
