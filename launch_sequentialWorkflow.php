<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$booking = (object) [
    'request_id' => '1234567890',
    'customer_id' => '1234567891',
    'reserve_car' => true,
    'reserve_air' => true,
];

$instance = $client->start(new TransportBookingWorkflow($booking));
echo 'launched! '.$instance->getId().PHP_EOL;
