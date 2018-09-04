<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/client.php';

if (!class_exists('Zenaton\Client')) {
    echo "Please run 'composer install' before launching an example";
    die();
}
