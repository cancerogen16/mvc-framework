<?php

use App\Core\Application;

require_once '../vendor/autoload.php';

$app = new Application();

$app->router->get('/', function (){
    return 'Hello, world!';
});

$app->router->get('/contact', 'contact');

$app->run();