<?php

require __DIR__.'/../autoload.php';

$id = uniqid();

(new EventWorkflow($id))->dispatch();

sleep(2);

EventWorkflow::whereId($id)->send(new MyEvent());
