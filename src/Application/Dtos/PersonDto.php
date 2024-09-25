<?php

namespace Jhonattan\CrudPessoas\Application\Dtos;

use Jhonattan\CrudPessoas\Domain\Entities\Person;
use Jhonattan\CrudPessoas\Domain\ValueObjects\Email;
use Jhonattan\CrudPessoas\Domain\ValueObjects\Phone;



class PersonDto
{
    public function __construct(public string $name, public string $email, public string $phone, public ?string $id = null) {}
    public function toEntity()
    {
        return new Person($this->name, new Email($this->email), new Phone($this->phone));
    }
}
