<?php

require __DIR__.'/vendor/autoload.php';

if (!class_exists('Zenaton\Worker\Workflow')) {
    echo "Please run: 'composer install' before launching an example";
    die();
}

$classesDir = [
    __DIR__.'/SequentialWorkflow',
    __DIR__.'/ParallelWorkflow',
    __DIR__.'/AsynchronousWorkflow',
    __DIR__.'/EventWorkflow',
];

foreach ($classesDir as $directory) {
    foreach (glob($directory.'/*.php') as $filename) {
        include $filename;
    }
}
