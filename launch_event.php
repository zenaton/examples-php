<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$orderId = '3141592';
$workflow = new OrderWorkflow(
    ['name' => 'shirt', 'orderId' => $orderId],
    '1600 Pennsylvania Ave NW, Washington, DC 20500, USA'
);

$workflow->dispatch();

sleep(3);

OrderWorkflow::whereId($orderId)->send(new AddressUpdatedEvent('One Infinite Loop Cupertino, CA 95014'));
