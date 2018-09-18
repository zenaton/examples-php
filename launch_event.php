<?php

require __DIR__.'/autoload.php';

$id = uniqid();

(new EventWorkflow($id))->dispatch();

sleep(4);

EventWorkflow::whereId($id)->send(new MyEvent());
