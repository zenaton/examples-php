<?php

require_once __DIR__.'/autoload.php';

use Tasky\Client\Client;

$client = new Client($app_id, $api_token, $app_env);

$w = $client->start(new WaitFlow());
echo 'launched! '.$w->getId().PHP_EOL;

sleep(5);
$w->sendEvent(new IncrementEvent(0));
echo 'event sent'.PHP_EOL;
