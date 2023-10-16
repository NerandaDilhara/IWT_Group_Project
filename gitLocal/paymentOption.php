<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/paymentOption.css">
    
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
      <div class="container">

        <form action="./php/paymentsql.php" method="post">

            <div class="row">
    
              <div class="col">
                <h2 class="title"><center>Select Your Payment Cycle</center></h2>
  
  
                <div class="inputBox">
                  <span>Full Name :</span>
                  <input type="text" name="fname" placeholder="Chalani Perera" required> <br><br><br>
                </div>
  
                <div class="inputBox">
                  <span>Email :</span>
                  <input type="email" name="email"  placeholder="example@example.com" required> <br><br><br>
                </div>
  
                <div class="inputBox">
                  <span>Address :</span>
                  <input type="text" name="p_address" placeholder="room - street - locality" required> <br><br><br>
                </div>
  
                <div class="inputBox">
                  <span>City :</span>
                  <input type="text" name="p_city" placeholder="Colombo" required> <br><br><br>
                </div>
  
                <div class="inputBox">
                  <span>State :</span>
                  <input type="text" name="p_state" placeholder="Sri Lanka" required> <br><br><br>
                </div>
  
                <div class="inputBox">
                  <span>Zip :<Code></Code></span>
                  <input type="text" name="p_zip" placeholder="123 456" required> <br><br><br>
                </div>
  
  

              </div>
            </div>

            <div class="col">
              <h1><center>Payment<center></h1> <br><br>

              <div class="inputBox">
                <span>Accepted Cards:</span> <br><br><br>
                <img src="Assets/accepted-credit-cards-horizontal.png" width="200px" height="50px" alt="" required> <br><br><br>
              </div>


              <div class="inputBox">
                <span> Name on Card:</span>
                <input type="text" name="namecard" placeholder=" mrs. Chalani Perera" required> <br><br><br>
              </div>

              <div class="inputBox">
                <span>Credit Card Number :</span>
                <input type="number" name="no_card" placeholder="1111-2222-3333-4444" required> <br><br><br>
              </div>

              <div class="inputBox">
                <span>Exp Month :</span>
                <input type="text" name="ex_month" placeholder="01" required> <br><br><br>
              </div>

              <div class="inputBox">
                <span>Exp Year :</span>
                <input type="number" name="ex_year" placeholder="2025" required> <br><br><br>
              </div>

              <div class="inputBox">
                <span>CVV : <Code></Code></span>
                <input type="text" name="cvv" placeholder="1234" required> <br><br><br>
              </div>

            </div>

            <button type="submit" name="submit" value="send data" >submit</button>

        </form>
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

</body>
</html>