<?php
require('./connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Payment Details</title>

    <!-- Add admin.css -->
    <link rel="stylesheet" href="../css/tablestyle.css">
</head>
<body>

<div id="pgmain">

        <?php
        if (isset($_GET['message'])) {
            $msg = $_GET['message']; 
            $msg = str_replace('%20', ' ', $msg);

            if ($msg == "New Record Created Successfully") {
                echo "<div class='alert success' id='alertDiv'>";
                echo "$msg";
                echo "</div>";
            } else if ($msg =="Record Updated Successfully"){
                echo "<div class='alert success' id='alertDiv'>";
                echo "$msg";
                echo "</div>";
            }
            else if ($msg = "Record Deleted") {
                echo "<div class='alert danger' id='alertDiv'>";
                echo "$msg";
                echo "</div>";
            }
        }
        ?>

        <h1><span>Payment</span> Table View</h1>


        <table class="styled-table">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Address</Address></td>
                    <td>City</td>
                    <td>State</td>
                    <td>Zip Code</td>
                    <td>Name of Card</td>
                    <td>Card number</td>
                    <td>Exp month</td>
                    <td>Exp year</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
            </thead>

            <?php

            $sql="SELECT * FROM payment";
            $result = $conn->query($sql);

            echo "<tbody>";
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fname'] . "</td>";  
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['p_address'] . "</td>";
                    echo "<td>" . $row['p_city'] . "</td>";
                    echo "<td>" . $row['p_state'] . "</td>";
                    echo "<td>" . $row['p_zip'] . "</td>";
                    echo "<td>" . $row['namecard'] . "</td>";
                    echo "<td>" . $row['no_card'] . "</td>";
                    echo "<td>" . $row['ex_month'] . "</td>";
                    echo "<td>" . $row['ex_year'] . "</td>";
                   


                    echo "<td>";
                    echo "<button class = 'button buttonEdit'><a href='updatepayment.php?id=$row[id]&fname=$row[fname]&email=$row[email]&p_address=$row[p_address]&p_city=$row[p_city]&p_state=$row[p_state]&p_zip=$row[p_zip]&namecard=$row[namecard]&no_card=$row[no_card]&ex_month=$row[ex_month]&ex_year=$row[ex_year]'>Update</a></button>";
                    echo "</td>";

                    echo "<td>";
                    echo "<button class = 'button buttonDel' window.location.href = 'payment.php';><a id='delete' href='deleteuserpayment.php?id=$row[id]'>Delete</a></button>";
                    echo "</td>";

                    echo "</tr>";
                }
                echo "</tbody>";
            } else {
                echo "<center>Table is empty!</center>";
            }
            

            mysqli_close($conn);
            ?>

        </table>
    </div>

    <script>
        // Function to fade out the div
        function fadeOut(element) {
            var op = 1; // initial opacity

            // Timer to decrease opacity gradually
            var timer = setInterval(function() {
                if (op <= 0.1) {
                    clearInterval(timer);
                    element.style.display = 'none'; // Hide the element when faded out
                }

                element.style.opacity = op;
                element.style.filter = 'alpha(opacity=' + op * 100 + ')';
                op -= op * 0.1;
            }, 10); // Decrease opacity every 10ms
        }

        // Fade out the div after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            var myDiv = document.getElementById('alertDiv');
            fadeOut(myDiv);
        }, 3000);
    </script>


</body>

</html>