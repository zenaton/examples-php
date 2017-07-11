<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$notifications = ['Gilles', 'Julien', 'Oussama', 'Alice', 'Charlotte', 'Balthazar', 'Annabelle', 'Louis'];

$instance = $client->start(new SendInvitationsWorkflow($notifications));
echo 'launched! '.$instance->getId().PHP_EOL;
