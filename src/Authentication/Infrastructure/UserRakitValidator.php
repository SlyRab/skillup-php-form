<?php

namespace Test\Authentication\Infrastructure;

use Rakit\Validation\Validator;
use Test\Authentication\Domain\Exception\UserValidateException;
use Test\Authentication\Domain\Interfaces\IUserValidator;
use Test\PDO\Connection;

class UserRakitValidator implements IUserValidator
{
    public function validate(array $data)
    {
        $validator = new Validator();

        $validation = $validator->validate($data, [
            'email' => 'required|email',
            'password' => 'required|min:6',
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required|numeric'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            var_dump($errors->all()[0]);
            throw new UserValidateException($errors->toArray()[0]);
        }
    }
}