<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/client.php';

if (!class_exists('Zenaton\Client')) {
    echo "Please run 'composer install' before launching an example";
    die();
}

$classesDir = [
    __DIR__.'/Tasks',
    __DIR__.'/Workflows',
    __DIR__.'/Events',
    __DIR__.'/Recursive'
];

foreach ($classesDir as $directory) {
    foreach (glob($directory.'/*.php') as $filename) {
        include $filename;
    }
}
