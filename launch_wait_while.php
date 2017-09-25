<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new RetentionWorkflow(
    (object) ['email' => 'user@yoursite.com']
);

$response = $client->start($workflow);
echo json_encode($response).PHP_EOL;

sleep(2);
$instance = $client->find(RetentionWorkflow::class)->byId('user@yoursite.com');
$instance->sendEvent(new UserRetentionEvent());
echo 'event sent! '.PHP_EOL;

sleep(2);
$instance = $client->find(RetentionWorkflow::class)->byId('user@yoursite.com');
$instance->sendEvent(new UserRetentionEvent());
echo 'event sent! '.PHP_EOL;

sleep(2);
$instance = $client->find(RetentionWorkflow::class)->byId('user@yoursite.com');
$instance->sendEvent(new UserRetentionEvent());
echo 'event sent! '.PHP_EOL;
