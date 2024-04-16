<?php
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS for styling the navigation */
        nav {
            background-color: #333;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.055);
        }

        nav .left-section {
            display: flex;
            align-items: center;
        }

        nav a {
            float: right;
            text-decoration: none;
            color: black;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 2px;
            text-align: center;
            padding: 0px 16px;
            height: 100%;
            line-height: 70px;
            vertical-align: middle;
            transition: .5s;
        }

        nav img {
            height: 70px;
            width: 80px; 
        }

        nav a:hover {
            transform: scale(1.2);
            text-decoration: underline;
            text-decoration-color: #ff3198;
            text-underline-position: under;
            text-decoration-thickness: 3px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="left-section">
            <img src="logo.webp" alt="Logo">
        </div>
        <a href="index2.php#H1">Home</a>
    </nav>
</body>
</html>

