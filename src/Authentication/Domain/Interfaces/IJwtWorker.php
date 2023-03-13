<?php

namespace Test\Authentication\Domain\Interfaces;

interface IJwtWorker
{
    public function createJWT(): string;
    public function checkJWTExpired(string $jwt);
}