<?php

namespace Test\Authentication\Domain\User;

class JwtAccess
{
    public function __construct(
        public readonly string $refreshToken,
        public readonly string $accessToken
    )
    {
    }
}