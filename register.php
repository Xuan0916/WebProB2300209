<?php
require 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $system_name; ?></title>
  <link rel="shortcut icon" href="sources/logoicon.png" type="image/png">
  <link rel="stylesheet" href="scrollbar.css">
  <link rel="stylesheet" href="register.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
  <?php include 'header.php'; ?>
  <section>
    <div class="container">
      <div class="user signupBx">
        <div class="formBx" data-aos="fade-right">
          <form method="post" action="process_register.php">
            <h2>Create an Account</h2>
            <br>

            <div class="idpw">
              <div class="conid">
                <p><i class="fas fa-user"></i>Email</p>
                <input type="email" class="con-idpw" name="email" id="email" oninvalid="setCustomValidity('Please enter a valid email.')" oninput="this.setCustomValidity('')" required autofocus>
                <br>
              </div>

              <div class="conpw">
                <p><i class="fas fa-key"></i>Password</p>
                <input type="password" class="con-idpw" name="password" id="password" placeholder="4 digit only" pattern="[0-9]{4}" oninvalid="this.setCustomValidity('User password must only contain 4 digit number.')" oninput="this.setCustomValidity('')" required autofocus>
                <br>
              </div>
            </div>

            <p><i class="fas fa-id-badge"></i>Name</p>
            <input type="text" name="name" id="username" placeholder="Enter Your Name" pattern="[A-Za-z]+(?: [A-Za-z]+)*" 
                  oninvalid="this.setCustomValidity('Name must only contain alphabets with optional spaces between words.')" 
                  oninput="this.setCustomValidity('')" required autofocus>
            <br>


            <p><i class="fas fa-phone"></i>Phone Number</p>
            <input type="text" name="userphone" id="userphone" placeholder="without '-'" pattern="[0-9]{10,11}" oninvalid="this.setCustomValidity('Phone number must only contain 10-11 digit number.')" oninput="this.setCustomValidity('')" required autofocus>
            <br>

            <p><i class="fas fa-venus-mars"></i>Gender</p>

            <div class="gender">
              <label for="gender-male"><input id="gender-male" name="gender" type="radio" value="male" />male</label>
              <label for="gender-female"><input id="gender-female" name="gender" type="radio" value="female" />female</label>
            </div>
            <br>

            <div class="signup-button">
              <div class="signup-item signup-reset"><input type="reset" value="Reset"></div>
              <div class="signup-item signup-submit"><input type="submit" value="Signup" name="signupValidation"></div>
            </div>

            <p class="signup">already have an account? <a href="login.php">Login</a></p>
          </form>
        </div>

        <div class="imgBx" data-aos="fade-left">
          <div class="logo">
            <img src="logo.webp" alt="logo">
          </div>
          <br>
          <br>
          <div class="intro">
            <h2>Welcome</h2>
          </div>
          <div class="introDes">
            <p>Hi there. Welcome to our website! Be a part of us by creating an account.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'footer.php'; ?>
  <script src="register.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>