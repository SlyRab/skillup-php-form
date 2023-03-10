<?php

namespace Domain;
class User
{
    public function __construct(
        private int      $id,
        private string   $name,
        private string $email,
        private string   $phone)
    {
    }
}