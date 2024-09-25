<?php

use CoffeeCode\Router\Router;
use Dotenv\Dotenv;

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
var_dump(getenv('DB_HOST'));exit();

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
