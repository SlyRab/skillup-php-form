<?php

namespace Services\DTO;
class User
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly int    $phone,
    public readonly string $captcha)
    {
    }
}