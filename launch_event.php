<?php

require __DIR__.'/autoload.php';

$workflow = new EventWorkflow();

$workflow->dispatch();

sleep(1);

EventWorkflow::whereId('MyEventWorkflowExample')->send(new MyEvent());
