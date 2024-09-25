<?php

namespace Jhonattan\CrudPessoas\Infra\Repositories;

use PDO;
use Jhonattan\CrudPessoas\Config\Connection;
use Jhonattan\CrudPessoas\Domain\Entities\Person;
use Jhonattan\CrudPessoas\Application\Dtos\PersonDto;

class PersonRepository
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = Connection::connect();
    }
    public function index(): array
    {
        $sql = "SELECT * FROM persons";
        $stmt = $this->pdo->query($sql);
        $persons = $stmt->fetchAll();
        return $persons;
    }
    public function show(string $id): PersonDto
    {
        $sql = "SELECT * FROM persons WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $personData = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$personData) {
            throw new \InvalidArgumentException("Pessoa não encontrada");
        }

        return new PersonDto($personData['name'], $personData['email'], $personData['phone'], $personData['id']);
    }
    public function insert(Person $person): PersonDto
    {
        $sql = "INSERT INTO persons (name, email, phone) VALUES (:name, :email, :phone)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $person->getName());
        $stmt->bindValue(':email', $person->getEmail());
        $stmt->bindValue(':phone', $person->getPhone());
        $stmt->execute();
        $id = $this->pdo->lastInsertId();
        return new PersonDto($person->getName(), (string)$person->getEmail(), (string)$person->getPhone(), $id);
    }
    public function update(Person $person, string $id): PersonDto
    {
        $sql = "UPDATE persons SET name = :name, email = :email, phone = :phone WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $person->getName());
        $stmt->bindValue(':email', $person->getEmail());
        $stmt->bindValue(':phone', $person->getPhone());
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return new PersonDto($person->getName(), (string)$person->getEmail(), (string)$person->getPhone(), $id);
    }
    public function delete(string $id): bool
    {
        $sql = "DELETE FROM persons WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
