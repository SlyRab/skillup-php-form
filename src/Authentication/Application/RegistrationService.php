<?php

namespace Test\Authentication\Application;

use Test\Authentication\Domain\Exception\RegisterException;
use Test\Authentication\Domain\Interfaces\IUserRepository;
use Test\Authentication\Domain\Interfaces\IUserValidator;
use Test\Authentication\Domain\User\User;
use Test\Authentication\DTO\UserDTO;

class RegistrationService
{
    public function __construct(
        private IUserRepository $repository,
        private IUserValidator  $userValidator)
    {
    }

    public function register(UserDTO $userDto)
    {
        if ($this->repository->getByEmail($userDto->email)) {
            throw new RegisterException();
        }

        $this->userValidator->validate($userDto->getArray());

        $user = new User($userDto->email, $userDto->name, $userDto->lastName, $userDto->phone, $userDto->password);

        $this->repository->save($user);
    }
}