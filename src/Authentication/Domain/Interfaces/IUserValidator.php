<?php

namespace Test\Authentication\Domain\Interfaces;

interface IUserValidator
{
    public function validate(array $data);
}