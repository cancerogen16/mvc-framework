<?php

use erast\phpmvc\Application;

require_once './vendor/autoload.php';

const DIR_ROOT = __DIR__;

$dotenv = Dotenv\Dotenv::createImmutable(DIR_ROOT);
$dotenv->load();

$config = [
    'userClass' => '',
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new Application(DIR_ROOT, $config);

$app->db->applyMigrations();