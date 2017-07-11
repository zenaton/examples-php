<?php

// load .env file
(new Dotenv\Dotenv(__DIR__))->load();

$app_id = getenv('ZENATON_APP_ID');
$api_token = getenv('ZENATON_API_TOKEN');
$app_env = getenv('ZENATON_APP_ENV');

if (!$app_id) {
    echo "Please add your Zenaton application id on '.env' file (https://zenaton.com/app/api)";
    die();
}

if (!$api_token) {
    echo "Please add your Zenaton api token on '.env' file (https://zenaton.com/app/api)";
    die();
}

$client = new Zenaton\Client\Client($app_id, $api_token, $app_env);
