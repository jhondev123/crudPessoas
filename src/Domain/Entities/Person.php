<?php

namespace Jhonattan\CrudPessoas\Domain\Entities;

use Jhonattan\CrudPessoas\Domain\ValueObjects\Email;
use Jhonattan\CrudPessoas\Domain\ValueObjects\Phone;


class Person
{
    public function __construct(private string $name, private Email $email, private Phone $phone, private ?string $id = null) {}
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): Email
    {
        return $this->email;
    }
    public function getPhone(): Phone
    {
        return $this->phone;
    }
    public function getId(): ?string
    {
        return $this->id;
    }
}
