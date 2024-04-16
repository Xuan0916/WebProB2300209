<?php
require 'connection.php';

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $system_name; ?></title>
  <link rel="shortcut icon" href="sources/logoicon.png" type="image/png">
  <link rel="stylesheet" href="scrollbar.css">
  <link rel="stylesheet" href="index2.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>

  <?php include 'admin_header.php'; ?>


  <div class="index-container" id="H1">
    <div class="text-container">
      <div class="index-text">
        <h1 data-aos="fade-up"><strong>Welcome Back</strong></h1>
        <center>
          <hr data-aos="fade-up">
          <p data-aos="fade-up">Welcome to <?php echo $title ?>! This is an <?php echo $system_name ?>. This website guides you <?php echo $subject ?> that related to your surrounding environment. Raise your awareness and improve yourself through this website! Have fun!</p>
        </center>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill=" #fff0bb" fill-opacity="1" d="M0,96L80,128C160,160,320,224,480,229.3C640,235,800,181,960,181.3C1120,181,1280,235,1360,261.3L1440,288L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
      </svg>
    </div>
  </div>

  <div class="index-container" id="H2">
    <div class="index-title">
      <h1 data-aos="fade-up"><strong>about us</strong></h1>
    </div>
    <div class="about-container">
      <center>
        <p data-aos="fade-up">We have designed this website with the purpose of allowing people to monitor their carbon footprint.</p>
      </center>
    </div>
  </div>

  <div class="index-container" id="H3">
    <div class="index-title">
        <h1 data-aos="fade-up"><strong>dashboard</strong></h1>
    </div>
    <div class="fea-container" data-aos="fade-up">

        <div class="fea-des" data-aos="fade-up">
            <div class="fea-icon">
                <i class="fas fa-laptop"></i>
                
                    <a href="admin_userinfo.php"><h2>User info</h2></a>
                
                <p>Check users' information.</p>
            </div>
        </div>
        <div class="fea-des" data-aos="fade-up">
            <div class="fea-icon">
                <i class="fas fa-calendar"></i>
                
                    <a href="admin_event.php"><h2>Event calendar</h2></a>
                <p>Schedule or plan your eco-frendly event.</p>
            </div>
        </div>
    </div>
</div>


  <div class="index-content" id="H4"><?php include 'footer.php' ?></div>

  <script>
    AOS.init();
  </script>
</body>

</html>