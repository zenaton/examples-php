<?php

require_once __DIR__.'/../vendor/autoload.php';

if (!class_exists('Zenaton\Client')) {
    echo "Please run 'composer install' before launching an example";
    die(1);
}

// load .env file
if (file_exists(__DIR__.'/../.env')) {
    (new Dotenv\Dotenv(realpath(__DIR__.'/..')))->overload();
}

$appId = getenv('ZENATON_APP_ID');
if (!$appId) {
    echo "Please add ZENATON_APP_ID=... in your '.env' file (https://app.zenaton.com/api)";
    die(1);
}

$apiToken = getenv('ZENATON_API_TOKEN');
if (!$apiToken) {
    echo "Please add ZENATON_API_TOKEN=... in your '.env' file (https://app.zenaton.com/api)";
    die(1);
}

$appEnv = getenv('ZENATON_APP_ENV');
if (!$appEnv) {
    echo "Please add ZENATON_APP_ENV=... in your '.env' file (https://app.zenaton.com/api)";
    die(1);
}

Zenaton\Client::init($appId, $apiToken, $appEnv);
