<?php

use Test\Authentication\Domain\Exception\UserValidateException;

require '../bootstrap.php';

$request = $_REQUEST;

$user = new \Test\Authentication\DTO\UserDTO($request['name'],
    $request['lastName'],
    $request['phone'],
    $request['email'],
    $request['password']);


$service = new \Test\Authentication\Application\RegistrationService(
    new \Test\Authentication\Infrastructure\PDORepository(),
    new \Test\Authentication\Infrastructure\UserRakitValidator()
);

try {
    $service->register($user);
} catch (UserValidateException $ex) {
    echo ($ex->getMessage());
} catch (\Throwable $ex) {
    echo 'Ошибка запроса. Пожалуйста, повторите позже';
}


