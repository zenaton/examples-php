<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$item = (object) [
    'name' => 'shirt',
];

$instance = $client->start(new OrderWorkflow($item));
echo 'launched! '.$instance->getId().PHP_EOL;

sleep(2);

$instance->sendEvent(new ModifyDeliveryInformation($newDeliveryInformation));
echo 'event sent! '.PHP_EOL;
