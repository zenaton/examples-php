<?php

use Zenaton\Common\Interfaces\TaskInterface;

class SendConfirmation implements TaskInterface
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        echo 'Sending notification to customer '.PHP_EOL;
        echo 'Customer ID: '.$this->request->customer_id.PHP_EOL;
        echo 'Request ID: '.$this->request->id.PHP_EOL;

        if ($this->request->transport == 'air') {
            echo 'Ticket ID: '.$this->request->booking_id.PHP_EOL;
        }

        if ($this->request->transport == 'car') {
            echo 'Car ID: '.$this->request->booking_id.PHP_EOL;
        }
    }
}
