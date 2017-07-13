<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$item = (object) ['name' => 'shirt'];

$instance = $client->start(new OrderWorkflow($item, '1600 Pennsylvania Ave NW, Washington, DC 20500, USA'));
echo 'launched! '.$instance->getId().PHP_EOL;

sleep(2);

$instance->sendEvent(new DeliveryAddressUpdatedEvent('One Infinite Loop Cupertino, CA 95014'));
echo 'event sent! '.PHP_EOL;

// $instance->sendEvent(new OrderCanceledEvent());
// echo 'event sent! '.PHP_EOL;
