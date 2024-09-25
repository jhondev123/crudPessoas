<?php

namespace Jhonattan\CrudPessoas\Domain\ValueObjects;

class Phone
{
    public function __construct(private string $number)
    {
        $this->removeSpecialCharacters();
        $this->validatePhone();
    }
    private function validatePhone(): void
    {

        if (!preg_match('/^\d{11}$/', $this->number)) {
            throw new \InvalidArgumentException("Número inválido");
        }
    }
    private function removeSpecialCharacters(): void
    {
        $this->number = preg_replace('/[^0-9]/', '', $this->number);
    }
    public function __toString(): string
    {
        return $this->number;
    }
}
