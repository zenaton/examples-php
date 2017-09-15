<?php

use Zenaton\Common\Interfaces\TaskInterface;

class BookCar implements TaskInterface
{
    protected $booking;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        echo 'Booking car for Request ID: '.$this->request->id;
        sleep(rand(1, 3));
        $this->request->booking_id = 'QSFG34';
        echo '- car booked: '.$this->request->booking_id;

        return $this->request;
    }
}
