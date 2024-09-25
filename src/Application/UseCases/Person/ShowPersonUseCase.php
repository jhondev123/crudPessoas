<?php

namespace Jhonattan\CrudPessoas\Application\UseCases\Person;

use Jhonattan\CrudPessoas\Application\Dtos\PersonDto;
use Jhonattan\CrudPessoas\Infra\Repositories\PersonRepository;


class ShowPersonUseCase
{
    public function __construct(private PersonRepository $personRepository) {}
    public function execute(int $id): PersonDto
    {
        return $this->personRepository->show($id);
    }
}
