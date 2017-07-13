<?php

use Zenaton\Common\Interfaces\TaskInterface;

class ReserveCar implements TaskInterface
{
    protected $booking;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        echo 'Booking car for Request ID: '.$this->request->id.PHP_EOL;
        sleep(rand(1, 3));
        $this->request->booking_id = 'QSFG34';
        echo 'Car Booked: '.$this->request->booking_id.PHP_EOL;

        return $this->request;
    }
}
