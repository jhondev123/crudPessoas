<?php

namespace Jhonattan\CrudPessoas\Http\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    protected function twig(): Environment
    {
        $loader = new FilesystemLoader(dirname(__DIR__, 2) . "/Views");
        $twig = new Environment($loader);

        return $twig;
    }
}
