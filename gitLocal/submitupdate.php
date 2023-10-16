<?php
require('./connection.php');
?>

<?php
if ($_GET['submit']) {
    $id= $_GET['id'];
    $fname= $_GET['fname'];
    $email= $_GET['email'];
    $p_address = $_GET['p_address'];
    $p_city = $_GET['p_city'];
    $p_state = $_GET['p_state'];
    $p_zip = $_GET['p_zip'];
    $namecard = $_GET['namecard'];
    $no_card = $_GET['no_card'];
    $ex_month= $_GET['ex_month'];
    $ex_year = $_GET['ex_year'];


    $query = "UPDATE payment SET
                        fname = '$fname',
                        email = '$email',
                        p_address = '$p_address',
                        p_city = '$p_city',
                        p_state = '$p_state',
                        p_zip = '$p_zip',
                        namecard = '$namecard',
                        no_card = '$no_card',
                        ex_month = '$ex_month',
                        ex_year = '$ex_year'
                        WHERE id = '$id'";

    $data = mysqli_query($conn, $query);

    if ($data) {
        $message = "Record Updated Successfully";
        header("location:./userpaymentdetails.php?message=".$message);
    } else {
        echo "Error in Update: " . mysqli_error($conn);;
    }
}

mysqli_close($conn);

?>