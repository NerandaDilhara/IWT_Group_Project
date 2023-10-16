<?php

$con = new mysqli ('localhost', 'root', '', 'lifeinsurancemanagementsystem');

if(!$con){
    die(mysqli_error($con));
}else{
    echo "Success";
}

?>