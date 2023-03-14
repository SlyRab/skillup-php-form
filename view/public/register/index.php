<?php
require_once '../bootstrap.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
<form action="action.php" method="post">
    <div><p>Имя</p><input type="text" name="name"></div>
    <div><p>Фамилия</p><input type="text" name="lastName"></div>
    <div><p>Почта</p><input type="text" name="email"></div>
    <div><p>Телефон</p><input type="text" name="phone" </div>
    <div><p>Пароль</p><input type="password" name="password" </div>
    <div><p>Капча</p>
        <div class="g-recaptcha" data-sitekey="<?=$_ENV['RECAPTCHA']?>"></div>
    </div>
    <div><input type="submit"></div>
</form>
</body>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>