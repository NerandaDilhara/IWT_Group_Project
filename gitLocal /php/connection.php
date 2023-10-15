<?php

    $conn = new mysqli("localhost", "root", "", "LifeInsuranceManagementSystem");

    if(!$conn){
        echo "Connection Faild!".$conn->connect_error;
    }

?>
