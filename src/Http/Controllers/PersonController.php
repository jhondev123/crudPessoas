<?php

namespace Jhonattan\CrudPessoas\Http\Controllers;

use Exception;
use Jhonattan\CrudPessoas\Application\Dtos\PersonDto;
use Jhonattan\CrudPessoas\Infra\Repositories\PersonRepository;
use Jhonattan\CrudPessoas\Application\UseCases\Person\ShowPersonUseCase;
use Jhonattan\CrudPessoas\Application\UseCases\Person\IndexPersonUseCase;
use Jhonattan\CrudPessoas\Application\UseCases\Person\InsertPersonUseCase;
use Jhonattan\CrudPessoas\Application\UseCases\Person\UpdatePersonUseCase;

class PersonController extends Controller
{
    public function index()
    {
        $personRepository = new PersonRepository();
        $useCase = new IndexPersonUseCase($personRepository);


        $persons = $useCase->execute();
        echo $this->twig()->render('persons.html.twig', ['persons' => $persons]);
    }

    public function show($id)
    {

        $personRepository = new PersonRepository();
        $useCase = new ShowPersonUseCase($personRepository);
        $person = $useCase->execute($id);

        echo $this->twig()->render('person.html.twig', ['person' => $person]);
    }
    public function storeView()
    {
        echo $this->twig()->render('registerPerson.html.twig');
    }
    public function store()
    {
        $personRepository = new PersonRepository();
        $useCase = new InsertPersonUseCase($personRepository);
        $personDto = new PersonDto(
            $_POST['name'],
            $_POST['email'],
            $_POST['phone']
        );
        try {
            $useCase->execute($personDto);
            header('Location: /');
        } catch (\InvalidArgumentException $e) {
            echo $this->twig()->render('registerPerson.html.twig', ['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            echo $this->twig()->render('registerPerson.html.twig', ['error' => 'Erro inesperado']);
        }
    }
    public function update()
    {
        $personRepository = new PersonRepository();
        $useCase = new UpdatePersonUseCase($personRepository);

        $personDto = new PersonDto(
            $_POST['name'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['id']
        );
        try {
            $useCase->execute($personDto);
            header('Location: /');
        } catch (\InvalidArgumentException $e) {
            echo $this->twig()->render('person.html.twig', ['person' => $personDto, 'error' => $e->getMessage()]);
        } catch (\Exception $e) {
            echo $this->twig()->render('person.html.twig', ['person' => $personDto, 'error' => 'Erro inesperado']);
        }
    }
    public function destroy($id)
    {
        $personRepository = new PersonRepository();
        try {
            $personRepository->delete($id);
            http_response_code(204);
        } catch (Exception $e) {
            http_response_code(404);
        }
    }
}
