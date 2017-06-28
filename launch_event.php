<?php

require_once __DIR__.'/autoload.php';

use Tasky\Client\Client;

$client = new Client($app_id, $api_token, $app_env);

$w = $client->start(new EventFlow());
echo 'launched! '.$w->getId().PHP_EOL;

sleep(2);
$w->sendEvent(new IncrementEvent(1));
$w->sendEvent(new SecondEvent());

sleep(2);
$w->sendEvent(new IncrementEvent(1));
$w->sendEvent(new SecondEvent());

echo 'events sent'.PHP_EOL;
