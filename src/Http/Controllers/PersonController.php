<?php

namespace Jhonattan\CrudPessoas\Http\Controllers;

use Twig\Environment;
use Nyholm\Psr7\Response;
use Twig\Loader\FilesystemLoader;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Jhonattan\CrudPessoas\Infra\Repositories\PersonRepository;
use Jhonattan\CrudPessoas\Application\UseCases\Person\IndexPersonUseCase;

class PersonController
{
    public function index()
    {
        $personRepository = new PersonRepository();
        $useCase = new IndexPersonUseCase($personRepository);
        $persons = $useCase->execute();
        $loader = new FilesystemLoader(dirname(__DIR__, 2) . "/Views");
        $twig = new Environment($loader);
        echo $twig->render('persons.html.twig', ['persons' => $persons]);
    }

    public function show($id)
    {
        return new Response(200, [], "");
    }
    public function update(RequestInterface $request) {}
    public function store(RequestInterface $request) {}
    public function destroy($id) {}
}
