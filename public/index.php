<?php

use App\Controllers\SiteController;
use App\Core\Application;

require_once '../vendor/autoload.php';

define('DIR_ROOT', dirname(__DIR__));

$app = new Application(DIR_ROOT);

$app->router->get('/', 'home');

$app->router->get('/contact', [SiteController::class, 'contact']);

$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->run();