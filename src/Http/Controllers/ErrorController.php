<?php

namespace Jhonattan\CrudPessoas\Http\Controllers;

class ErrorController
{
    public function notFound($data)
    {
        echo "<h1>Erro {$data['errcode']}</h1>";
    }
}
