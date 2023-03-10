<?php

\Controller\RegistrationController::register($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    header('Content-type: application/json');

    $postHandler = new DepositPostHandler();
    $postHandler->OnPostRequest();
}
