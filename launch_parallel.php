<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$item = (object) ['name' => 'shirt'];
$workflow = new ParallelWorkflow($item);

// direct synchronous execution
// $workflow->handle();

// execution through Zenaton
$instance = $client->start($workflow);
echo 'launched! '.$instance->getId().PHP_EOL;
