<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new WelcomeWorkflow(
    (object) ['email' => 'user@yoursite.com']
);

$client->start($workflow);
echo 'launched! '.PHP_EOL;
