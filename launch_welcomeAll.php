<?php

require_once __DIR__.'/autoload.php';

use Tasky\Client;

$client = new Client($app_id, $api_token, $app_env);

// (new WelcomeFlow('gilles@thefamily.co'))->handle();

$w = $client->start(new WelcomeAllFlow('gilles@thefamily.co'));
echo 'launched! '.$w->getId().PHP_EOL;
