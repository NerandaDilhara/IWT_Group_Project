<?php

include 'connect.php';

if(isset($_POST['submit'])){

  // $u_message=$_POST['message'];

  // $sql = "update contact_us set  message='$u_message' where userID='$u_ID'";

  // if( $con->query($sql)===TRUE){
  //   echo "Data updated successfully";
  // }else{
  //   die($con->connect_error);
  // }

  $result=mysqli_query($con,$sql);
  if($result){
    echo "Data updated successfully";
    //header('location:displaymessage.php');
  }else{
    die(mysqli_error($con));
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contactus.css">
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
          <a href="myProfile.php">My Profile</a>
        </div>

    </header>

    <main>
      
      <div class="main">
        <div class="heading">
          <h1>Contact Us</h1>
        </div>
  
        <div class="heading">
          <h4>Lorem Ipsum dolor sit amet, consectetur adipiscing elit.<br>
          Phasellus nulla libero, luctus eu lacinia non.</h4>
  
        <div class = "SM">
          <h2> Send Message </h2>
  
        <div class = "SM">
          Phasellus nulla libero, luctus eu lacinia non.</h4>
        
      </div>
      <br><br><br>
      <form>
        
        <div class="formBox2">
          
          <div class="row100">
            <div class="inputBox">
              <textarea placeholder="Message" name="message" value=echo $message;> </textarea>
            </div>
          </div>
          <br><br>

          <div class="row100">
            <a herf="displaymessage.php?"><button type="submit" class= "btn
            btn-primary" name="submit" >Send Updated Message</button>
            </div>
          </div>
        </div>

      </form>
    
      
      




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
</body>
</html>


