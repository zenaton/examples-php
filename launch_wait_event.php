<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$user = ['email' => 'user@yoursite.com'];
$workflow = new ActivationWorkflow($user);

$workflow->dispatch();

sleep(6);

ActivationWorkflow::whereId('user@yoursite.com')->send(new UserActivatedEvent('User did an important action'));
