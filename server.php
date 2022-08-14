<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurantpro";
    
    // Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>