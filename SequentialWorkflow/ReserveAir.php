<?php

use Zenaton\Common\Interfaces\TaskInterface;

class ReserveAir implements TaskInterface
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        echo 'Booking airline for Request ID: '.$this->request->id.PHP_EOL;
        sleep(rand(1, 3));
        $this->request->booking_id = '154782684269';
        echo 'Ticket Booked: '.$this->request->booking_id.PHP_EOL;

        return $this->request;
    }
}
