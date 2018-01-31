<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

(new RecursiveWorkflow(0))->dispatch();
