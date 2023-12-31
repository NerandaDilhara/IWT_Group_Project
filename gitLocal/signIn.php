<?php

    include "php/connection.php";

    if(isset($_POST['login'])){
        $email = $_POST['signInEmail'];
        $pass = $_POST['password'];

        $sql = "SELECT email, password FROM user WHERE email='$email' AND password='$pass'";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $state = 0;
            while($row = $result->fetch_assoc()){
                if($row['email'] == $email){
                    if($row['password'] == $pass){
                        $state = 1;
                        header("Location:homePage.php");
                        // die("<script>window.location.href='homePage.php'</script>"); 
                    }else{
                        $state = 0;
                    }
                }else{
                    $state = 0;
                }
            }
            if(!$state){
                echo "<script>
                window.onload = function(){ 
                    alert('User not found. Try again!'); 
                }
                </script>";
            }
            } else {
                echo "<script>
                    window.onload = function(){ 
                        alert('User not found. Try again!'); 
                    }
                </script>";
            }
            }
                
    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>X Insurance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signIn.css">
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
          margin-left: 100px;
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
        .deleteAccount{
            text-decoration: none;
            text-align: center;
            color: red;
            font-size: 22px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
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
          <a href="myProfile.php">My Profile</a>
        </div>
      </header>
  
    <br><br>

    <div class="div1">
        <h1>Sign In</h1>
    </div>
    <center>
    <div class="signIn">    
        <div>
            <h3 class="h3">Welcome Back</h3><br>
            <p class="para1">Please enter your details!</p><br><br>

            <form class="signInForm" method="POST">
                <a href="homePage.php">
                    <button type="button"  class="btn" id = 'btn1' onclick="popUpBox()"><img src="Assets/google.png" class="logoIcon">&nbsp; &nbsp;  Login in with Google</button>
                </a>
                <br><br>
                <a href="homePage.php">
                    <button type="button" class="btn" id='btn2' onclick="popUpBox()"><img src="Assets/apple.png" class="logoIcon">&nbsp; &nbsp;  Login in with Apple</button>
                </a>
                              
                <br><br><br>

                <hr class="seperator"> 
                <p class="para1">or</p> 
                <hr class="seperator">
 
                <div class="div2">
                    <label for="email" class="label">E-mail: </label><br><br>
                    <input type="email" name="signInEmail" id="email" placeholder="Enter Email" class="textBox">

                    <br><br>
                    
                    <label for="password" class="label">Password: </label><br><br>
                    <input type="password" name="password" placeholder="Enter Password" id="password" class="textBox">
                </div>
                
                <input type="submit" value="Login" class="login" name="login">
               
                <div class="flex-container-div4">
                    <div>Did you forget your password ?</div>
                    <div><a href="forgetPassword.php">Reset Password</a></div>
                </div>
                <div>
                    <a href="signUp.php" class="accCreLink">Create Account</a>
                </div>
                <br>
                <div>
                    <a href="deleteAccount.php" class="deleteAccount">Delete Your Account</a>
                </div>

                

            </form>
        </div>
    </div>

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

    <script src="js/signIn.js">

    </script>

</body>
</html>