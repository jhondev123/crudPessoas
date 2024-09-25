<?php

namespace Jhonattan\CrudPessoas\Domain\ValueObjects;

class Email
{
    public function __construct(private string $email)
    {
        
        $this->validateEmail();
    }
    private function validateEmail(): void
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Email inválido");
        }
    }
    public function __toString(): string
    {
        return $this->email;
    }
}
