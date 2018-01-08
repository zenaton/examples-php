<?php

// load .env file
(new Dotenv\Dotenv(__DIR__))->overload();

$app_id = getenv('ZENATON_APP_ID');
if (!$app_id) {
    echo "Please add ZENATON_APP_ID=... in your '.env' file (https://zenaton.com/app/api)";
    die();
}

$api_token = getenv('ZENATON_API_TOKEN');
if (!$api_token) {
    echo "Please add ZENATON_API_TOKEN=... in your '.env' file (https://zenaton.com/app/api)";
    die();
}

$app_env = getenv('ZENATON_APP_ENV');
if (!$app_env) {
    echo "Please add ZENATON_APP_ENV=... in your '.env' file (https://zenaton.com/app/api)";
    die();
}

Zenaton\Client::init($app_id, $api_token, $app_env);
