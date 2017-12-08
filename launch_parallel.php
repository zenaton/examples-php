<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new OrderFromProviderWorkflow(
    ['name' => 'shirt']
);

$workflow->dispatch();
