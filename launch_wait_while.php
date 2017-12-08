<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new RetentionWorkflow(['email' => 'user@yoursite.com']);

$workflow->dispatch();

$instance = RetentionWorkflow::whereId('user@yoursite.com');

sleep(2);
$instance->send(new UserRetentionEvent());

sleep(2);
$instance->send(new UserRetentionEvent());

sleep(2);
$instance->send(new UserRetentionEvent());
