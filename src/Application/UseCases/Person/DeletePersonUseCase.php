<?php

namespace Jhonattan\CrudPessoas\Application\UseCases\Person;

use Jhonattan\CrudPessoas\Infra\Repositories\PersonRepository;


class DeletePersonUseCase
{
    public function __construct(private PersonRepository $personRepository) {}
    public function execute(int $id): bool
    {
        return $this->personRepository->delete($id);
    }
}
