<?php

require_once __DIR__.'/autoload.php';

use Zenaton\Client\Client;

$client = new Client($app_id, $api_token, $app_env);

$notifications = ['Gilles', 'Julien', 'Oussama', 'Alice', 'Charlotte', 'Balthazar', 'Annabelle', 'Louis'];


$instance = $client->start(new SendInvitationsWorkflow($notifications));
$id = $instance->getId();
echo 'launched! '. $id.PHP_EOL;
