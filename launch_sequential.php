<?php

require __DIR__.'/autoload.php';

$workflow = new CarBookingWorkflow([
    'id' => '12345',
    'customer_id' => '2DER45G',
    'transport' => 'car',
]);

$workflow->dispatch();
