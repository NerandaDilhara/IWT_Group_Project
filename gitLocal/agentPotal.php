<?php
    
    include "php/connection.php";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['addButton'])){
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = "INSERT INTO agent (name, email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }else{
            echo "<script>alert('Data Inserted !')</script>";
        }
    }

   
  

    if(isset($_POST['updateAgent'])){
        $agentEmail = $_POST['agentEmail'];
        $agentName = $_POST['agentName'];
        $sql3 = "UPDATE agent SET name='$agentName' WHERE email='$agentEmail'";
        
        if($conn->query($sql3) === FALSE){
            echo "<script>alert('Enter valid Email')</script>";
        }
    }

    if(isset($_POST['deleteAgent'])){
        $agentEmail = $_POST['mail'];
        $sql4 = "DELETE FROM agent WHERE email='$agentEmail'";
        if($conn->query($sql4) === FALSE){
            echo "<script>alert('Enter valid Email')</script>";
        }
    }

    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/agentPotal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,700;1,400&family=Rubik&display=swap" rel="stylesheet">
    <link type="image/x-icon" rel="icon" href="Assets/favicon.png">
    <title>X Insurance</title>
    <style>
      /* Header CSS */

      .header-container{
        display: flex;
      }
      .logo{
        margin-top: 10px;
        margin-left: 20px;
        flex: 30%;
        padding: 15px;
        justify-content: center;
        height: 30px;
      }
      .navbar{
        margin-top: 10px;
        margin-left: 80px;
        font-weight: bold;
        flex: 70%;
        padding: 20px;
        height: 30px;
        justify-content: space-around;
      }
      .logo a{
        text-decoration: none;
        border: 0.1px;
        color: black;
        font-family: 'Poppins', sans-serif;
      }
      .navbar a{
        text-decoration: none;
        border: 0.1px;
        border-radius: 30px;
        color: black;
        font-family: 'Poppins', sans-serif;
        font-family: 'Rubik', sans-serif;
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 8px;
        padding-bottom: 8px;
      }
      .navbar a:hover{
        background-color: black;
        color: white;
        transition-duration: 0.5s;
      }
      /* Footer CSS */

      footer{
        margin-top:10%;
        margin-bottom:0;
        background-color:gray;
        position:static;
      }
      .footer-top{
        display:flex;
        margin-top:8%;
      }
      .news-container{
        display:inline-block;
        padding-top:30px;
        margin-left:5%;
      }
      .news-container h3{
        color:white;
        font-size:30px;
      }
      .news-container p{
        margin-top:10px;
        width:80%;
        color:rgb(172, 169, 169);
      }
      .news-container input{
        margin-top:10px;
        border:3px solid black;
        margin-bottom:20px;
        width:40%;
      }
      .contact-container{
        padding-top:30px;
        margin-left:40%;
      }
      .footer-breaker{
        border:3px solid white;
      }
      .footer-bottom{
        display:flex;
        margin-left:5%;
      }
      .footer-bottom a{
        text-decoration:none;
        margin-bottom:0;
      }
      .footer-menu{
        margin-left:60%;
      }
      .footer-menu a{
        display:inline-block;
        text-decoration:none;
        padding-left:50px;
        padding-top:40px;
        font-size:20px;
        color:rgb(51, 50, 50);
        font-weight:bold;
        opacity: 70%;
      }

  </style>
</head>
<body>
    <header class="header-container">

        <div class="logo">
          <a href="#">X Insurance</a>
        </div> 
        <div class="navbar"> 
          <a href="homePage.php">Home</a>
          <a href="aboutUs.php">About Us</a>
          <a href="packages.php">Packages</a>
          <a href="contactUs.php">Contact</a>
          <a href="agentPotal.php">My Profile</a>
        </div>

    </header>
    <center>
        <h1>Agent Portal</h1>

    
        <form method="post">
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="text" name="email" id="email" placeholder="Email">
            <input type="submit" id="addButton" name="addButton" value="Add Agent">
            <input type="submit" name="showAgent" value="showAgent"><br><br>
            Enter Email and Name : <input type="email" name="agentEmail" placeholder="Email">
            <input type="text" name="agentName" placeholder="Name">
            
            <input type="submit" name="updateAgent" value="Update Agent Name">
            <br><br>
            <h3 style="color:red">Delete Agent</h3>
            Enter Email : <input type="email" name="mail" placeholder="Email">
            <input type="submit" name="deleteAgent" value="Delete Agent">
            <br><br>
            <div id="agentTable"></div>

            <?php
          
              // Create a connection to the database
              include "php/connection.php";

              if(isset($_POST['showAgent'])){
                  $sql2 = "SELECT * FROM agent";
                  $result = $conn->query($sql2);
                  if($result->num_rows > 0){
                  echo "<div id='agentTable'>";
                  echo "<table border='1px'>";
                  echo "<tr><th>Agent Name</th><th>Agent Email</th></tr>";
                  while($row = $result->fetch_assoc()){
                      $agentName = $row['name'];
                      $agentEmail = $row['email'];
                      echo "<tr><td>$agentName</td><td>$agentEmail</td></tr>";
                  }
                  echo "</table>";
                  echo "</div>";
                  }
            }
            ?>
        </form>
    </center>

    <footer>

        <section class="footer-top">
         <div class="news-container">
          <h3>Newsletter</h3>
          <p>Lorem ipsum dolor sit amet, consectetur
          adipiscing elit. Proin nisi</p>
          <input type="email" placeholder="Your Email">
         </div>
         <div class="contact-container">
          <h3>Contact Us</h3>
          <small>+94 77 117 3677</small><br>
          <small>info@xinsurance.com</small><br>
          <small>Queen Towers, Colombo</small><br>
          <small>Sri Lanka</small>
         </div>
        </section>
        <hr class="footer-breaker">
        <div class="footer-bottom">
          <a href="#" class="footer-logo">X Insurance</a>
          <div class="footer-menu">
            <a href="#">Terms of Services</a>
            <a href="#">Privacy policy</a>
          </div>
        </div>

    </footer>
    <!-- <script src="js/agentPotal.js"></script> -->
</body>
</html>