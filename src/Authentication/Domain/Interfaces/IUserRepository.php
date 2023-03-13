<?php

namespace Test\Authentication\Domain\Interfaces;

use Test\Authentication\Domain\User\User;

interface IUserRepository
{
    public function save(User $user): void;

    public function getByLoginPassword(string $email, string $password);

    public function getByEmail(string $email): ?User;
}