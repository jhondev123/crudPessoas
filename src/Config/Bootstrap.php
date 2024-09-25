<?php

namespace Jhonattan\CrudPessoas\Config;

class Bootstrap
{
    public static function mountEnv()
    {
        $_ENV['APP_URL'] = getenv('APP_URL');
        $_ENV['DB_HOST'] = getenv('DB_HOST');
        $_ENV['DB_PORT'] = getenv('DB_PORT');
        $_ENV['DB_DATABASE'] = getenv('DB_DATABASE');
        $_ENV['DB_USERNAME'] = getenv('DB_USERNAME');
        $_ENV['DB_PASSWORD'] = getenv('DB_PASSWORD');
    }
}
