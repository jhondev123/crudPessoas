<?php

use CoffeeCode\Router\Router;
use Dotenv\Dotenv;

require_once __DIR__ . "/vendor/autoload.php";
if (file_exists(__DIR__ . "/.env")) {

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}else{
    $_ENV['APP_URL'] = getenv('APP_URL');
    $_ENV['DB_HOST'] = getenv('DB_HOST');
    $_ENV['DB_PORT'] = getenv('DB_PORT');
    $_ENV['DB_DATABASE'] = getenv('DB_DATABASE');
    $_ENV['DB_USERNAME'] = getenv('DB_USERNAME');
    $_ENV['DB_PASSWORD'] = getenv('DB_PASSWORD');
}

$router = new Router($_ENV['APP_URL']);
$router->namespace("Jhonattan\CrudPessoas\Http\Controllers");

$router->get('/', 'PersonController:index');
$router->get('/editar/{id}', 'PersonController:show');

$router->group("error");
$router->get("/{errcode}", "ErrorController:notFound");

$router->dispatch();


if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}
