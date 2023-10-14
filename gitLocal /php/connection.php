<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "LifeInsuranceManagementSystem";

    $conn = new mysqli($server, $user, $password, $database);

    if(!$conn){
        die("Connection Failed!". $conn->connect_error);
    }

?>
