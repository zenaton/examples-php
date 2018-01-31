<?php

require __DIR__.'/autoload.php';

$workflow = new WelcomeWorkflow('user@yoursite.com');
$workflow->dispatch();
