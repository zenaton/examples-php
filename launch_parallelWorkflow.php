<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$item = (object) [
    'name' => 'shirt',
];

$instance = $client->start(new ParallelWorkflow($item));
echo 'launched! '.$instance->getId().PHP_EOL;
