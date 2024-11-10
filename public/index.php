<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\AuthController;
use \app\controllers\SiteController;
use \app\core\Application;
use \app\models\User;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(path: __DIR__), $config);

$app->router->get("/home", [new SiteController(), "home"]);

$app->router->get("/contact", [new SiteController(), "contact"]);
$app->router->post('/contact', [new SiteController(),'contact']);

$app->router->get("/login", [new AuthController(), "login"]);
$app->router->post("/login", [new AuthController(), "login"]);

$app->router->get("/register", [new AuthController(), "register"]);
$app->router->post("/register", [new AuthController(), "register"]);

$app->router->get('/logout', [new AuthController(),'logout']);

$app->router->get('/profile', [new AuthController(),'profile']);


$app->run();
