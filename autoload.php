<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/client.php';

if (! class_exists('Zenaton\Client')) {
    echo "Please run 'composer install' before launching an example";
    die();
}

$classesDir = [
    __DIR__.'/Asynchronous',
    __DIR__.'/Event',
    __DIR__.'/Parallel',
    __DIR__.'/Sequential',
    __DIR__.'/Version',
    __DIR__.'/Wait',
    __DIR__.'/WaitEvent'
];

foreach ($classesDir as $directory) {
    foreach (glob($directory.'/*.php') as $filename) {
        include $filename;
    }
}
