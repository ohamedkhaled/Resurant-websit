<?php
require_once 'backend/controllers/UserController.php';
require_once 'backend/models/User.php';
// controller and model.
session_start();
if(isset($_COOKIE['cookie_name']))
{
    header('Location: HomePage.html');
}
    $eml=$_POST['eml'];
    $psw=$_POST['pass'];
    function checkUser($list, $eml, $psw){
        foreach ($list as $user) {
            if($eml == $user->getEmail() and $psw == $user->getPassword()){
                if(!empty($_POST["remember"]))
                {
                    $cookie_name = $_POST["eml"];
                    $cookie_value = $_POST["pass"];
                    echo $cookie_name.$cookie_value;
                    setcookie('cookie_name', $cookie_name, time() + (86400 * 30)); // 86400 = 1 day
                }

                header('Location: HomePage.html');
                break;
            }
            else continue;
        }
    }
    $user_controller = new UserController();
    checkUser($user_controller->getAll(), $eml ,$psw);


?>