<?php

require __DIR__.'/autoload.php';

$id = uniqid();

(new EventWorkflow($id))->dispatch();

sleep(1);

EventWorkflow::whereId($id)->send(new MyEvent());
