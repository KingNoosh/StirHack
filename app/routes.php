<?php
// Routes

$app->get('/', 'App\Action\HomeAction:dispatch')
    ->setName('homepage');
$app->get('/status', 'App\Action\StatusAction:dispatch')
    ->setName('status');
