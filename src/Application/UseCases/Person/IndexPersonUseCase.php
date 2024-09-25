<?php 
namespace Jhonattan\CrudPessoas\Application\UseCases\Person;

use Jhonattan\CrudPessoas\Infra\Repositories\PersonRepository;


class IndexPersonUseCase
{
    public function __construct(private PersonRepository $personRepository) {}
    public function execute(): array
    {
        return $this->personRepository->index();
    }
}