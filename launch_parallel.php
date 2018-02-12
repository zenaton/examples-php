<?php

require __DIR__.'/autoload.php';

$workflow = new ParallelWorkflow(['name' => 'shirt']);

$workflow->dispatch();
