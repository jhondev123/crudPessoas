<?php

namespace Jhonattan\CrudPessoas\Domain\ValueObjects;

class Phone
{
    public function __construct(private string $number)
    {
        $this->validatePhone();
    }
    private function validatePhone(): void
    {

        if (!preg_match('/^\d{11}$/', $this->number)) {
            throw new \InvalidArgumentException("Número inválido");
        }
    }
    public function __toString(): string
    {
        return $this->number;
    }
}
