<?php

namespace Test\Authentication\Domain\User;

use Test\Authentication\Domain\Exception\AuthException;
use Test\Authentication\Domain\Interfaces\IJwtWorker;

class User
{
    private int $id;
    private JwtAccess $jwtAccess;
    private IJwtWorker $jwtCreator;

    public function __construct(
        private string $email,
        private string $name,
        private string $lastName,
        private string $phone,
        private string $password,
    )
    {
    }

    public function authorize(string $email, string $password): JwtAccess
    {
        if (!$email === $this->email || !$password === $this->password)
        {
            throw new AuthException();
        }

        if ($this->jwtCreator->checkJWTExpired($this->jwtAccess->refreshToken))
        {
            $this->jwtAccess = new JwtAccess($this->jwtCreator->createJWT(), $this->jwtCreator->createJWT());
        }

        return $this->jwtAccess;
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