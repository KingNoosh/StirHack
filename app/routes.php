<?php
// Routes

$app->get('/', 'App\Action\HomeAction:dispatch')
    ->setName('homepage');
$app->get('/status', 'App\Action\StatusAction:dispatch')
    ->setName('status');
$app->get('/log', 'App\Action\LogAction:dispatch')
    ->setName('log');
