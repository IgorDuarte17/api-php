<?php

namespace App\Models;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $cpf;
    private string $password;

    public function __construct(
        int $id = null,
        String $name,
        String $email,
        String $cpf,
        String $password
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}