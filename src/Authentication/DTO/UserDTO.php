<?php

namespace Test\Authentication\DTO;

class UserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $lastName,
        public readonly string $phone,
        public readonly string $email,
        public readonly string $password
    )
    {
    }

    public function getArray()
    {
        return [
            'name' => $this->name,
            'lastName' => $this->lastName,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}