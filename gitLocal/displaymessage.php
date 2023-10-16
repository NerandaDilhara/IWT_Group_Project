<?php
include 'connect.php';
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



  
body{
    background-image: url("../Assets/image2.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}


*{
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
}

main{
    text-align: center;
    padding: 40px;
}

.formBox2{
    background-color: rgb(162, 164, 164);
    width: 80%;
    border: 0.3px solid black;
    border-radius: 30px;
    padding: 60px;
    margin-left: 80px;
}

input{
    background-color: rgb(243, 234, 200);
    width: 60%;
    height: 40px;
    border: 1px solid black;
    border-radius: 7px;
    text-align: center;
    font-size: 15px;
    color: black;
}

input::placeholder{
    text-align: center;
}

textarea{
    width: 60%;
    height: 300px;
    border: 1px solid black;
    border-radius: 20px;
    background-color: rgb(243, 234, 200);
    text-align: center;

}

textarea::placeholder{
    text-align: center;
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


    <div class="dis">
            <button class="add"><a href="contactUs.php">form</a>
            </button> <br>
            <div class="inputBox">
              <textarea placeholder="Message" name="message"> </textarea>
            </div>

                  <?php

                  //read message from database table
                  $sql = "SELECT * FROM contact_us";
                  $result = mysqli_query($con,$sql);

                  if($result){
                   while ($textarea= mysqli_fetch_assoc($result)){
                    
                    
                    $u_message = $textarea['message'];
                              echo ' 
                              <textarea > '.$u_message.' </textarea >
                             
                              <div class="button">
                                <div class= "btn1">
                                   <a href="update.php?updateid='.$u_message.'"> Update </button></a>
                                </div>
                                <div class = "btn2">
                                 <a href="delete.php?deleteid='.$u_message.'"> Delete </button></a>
                                </div>
                              </div>

                              </div>';
                   }   
                  }

                  ?>

                  
            
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
</body>
</html>
