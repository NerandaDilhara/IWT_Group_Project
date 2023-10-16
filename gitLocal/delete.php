<?php
include 'connect.php';

if(isset($_GET['deleteid'])){
    $u_ID=$_GET['deleteid'];

    $sql="delete from `contact_us` where id=$u_ID";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Deleted successfull";
       header('location:displaymessage.php');
    }else{
        die(mysqli_error($con));
    }
}
?>