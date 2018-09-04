#!/usr/bin/env php
<?php

require_once __DIR__.'/../src/bootstrap.php';

$id = uniqid();

(new WaitEventWorkflow($id))->dispatch();

sleep(2);

WaitEventWorkflow::whereId($id)->send(new MyEvent());
