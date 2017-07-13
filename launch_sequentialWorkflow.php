<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$request = (object) [
    'id' => '1234567890',
    'customer_id' => '2DER45G',
    'transport' => 'air',
];

$instance = $client->start(new TransportBookingWorkflow($request));
echo 'launched! '.$instance->getId().PHP_EOL;
