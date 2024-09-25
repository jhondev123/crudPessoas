<?php

namespace Jhonattan\CrudPessoas\Application\UseCases\Person;

use Jhonattan\CrudPessoas\Application\Dtos\PersonDto;
use Jhonattan\CrudPessoas\Infra\Repositories\PersonRepository;


class InsertPersonUseCase
{
    public function __construct(private PersonRepository $personRepository) {}
    public function execute(PersonDto $personDto): PersonDto
    {
        $person = $personDto->toEntity();
        return $this->personRepository->insert($person);
    }
}
