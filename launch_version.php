<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new Version\OrderFromProviderWorkflow(
    ['name' => 'shirt']
);

$response = $client->start($workflow);
echo json_encode($response).PHP_EOL;

$instance = $client->find('Version\OrderFromProviderWorkflow')->byId('shirt');
sleep(5);
var_dump($instance->getProperties());
