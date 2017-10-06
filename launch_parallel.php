<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new OrderFromProviderWorkflow(
    ['name' => 'shirt']
);

$response = $client->start($workflow);
echo json_encode($response).PHP_EOL;
