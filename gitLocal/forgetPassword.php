<?php

    include "php/connection.php";

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pw = $_POST['pw'];
        $cPw = $_POST['cPw'];
        
        $sql1 = "SELECT * FROM user;";
        $sql2 = "UPDATE user SET password='$pw' WHERE email='$email'";
        
        $result1 = $conn->query($sql1);

        if($result1->num_rows > 0){
            $state = 0;
            while($row = $result1->fetch_assoc()){
                if($email == $row['email']){
                    if($pw == $cPw){
                        if($conn->query($sql2) === TRUE){
                            echo "<script>window.alert('Password Updated!');</script>";
                            $state = 1;
                            die("<script>window.location.href='signIn.php'</script>");
                            break;
                        }
                    }else{
                        echo "<script>window.alert('Password Not Matching!');</script>";
                        die("<script>window.location.href='forgetPassword.php'</script>");
                    }
    
                }else{
                    $state = 0;
                }
            }
            if($state == 0){
                die("<script>window.location.href='forgetPassword.php'</script>");
            }
        }else{
            echo "0 results";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>X Insurance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgetPassword.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,700;1,400&family=Rubik&display=swap" rel="stylesheet">
    <link type="image/x-icon" rel="icon" href="Assets/favicon.png">
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
            margin-left: 70px;
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
          <a href="aboutUs.html">About Us</a>
          <a href="packages.html">Packages</a>
          <a href="contactUs.html">Contact</a>
          <a href="myProfile.html">My Profile</a>
        </div>
      </header>

    <div class="div1">
        <h1>Reset your password</h1>
    </div>
    <center>
    <div class="reset">    
        <div>
            <h3 class="h3">Please login to continue</h3>
            <p class="para1">Please enter your email address or username</p><br><br>
            
            <div class="formDiv">
                <form class="form" method="post">
                    <label for="email" class="label">Email or Username: <br><br></label>
                    <input type="email" class="email" id="email" name="email">

                    <br><br>

                    <div class="sendOtp">
                        <button type="button" onclick="" class="btn1">Send OTP</button>
                    </div>

                    <br><br>
                    
                    <label for="otp" class="label">Enter OTP: <br><br></label>
                    <input type="text" class="otp" id="otp">

                    <br><br>
                    
                    <div class="div2">
                        <input type="checkbox" class="btn2" id="btn2">
                        &nbsp; &nbsp;I'm not a Robot &nbsp; <img src="Assets/robotLogo.png" style="width:30px ; height:30px;">
                    </div>

                    <br><br>

                    <div class="div3">
                        <form method="post">
                            <h3 id="para2"></h3>
                            <input type="password" name="pw" class="pw"> <br>
                            <h3 id="para3"></h3>
                            <input type="password" name="cPw" class="pw"> <br><br>
                            <a href="signIn.php"><input type="submit"  name="submit" value="Done" class="submit"
                            id="submit"></a>
                            
                        </form>
                    </div>

                </form>
            </div>

        </div>
    </div>
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


    <script src="js/forgetPassword.js">

    </script>
</body>
</html>