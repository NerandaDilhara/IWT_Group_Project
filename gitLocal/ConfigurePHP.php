<?php

$con=new mysqli ('localhost','root','','LifeInsuranceManagementSystem');

if(!$con)
{
  die(mysqli_error($con));
}
else{

  echo "<script>console.log(\"running\")</script>";

}


?>