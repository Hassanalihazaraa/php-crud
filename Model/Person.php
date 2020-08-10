<?php
declare(strict_types=1);

class Person
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $location;

    public function __construct(int $id, string $firstName, string $lastName, string $email, string $location)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->location = $location;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFullName(): string
    {
        return $this->firstName . " " . $this->lastName;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getLocation(): string
    {
        return $this->location;
    }
}