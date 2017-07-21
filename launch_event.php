<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$item = (object) ['name' => 'shirt'];
$workflow = new OrderWorkflow($item, '1600 Pennsylvania Ave NW, Washington, DC 20500, USA');

// direct synchronous execution
// $workflow->handle();

// execution through Zenaton
$instance = $client->start($workflow);
echo 'launched! '.$instance->getId().PHP_EOL;

sleep(2);

$instance->sendEvent(new AddressUpdatedEvent('One Infinite Loop Cupertino, CA 95014'));
echo 'event sent! '.PHP_EOL;
