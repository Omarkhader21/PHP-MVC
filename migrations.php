<?php

require_once __DIR__ . "/vendor/autoload.php";

use \app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);

$app->database->applyMigrations();
