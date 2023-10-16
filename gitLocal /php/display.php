//display php                                                                                    <?php
include 'connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X Insurance</title>
    <link rel="stylesheet" href="css/contactUs.css">
</head>
<body>

<div class="container">
    <button class="btn"><a href="contactUs.php" class="text-light">Add user</a>
    </button>

    <table class="table">
     <thead>
        <tr>
          <th>userID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Mobile</th>
          <th>Message</th>
          <th>Subject</th>
          <th>Operation</th>
        </tr>
     </thead>

      
    <tbody>

        <?php

                       $sql="Select * from `contact_us`";
                       $result=mysqli_query($con,$sql);
                       if($result){
                       while( $row=mysqli_fetch_assoc($result)){
                       $userID=$row['userID'];
                       $name=$row['name'];
                       $email=$row['email'];
                       $number=$row['number'];
                       $subject=$row['subject'];
                       $message=$row['message'];

                      echo '<tr>
                          <th scope="row">'.$userID.'</th>
                          <td>'.$name.'</td>
                          <td>'.$email.'</td>
                          <td>'.$number.'</td>
                          <td>'.$subject.'</td>
                          <td>'.$message.'</td>
                          <td>
                          <div class="btn1 ">
                              <a href="update.php? updateid='.$userID.'"class="text-light">Update</a>
                          </div>
                          <div class="btn2 ">
                              <a href="delete.php? deleteid='.$userID.'"class="text-light>Delete</a>
                          </div>
                          </td>
                      </tr>';
                }
            }
        ?>

    </tbody>
    </table>
</div>    
    
</body>
</html>