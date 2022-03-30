<?php

use App\Core\Application;

require_once '../vendor/autoload.php';

define('DIR_ROOT', dirname(__DIR__));

$app = new Application(DIR_ROOT);

$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');

$app->router->post('/contact', function (){
    return 'handling submitted data';
});

$app->run();