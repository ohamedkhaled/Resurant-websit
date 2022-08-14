<?php
require_once "backend/controllers/UserController.php";
require_once "backend/models/User.php";
// controller and model.

function printUser($list){
    echo "Total number of Users: " . sizeof($list) . "<br/>";
    foreach ($list as $user) {
        echo "User Id: " . $user->getUserId() . "<br/>";
        echo "User first name: " . $user->getFirstName() . "<br/>";
        echo "User last name: " . $user->getLastName() . "<br/>";
        echo "User Email: " . $user->getEmail() . "<br/>";
        echo "User Password: " . $user->getPassword() . "<br/>";
        echo "User Phone number: " . $user->getPhoneNumber() . "<br/>";
        echo "***************<br/>";
    }
}

$user_controller = new UserController();


// get
echo "the database before any operations<br/>";
//print_r($user_controller->getAll());
printUser($user_controller->getAll());
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

// insert
$user_add = new User();
$user_add->setUserId(10);
$user_add->setFirstName('Diaa');
$user_add->setLastName('Jamal');
$user_add->setEmail('diaa.jamdal@yahoo.com');
$user_add->setPassword('Diaa0111');
$user_add->setPhoneNumber('01147817213');

$user_controller->create($user_add);

// get
echo "the database after create operation<br/>";
printUser($user_controller->getAll());
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<br/>";


?>
