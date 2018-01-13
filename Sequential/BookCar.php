<?php

use Zenaton\Interfaces\TaskInterface;
use Zenaton\Traits\Zenatonable;

class BookCar implements TaskInterface
{
    use Zenatonable;

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        echo 'Booking car for Request ID: '.$this->request['id'] . PHP_EOL;
        sleep(2);
        $this->request['booking_id'] = 'QSFG34';
        echo '- car booked: '.$this->request['booking_id'] . PHP_EOL;

        return $this->request;
    }
}
