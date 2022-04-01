<?php

use App\Controllers\AuthController;
use App\Controllers\SiteController;
use App\Core\Application;
use App\Models\User;

require_once '../vendor/autoload.php';

define('DIR_ROOT', dirname(__DIR__));

$dotenv = Dotenv\Dotenv::createImmutable(DIR_ROOT);
$dotenv->load();

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new Application(DIR_ROOT, $config);

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->run();