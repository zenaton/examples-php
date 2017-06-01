<?php

require_once __DIR__.'/autoload.php';

use Tasky\Client;

$client = new Client($app_id, $api_token, $app_env);

$instance = $client->start(new SimpleFlow(6));
$id = $instance->getId();
echo 'launched! '.$id.PHP_EOL;
sleep(1);
// $instance->kill();
// $properties = $client->find(SimpleFlow::class)->byId($id)->getProperties();
