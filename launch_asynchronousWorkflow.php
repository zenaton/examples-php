<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$notifications = ['Gilles', 'Julien', 'Oussama', 'Alice', 'Charlotte', 'Balthazar', 'Annabelle', 'Louis'];
$workflow = new SendInvitationsWorkflow($notifications);

// direct synchronous execution
// $workflow->handle();

// execution through Zenaton
$instance = $client->start($workflow);
echo 'launched! '.$instance->getId().PHP_EOL;
