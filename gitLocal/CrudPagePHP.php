<?php
 
 include ('./configure.php');


  if(isset($_POST['validate'])){

    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    $sql = "SELECT * FROM registered_user WHERE user_name='$enteredUsername' AND password='$enteredPassword'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) 
    {
      echo "<script>alert('Login Credentials Validated Successfully')</script>";
    } 
    else
     {
      echo "<script>alert('Entered User name or Password is wrong')</script>";
     }

  }

  if(isset($_POST['activate']))
  {

    $fullName=$_POST['full-name'];
    $NIC=$_POST['nicNumber'];
    $DOB=$_POST['DOB'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $contact=$_POST['mobileNumber'];
    $installament=$_POST['Installament'];


    $sql= "INSERT INTO package_activation (name_,DOB,gender,email,
    mobile_number,address_,NIC,type_)
    VALUES ('$fullName','$DOB','$gender','$email','$contact','$address','$NIC','$installament')";

    $result=mysqli_query($con,$sql);

    if($result)
    {
      echo "<script>alert('Package Activated successfully')</script>";
      
    }
    else
    {
      die(mysqli_error($con));
    }

  }

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,viewport-fit:cover">
  <link rel="stylesheet" href="../CSS/packageCrud.css">
  <title>X Insurance</title>
  <script src="./JavaScript/PackageCrud.js" defer></script>
  <script>
    function buttonSelect(buttonType) 
  {
      if (buttonType === 'button1') 
      {
        var value = document.getElementById("packageHeader");
        value.innerHTML = "PackageOne";
      } 

      else if (buttonType == 'button2') 
      {
        var value2=document.getElementById("packageHeader");
        value2.innerHTML="PackageTwo";
      }

      else if( buttonType =='button3')
      {
        alert("Pakackage03");
        document.getElementById("packageHeader").innerHTML="PackageThree";

      }
      else if(buttonType =='button4')
      {
        var value4=document.getElementById("packageHeader");
        value4.innerHTML="PackageFour";
      }
      
  }
  </script>
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

  <script>
    document.addEventListener('DOMContentLoaded', function ()
    {
     const images = document.querySelectorAll('.main-banner img');
     let currentIndex = 0;

     function showImage(index) 
     {
     images.forEach((image, i) => 
     {
       image.style.display = i === index ? 'block' : 'none';
     });
     }

     function nextImage() 
     {
       currentIndex = (currentIndex + 1) % images.length;
       showImage(currentIndex);
     }

     setInterval(nextImage, 4000);
    });
  </script>
  <h1 id="packageHeader">Package Activation</h1>
  <div class="main-banner">
    <img src="/Assets/act01.jpg">
    <img src="/Assets/act02.jpg">
    <img src="/Assets/act03.jpg">
    <img src="/Assets/banner1.jpg">
  </div>

  <div class="package-details">
    <div class="form-wrapper">
      <form class="details-form" method="post">
        <fieldset>
          <legend>Provide Your Credentials</legend>
          
          <input type="text" name="username" placeholder="Username"  autocomplete="off" maxlength="12">
          <input type="password" name="password" placeholder="Password"  autocomplete="off" maxlength="12">
          <input type="submit" value="Validate" class="submit-button" name="validate">

        </fieldset>
      </form>
    </div>
  </div>
  

  <h1 class="insurance-form">Insurance Package Activation Form</h1>

  <div class="activation-form-container">
    <form class="activation-form" method="post" onsubmit="return-false" id="activationForm">
      
      <div class="input-types-container">
        
        <label for="full-name">Beneficiary Name: </label><br> 
        <input type="text" name="full-name" placeholder="Fill with your full name" autocomplete="off"><br>
        <label for="nicNumber">Beneficiary NIC: </label><br>
        <input type="text" name="nicNumber" placeholder="Provide Your National Identification Number" autocomplete="off"><br>
        <label for="DOB">Date of Birth: </label><br>
        <input type="date" name="DOB" placeholder="dd/mm/yy" autocomplete="off"><br>
        <label for="gender">Gender:</label><br>
        <select name="gender">

        <option value="male">Male</option>
        <option value="female">Female</option>

        </select><br>
        <label for="address">Address: </label><br>
        <input type="text" placeholder="address" name="address">

        <label for="email">Email: </label><br>
        <input type="email" placeholder="Email Address" name="email" autocomplete="off"><br>
        <label for="mobileNumber">Contact Number: </label><br>
        <input type="text" name="mobileNumber" placeholder="Contact Number" autocomplete="off"><br>
        <label for="payementType">Installament Type: </label>
        <select name="Installament" id="#" >
          <option value="monthly">Monthly</option>
          <option value="yearly">Yearly</option>
        </select>
        <button type="submit" class="form-button1" name="activate" id="activation" onclick="generateContactCard()">Activate</button>
        <button type="reset" class="form-button2">Clear Form</button>
        
      </div>
      
    </form>
  </div>
  <?php
    $sql="SELECT * FROM package_activation";
    $resultdata = mysqli_query($con,$sql);
    $i = mysqli_fetch_assoc($resultdata);
  ?>
  <h1 id="activatedHeader">Activated Packages</h1>

  <div id="activationCard">
    <h3><?php echo $i['name_']; ?></h3>
    <h4><?php echo $i['email']; ?></h4>
    <p><?php echo $i['mobile_number']; ?></p>
    <a href="update.php?uid=<?php echo $i['user_id']?>">Update</a>
  </div>

  <script>
    function generateContactCard(){
      var contactCard = document.getElementById('activationCard');
      contactCard.style.display = 'flex';

      var activate=document.getElementById('activatedPackages');
      activate.style.display='block';

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
          <h2 class="nav__title">Media</h2>
    
          <ul class="nav__ul">
            <li>
              <a href="#">Online</a>
            </li>
    
            <li>
              <a href="#">Print</a>
            </li>
                
            <li>
              <a href="#">Alternative Ads</a>
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