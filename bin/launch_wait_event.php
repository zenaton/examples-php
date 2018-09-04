#!/usr/bin/env php
<?php

require __DIR__.'/../autoload.php';

$id = uniqid();

(new WaitEventWorkflow($id))->dispatch();

sleep(2);

WaitEventWorkflow::whereId($id)->send(new MyEvent());
