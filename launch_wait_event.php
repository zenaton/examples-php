<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$user = (object) ['email' => 'user@yoursite.com'];
$workflow = new ActivationWorkflow($user);

// direct synchronous execution
// $workflow->handle();

// execution through Zenaton
$instance = $client->start($workflow);
echo 'launched! '.$instance->getId().PHP_EOL;

sleep(6);

$instance = $client->find(ActivationWorkflow::class)->byId($user->email);
$instance->sendEvent(new UserActivatedEvent('User did an important action'));
echo 'event sent! '.PHP_EOL;
