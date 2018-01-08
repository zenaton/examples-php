<?php

require __DIR__.'/autoload.php';

$workflow = new WelcomeWorkflow(['email' => 'user@yoursite.com']);

$workflow->dispatch();
