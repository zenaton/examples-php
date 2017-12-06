<?php

use Zenaton\Interfaces\TaskInterface;

class BookCar implements TaskInterface
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        echo 'Booking car for Request ID: '.$this->request['id'];
        sleep(5);
        $this->request['booking_id'] = 'QSFG34';
        echo '- car booked: '.$this->request['booking_id'];

        return $this->request;
    }
}
