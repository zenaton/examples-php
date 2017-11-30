<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new Version\OrderFromProviderWorkflow(
    ['name' => 'shirt']
);

$workflow->setVersion(1);

$response = $client->start($workflow);
echo json_encode($response).PHP_EOL;
