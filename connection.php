<?php
//connection to database
$host = "localhost";
$user = "root";
$password = "";
$database = "myweb";

$conn = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()){
  echo "Connection to database failed";
  exit();
}

//variables
$subject = "Carbon Footprint";
$title = "Carbon Footprint Calculator";
$system_name = "Online Carbon Footprint Monitoring System";
$footer = "Carbon Footprint Monitoring System.";
$logo = "sources/logoicon.png";
?>