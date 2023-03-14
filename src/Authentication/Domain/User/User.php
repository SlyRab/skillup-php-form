<?php

namespace Test\Authentication\Domain\User;


class User
{
    private int $id;

    public function __construct(
        private string $email,
        private string $name,
        private string $lastName,
        private string $phone,
        private string $password,
    )
    {
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}