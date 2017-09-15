<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new OrderFromProviderWorkflow(
    (object) ['name' => 'shirt']
);

$client->start($workflow);
echo 'launched! '.PHP_EOL;
