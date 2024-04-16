<?php
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $system_name;?></title>
  <link rel="stylesheet" href="header2.css">
  <link rel="stylesheet" href="scrollbar.css">
</head>

<body>

  <div class="index-wrapper">

    <header>
      <div class="header">
        <img src="logo.webp" width=80 height=70px id="logo">
        <a href="logout.php"><button>Log Out</button></a>
        <a href="admin_feedback.php">Feedback</a>
        <a href="admin_profile.php">Profile</a>
        <a href="admin_index.php#H4">Social Media</a>
        <a href="admin_index.php#H3">Dashboard</a>
        <a href="admin_index.php#H2">About</a>
        <a href="admin_index.php#H1">Home</a>
      </div>
    </header>
  
  </div>
</body>

</html>