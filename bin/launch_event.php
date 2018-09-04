#!/usr/bin/env php
<?php

require_once __DIR__.'/../src/bootstrap.php';

$id = uniqid();

(new EventWorkflow($id))->dispatch();

sleep(2);

EventWorkflow::whereId($id)->send(new MyEvent());
