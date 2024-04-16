<?php
require 'connection.php';
include 'header.php';

session_start();
if (isset($_POST['email'])){
  
  $email = $_POST['email'];
  $pass = $_POST['password'];

  // Escape input to prevent SQL injection
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);

  // Check if the email exists in the database
  $emailCheckQuery = "SELECT * FROM user WHERE email='$email'";
  $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

  if (mysqli_num_rows($emailCheckResult) == 0) {
      // Email not found in the database
      echo "<script>alert('Email not registered. Please register first.');
      window.location='register.php'</script>";
  } else {
      // Email found, proceed with password validation
      $row = mysqli_fetch_assoc($emailCheckResult);

      if ($row['password'] != $pass) {
          // Incorrect password
          echo "<script>alert('Incorrect email or password.');
          window.location='login.php'</script>";
      } else {
          // Password is correct, check if user is an admin
          if ($row['is_admin'] == 1) {
              // User is an admin, set session
              $_SESSION['email'] = $row['email'];
              // Redirect to admin page
              header("Location: admin_index.php");
              exit();
          } else {
              // User is not an admin, set session and redirect to index page
              $_SESSION['email'] = $row['email'];
              header("Location: index2.php");
              exit();
          }
      }
  }
}
?>
