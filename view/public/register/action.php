<?php

use Test\Authentication\Domain\Exception\UserValidateException;

require '../bootstrap.php';

$request = $_POST;

$user = new \Test\Authentication\DTO\UserDTO($request['name'],
    $request['lastName'],
    $request['phone'],
    $request['email'],
    $request['password']);

if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
    $secret = $_ENV['RECAPTCHA'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $response = $_POST['g-recaptcha-response'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
    $arr = json_decode($rsp, TRUE);
    if ($arr['success']) {
        $service = new \Test\Authentication\Application\RegistrationService(
            new \Test\Authentication\Infrastructure\PDORepository(),
            new \Test\Authentication\Infrastructure\UserRakitValidator()
        );

        try {
            $service->register($user);
        } catch (UserValidateException $ex) {
            echo ($ex->getMessage());
            die();
        } catch (\Throwable $ex) {
            echo 'Ошибка запроса. Пожалуйста, повторите позже';
            die();
        }

        echo 'Пользователь успешно зарегестрирован';
    }
} else {
    echo 'Капча не пройдена';
    die();
}



