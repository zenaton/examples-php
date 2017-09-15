<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$item = (object) ['name' => 'shirt', 'orderId' => '314159'];
$workflow = new OrderWorkflow($item, '1600 Pennsylvania Ave NW, Washington, DC 20500, USA');

$client->start($workflow);
echo 'launched! '.PHP_EOL;

sleep(2);

$instance = $client->find(OrderWorkflow::class)->byId($item->orderId);
$instance->sendEvent(new AddressUpdatedEvent('One Infinite Loop Cupertino, CA 95014'));
echo 'event sent! '.PHP_EOL;
