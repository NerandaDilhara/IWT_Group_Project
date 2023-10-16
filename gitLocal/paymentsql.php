<?php

require('./connection.php');


    $fname= $_POST['fname'];
    $email= $_POST['email'];
    $p_address= $_POST['p_address'];
    $p_city= $_POST['p_city'];
    $p_state= $_POST['p_state'];
    $p_zip= $_POST['p_zip'];
    $namecard= $_POST['namecard'];
    $no_card= $_POST['no_card'];
    $ex_month= $_POST['ex_month'];
    $ex_year= $_POST['ex_year'];

$sql ="INSERT INTO payment(id, fname, email, p_address, p_city, p_state, p_zip, namecard, no_card, ex_month, ex_year)
VALUES ('', '$fname', '$email', '$p_address', '$p_city', '$p_state', '$p_zip', '$namecard', '$no_card', '$ex_month', '$ex_year' )";

//Java Sript part
if (mysqli_query($conn, $sql)){
    echo '<script>alert("Thank you for your payment! \n Click OK to pay!"); window.location.href = "userpaymentdetails.php";</script>';
}else{
    echo"Error" . $sql . "<br>" .mysqli_error($conn);
}

mysqli_close($conn);
?>