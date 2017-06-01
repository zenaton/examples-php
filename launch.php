<?php

require_once __DIR__.'/autoload.php';

use Tasky\Client;

$client = new Client($app_id, $api_token, $app_env);

$client->handle([
    EchoDuration::class,
    EchoEvent::class,
    GetTime::class,
    GetError::class,
    HistoryFlow_a::class,
    HistoryFlow_b::class,
    StressFlow::class,
    EventFlow::class,
    SimpleFlow::class,
    LaunchFlow::class,
    BranchFlow::class,
    AsyncFlow::class,
    WaitFlow::class,
    SendWelcomeMail::class,
    ErrorFlow::class,
    WelcomeFlow::class,
    WelcomeAllFlow::class,
]);
