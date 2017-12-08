<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

use Version\OrderFromProviderWorkflow;

$id = 'shirt';
$workflow = new OrderFromProviderWorkflow(['name' => $id]);

$workflow->dispatch();

sleep(5);

$workflow = OrderFromProviderWorkflow::whereId($id)->find();

var_dump($workflow);
