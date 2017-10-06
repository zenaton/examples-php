<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new RetentionWorkflow(['email' => 'user@yoursite.com']);

$response = $client->start($workflow);
echo json_encode($response).PHP_EOL;

$instance = $client->find(RetentionWorkflow::class)->byId('user@yoursite.com');

sleep(2);
$response = $instance->sendEvent(new UserRetentionEvent());
echo json_encode($response).PHP_EOL;

sleep(2);
$response = $instance->sendEvent(new UserRetentionEvent());
echo json_encode($response).PHP_EOL;

sleep(2);
$response = $instance->sendEvent(new UserRetentionEvent());
echo json_encode($response).PHP_EOL;
