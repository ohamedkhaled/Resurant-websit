<?php
require_once 'backend/controllers/UserController.php';
require_once 'backend/models/User.php';

    $user_controller = new UserController();
    $user_add = new User();
    $fn = $_POST['fname'];
    $ln = $_POST['lname'];
    $eml = $_POST['eml'];
    $psw = $_POST['pass'];
    $pn = $_POST['phone'];

    $user_add = new User();
    $user_add->setFirstName($fn);
    $user_add->setLastName($ln);
    $user_add->setEmail($eml);
    $user_add->setPassword($psw);
    $user_add->setPhoneNumber($pn);

    $user_controller->create($user_add);
        echo "Account have been created !";

?>