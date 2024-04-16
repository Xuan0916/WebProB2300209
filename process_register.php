<?php
require 'connection.php';

if (isset($_POST['signupValidation'])){

  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $userphone = $_POST['userphone'];
  $gender = $_POST['gender'];

  //fetch user info from database to check id
  $check = mysqli_query($conn, "SELECT * FROM `user` WHERE email='$email'");


  //username password validation & add record
  if (mysqli_num_rows($check) >0){
    echo "<script>alert('Sorry, this email has already been taken. Please enter a new one');
    window.location = 'register.php'</script>";
  }
  else{
    $register = "INSERT INTO user (email,userPhone,password,username,Gender) VALUES ('$email','$userphone','$password','$name','$gender')";

    //sql
    $result = mysqli_query($conn, $register);

    //message pop up
    if ($result){
      echo "<script>alert('User registration successful! Please login.');
      window.location = 'login.php'</script>";
    }
    else{
      echo "<script>alert('Sorry, your registration attempt was unsuccessful.');
      window.location = 'register.php'</script>";
    }
  }
}
?>