#!/usr/bin/env php
<?php

require_once __DIR__.'/../src/bootstrap.php';

(new AsynchronousWorkflow())->dispatch();
