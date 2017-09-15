<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new CarBookingWorkflow(
    (object) [
        'id' => '12345',
        'customer_id' => '2DER45G',
        'transport' => 'car',
    ]
);

$client->start($workflow);
echo 'launched! '.PHP_EOL;
