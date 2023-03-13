<?php

namespace Test\Authentication\Infrastructure;

use PDO;
use Test\Authentication\Domain\Interfaces\IUserRepository;
use Test\Authentication\Domain\User\User;
use Test\PDO\Connection;

class PDORepository implements IUserRepository
{
    public function save(User $user): void
    {
        $db = Connection::make();

        $password = $user->getPassword();
        $email = $user->getEmail();
        $name = $user->getName();
        $lastName = $user->getLastName();
        $phone = $user->getPhone();

        $query = "INSERT INTO Users (firstName, email, lastName, phone, password) 
        VALUES ('$name', '$email', '$lastName', '$phone', '$password')";

        $db->exec($query);
    }

    public function getByLoginPassword(string $email, string $password)
    {
        // TODO: Implement getByLoginPassword() method.
    }

    public function getByEmail(string $email): ?User
    {
        $db = Connection::make();

        $query = "Select * From Users Where email='$email' LIMIT 1;";

        $response = $db->query($query)->fetch(PDO::FETCH_ASSOC);


        if (!$response) {
            return null;
        }

        $user = new User($response['email'], $response['firstName'], $response['lastName'], $response['phone'], $response['password']);

        return $user;
    }
}