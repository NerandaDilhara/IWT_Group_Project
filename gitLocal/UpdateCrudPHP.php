<?php
    include('./configure.php');
?>
<?php

    $getid = $_GET['uid'];
    echo $getid;

    $update = "SELECT * FROM package_activation WHERE user_id = $getid";
    $resultdata = mysqli_query($con,$update);

    $i = mysqli_fetch_assoc($resultdata);
?>

<?php 

    if(isset($_POST['update'])){

        $newName = $_POST['name'];
        $newEmail = $_POST['email'];
        $newNo = $_POST['number'];

        $updateqry = "UPDATE package_activation SET name_ = '$newName', email = '$newEmail', mobile_number = '$newNo' WHERE user_id = $getid";
        mysqli_query($con,$updateqry);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/updateCrud.css">
    <title>Document</title>
</head>
<body>
    <header>
    <section class="nav-sec">
      <div id="logo-container">
        <h1><a href="#" class="logo">X Insurance</a></h1></div>
      <nav id="nav-menu">
        <ul class="nav-bar">
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Packages</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">My Profile</a></li>
        </ul>
      </nav>
    </section>
    </header>
    <h1 class=update-heading>Update Your Entered Data</h1>
    <form action="" method="post" class="update-form">
    <input type="text" value="<?php echo $i['name_']?>" name="name">
    <input type="text" value="<?php echo $i['email']?>" name="email">
    <input type="text" value="<?php echo $i['mobile_number']?>" name="number">

    <input type="submit" value="update" name="update" onclick="updated()">

    </form>

    <script>
        function updated(){
            alert('Data updated Successfully');
        }
    </script>


    <footer class="footer">
      <div class="footer__addr">
        <h1 class="footer__logo">X Insurance</h1>
            
        <h2>Contact</h2>
        
        <address>
          Queen Towers Colombo 07 Java Street<br>
              
          <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
        </address>
      </div>
      
      <ul class="footer__nav">
        <li class="nav__item">
          <h2 class="nav__title">Nav</h2>
    
          <ul class="nav__ul">
            <li>
              <a href="#">Home</a>
            </li>
    
            <li>
              <a href="#">About Us</a>
            </li>
                
            <li>
              <a href="#">Contact</a>
            </li>
          </ul>
        </li>
        
        <li class="nav__item nav__item--extra">
          <h2 class="nav__title">Packages</h2>
          
          <ul class="nav__ul nav__ul--extra">
            <li>
              <a href="#">Cooperative </a>
            </li>
            
            <li>
              <a href="#">Family</a>
            </li>
            
            <li>
              <a href="#">Abroad</a>
            </li>
            
            <li>
              <a href="#">Retirement</a>
            </li>
            <li>
              <a href="#">Individual</a>
            </li>
            
          </ul>
        </li>
        
        <li class="nav__item">
          <h2 class="nav__title">Legal</h2>
          
          <ul class="nav__ul">
            <li>
              <a href="#">Privacy Policy</a>
            </li>
            
            <li>
              <a href="#">Terms of Use</a>
            </li>
            
            <li>
              <a href="#">About Us</a>
            </li>
          </ul>
        </li>
      </ul>
      
      <div class="legal">
        <p> 2023 X Insurance. All rights reserved.</p>
        
        <div class="legal__links">
          
        </div>
      </div>
    </footer>
</body>
</html>