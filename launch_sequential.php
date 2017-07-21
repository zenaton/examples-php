<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$request = (object) [
    'id' => '12345',
    'customer_id' => '2DER45G',
    'transport' => 'car',
];
$workflow = new CarBookingWorkflow($request);

// direct synchronous execution
// $workflow->handle();

// execution through Zenaton
$instance = $client->start($workflow);
echo 'launched! '.$instance->getId().PHP_EOL;
