<?php

use Dotenv\Dotenv;
use Jhonattan\CrudPessoas\Config\Bootstrap;

require_once __DIR__ . "/vendor/autoload.php";


if (file_exists(__DIR__ . "/.env")) {
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
} else {
    Bootstrap::mountEnv();
}

$router = new AltoRouter();
$router->map('GET', '/', 'Jhonattan\CrudPessoas\Http\Controllers\PersonController:index', 'home');

$router->map('GET', '/pessoa/[i:id]', 'Jhonattan\CrudPessoas\Http\Controllers\PersonController:show', 'show');
$router->map('POST', '/atualizar/pessoa', 'Jhonattan\CrudPessoas\Http\Controllers\PersonController:update', 'update');

$router->map('GET', '/cadastrar/pessoa', 'Jhonattan\CrudPessoas\Http\Controllers\PersonController:storeView', 'storeView');
$router->map('POST', '/cadastrar/pessoa', 'Jhonattan\CrudPessoas\Http\Controllers\PersonController:store', 'store');

$router->map('GET', '/excluir/pessoa/[i:id]', 'Jhonattan\CrudPessoas\Http\Controllers\PersonController:destroy', 'destroy');


$match = $router->match();

if ($match) {
    list($controller, $method) = explode(':', $match['target']);

    if (class_exists($controller) && method_exists($controller, $method)) {
        $controllerInstance = new $controller();
        call_user_func_array([$controllerInstance, $method], $match['params']);
    } else {
        http_response_code(404);
        echo "404 Not Found";
    }
} else {
    http_response_code(404);
    echo "404 Not Found";
}
