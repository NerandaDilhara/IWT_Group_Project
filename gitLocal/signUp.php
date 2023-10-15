<?php
  
  include "php/connection.php";

  if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    // Function to validate a password
    function validatePassword($password) {
      
        $minLength = 8;  
        $uppercase = preg_match('/[A-Z]/', $password); 
        $lowercase = preg_match('/[a-z]/', $password); 
        $number = preg_match('/[0-9]/', $password);     
        $specialChar = preg_match('/[^A-Za-z0-9]/', $password);  

        // Check if the password meets all criteria
        if (strlen($password) < $minLength) {
            return "Small length";
        } elseif (!$uppercase || !$lowercase || !$number || !$specialChar) {
            return "not matchs characters";
        }

        return "Password is valid.";
    }

    // Function to validate a phone number
    function validatePhoneNumber($phoneNumber) {
      // Remove any non-digit characters
      $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
  
      // Check if the phone number has the correct length
      if (strlen($phoneNumber) != 10) {
          return "Phone number must have 10 digits";
      }
      return "Phone number is valid";
    }

    $passwordStatus = validatePassword($pass1);
    $phoneStatus = validatePhoneNumber($phone);
    
    if($passwordStatus == "Small length"){
      echo "<script>alert('Password Should at least 8 characters')</script>";
    }elseif($passwordStatus == "not matchs characters"){
      echo "<script>alert('Not matches characters')</script>";
    }elseif($phoneStatus == "Phone number must have 10 digits"){
      echo "<script>alert('Phone number must have 10 digits')</script>";
    }else{
      if($pass1 == $pass2){
      
        $sql = "INSERT INTO `user` (fullname, address, phone, gender, dob, email, username, password) VALUES ('$fullname', '$address', '$phone', '$gender', '$dob', '$email', '$username', '$pass1')";
  
        if($conn->query($sql) == FALSE){
          echo "Error " . $sql . "<br>" . $conn->error;
        }else{
          echo "<script>alert('Success!');</script>";
          die("<script>window.location.href='signIn.php'</script>");
        }
      
      }else{
        echo "<script>alert('Different password !');</script>";
        die("<script>window.location.href='signUp.php'</script>");
      }  
    }
    
    $conn->close();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>X Insurance</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signUp.css">
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
          <a href="aboutUs.html">About Us</a>
          <a href="packages.html">Packages</a>
          <a href="contactUs.html">Contact</a>
          <a href="myProfile.html">My Profile</a>
        </div>
      </header>
  
    <br><br>

    <main>
        
      <div class="div1">

          <div class="signUp">
            <h1>Sign Up!</h1>
          </div>

          <div class="div2">
            <div class="div3">
              <a href="homePage.php" class="a">
                <img src="Assets/google.png" alt="" width="28px" height="28px">&nbsp;&nbsp;&nbsp;&nbsp;Use Google
              </a>
            </div>

            <div class="div4">
              <a href="homePage.php" class="a">
                <img src="Assets/apple.png" alt="" width="28px" height="28px">&nbsp;&nbsp;&nbsp;&nbsp;Use Apple
              </a>
            </div>

          </div>

          <div class="div5">
            <hr> OR <hr>
          </div>

          <div class="form">
            <form method="POST">

              <label for="fullname">Full Name: </label><br><br>
              <input type="text" name="fullname" id="fullname" placeholder="Fullname">
              <br><br>

              <label for="address">Address: </label><br><br>
              <input type="text" name="address" id="address" placeholder="Address">
              <br><br>

              <label for="phone">Phone: </label><br><br>
              <input type="text" name="phone" id="phone" placeholder="Phone Number">
              <br><br>

              <label for="gender">Gender : </label>&nbsp;&nbsp;
              Male <input type="radio" name="gender" id="gender" class="radio" value="male">
              Female <input type="radio" name="gender" id="gender" class="radio" value="female">
              <br><br>

              <label for="dob">Date of Birth: </label><br><br>
              <input type="date" name="dob" id="dob" placeholder="Date of Birth"><br><br>

              <label for="email">Email: </label> <br><br>
              <input type="email" name="email" id="email" placeholder="Your Email Address">
              <br><br>

              <label for="username">Username: </label> <br><br>
              <input type="text" name="username" id="username" placeholder="Your Username">
              <br><br>

              <label for="pass1">Password: </label> <br><br>
              <input type="password" name="pass1" id="pass1" placeholder="New Password">
              <br><br>

              <label for="pass2">Repeat Password: </label> <br><br>
              <input type="password" name="pass2" id="pass2" placeholder="Repeat New Password">
              <br><br><br>

              <input type="submit" name="submit" value="Sign Up" class="submit" id="submit">

            </form>
            <h5>By registering you agree to our Terms and Conditions
            </h5>
            <a href="signIn.php" class="a2"><h3>Sign In</h3></a>
            <br><br>
          </div>
      </div>
        
    </main>

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

    <script src="js/signUp.js">

    </script>
</body>
</html>