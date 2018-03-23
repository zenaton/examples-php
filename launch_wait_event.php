<?php

require __DIR__.'/autoload.php';

$workflow = new WaitEventWorkflow();

$workflow->dispatch();

sleep(2);

WaitEventWorkflow::whereId('MyId')->send(new MyEvent());
