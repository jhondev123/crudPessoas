<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Jhonattan\CrudPessoas\Application\UseCases\Person\DeletePersonUseCase;
use Jhonattan\CrudPessoas\Infra\Repositories\PersonRepository;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$repository = new PersonRepository();

$useCase = new DeletePersonUseCase($repository);
var_dump($useCase->execute('2'));
