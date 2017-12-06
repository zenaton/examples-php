<?php

use Zenaton\Interfaces\TaskInterface;

class SendBookingConfirmation implements TaskInterface
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        echo 'Sending notification to customer:'.PHP_EOL;
        echo '- customer ID: '.$this->request['customer_id'].PHP_EOL;
        echo '- request ID: '.$this->request['id'].PHP_EOL;
        echo '- car ID: '.$this->request['booking_id'].PHP_EOL;
    }
}
