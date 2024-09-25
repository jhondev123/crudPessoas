<?php

namespace Jhonattan\CrudPessoas\Application\UseCases\Person;

use Jhonattan\CrudPessoas\Infra\Repositories\PersonRepository;
use Jhonattan\CrudPessoas\Application\Dtos\PersonDto;


class UpdatePersonUseCase
{
    public function __construct(private PersonRepository $personRepository) {}
    public function execute(PersonDto $personDto): PersonDto
    {
        $person = $personDto->toEntity();
       return  $this->personRepository->update($person,$personDto->id);
    }
}
