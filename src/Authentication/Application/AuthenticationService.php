<?php

namespace Test\Authentication\Application;

use Test\Authentication\Domain\Exception\UserNotFoundException;
use Test\Authentication\Domain\Interfaces\IUserRepository;
use Test\Authentication\Domain\User\JwtAccess;

class AuthenticationService
{
    private IUserRepository $repository;

    public function updateToken()
    {

    }

    public function getToken(string $email, string $password): JwtAccess
    {
        $user = $this->repository->getByEmail($email);

        if (!$user) {
            throw new UserNotFoundException();
        }

        $jwtAccess = $user->authorize($email, $password);

        return $jwtAccess;
    }
}