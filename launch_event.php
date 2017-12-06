<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$item = ['name' => 'shirt', 'orderId' => '314159'];
$workflow = new OrderWorkflow($item, '1600 Pennsylvania Ave NW, Washington, DC 20500, USA');

$response = $client->start($workflow);
echo json_encode($response).PHP_EOL;
sleep(5);

$instance = $client->find(OrderWorkflow::class)->byId($item['orderId']);

$res = $instance->sendEvent(new AddressUpdatedEvent('One Infinite Loop Cupertino, CA 95014'));
echo json_encode($res).PHP_EOL;
