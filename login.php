<?php
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $system_name; ?></title>
<link rel="shortcut icon" href="sources/logoicon.png" type="image/png">
<link rel="stylesheet" href="scrollbar.css">
<link rel="stylesheet" href="login.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
	<?php include 'header.php'; ?>
	<section>
		<div class="container">
			<div class="user signinBx">
				<div class="imgBx" data-aos="fade-right">
					<div class="logo">
						<img src="logo.webp" alt="logo">
					</div>
					<br>
					<br>
					<div class="intro">
						<h2>Welcome back</h2>
					</div>
					<div class="introDes">
						<p>Welcome back to our website. Hope you enjoy it. </p>
					</div>
				</div>

				<div class="formBx" data-aos="fade-left">
					<form action="processlogin.php" method="post" onsubmit="return validateEmail()">
						<h2>Login</h2>
						<br>

						<p><i class="fas fa-user"></i>Email</p>
						<input id="email" type="email" name="email" placeholder="Email" oninvalid="setCustomValidity('Please enter a valid email.')" oninput="this.setCustomValidity('')" required autofocus>

						<p><i class="fas fa-key"></i>Password</p>
						<input type="password" id="password" name="password" placeholder="Password" size="10">

						<input type="submit" value="Login">
						<p class="signup">don't have an account? <a href="register.php">Signup</a></p>
					</form>
				</div>
			</div>
		</div>

	</section>
	<?php include 'footer.php'; ?>
	<script src="login.js"></script>

	<script>
		AOS.init();
	</script>
</body>

</html>