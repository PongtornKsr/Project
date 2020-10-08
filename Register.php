<?php SESSION_START(); ?>
<!DOCTYPE html>
<?php include('Register_backend.php'); ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>

	<link rel="stylesheet" href="CSS/RegistCSS.css">
	<link rel="stylesheet" href="Css/BG.css">
	<link rel="stylesheet" href="CSS/navbar.css">
	<link rel="shortcut icon" href="img/computer.png">
</head>
<body>
<center>
	    <img src="image/LOGOxx.png" class="brand_logo" alt="Logo">
</center>
	<form id="regist_form">
	<title>CS_Asset</title>
		<div id="error_msg"></div>
		<div>
			<input type="text" name="fname" placeholder="firstname" id="fname">
		</div>
		<div>
			<input type="text" name="lname" placeholder="lname" id="lname">
		</div>
		<div>
			<input type="text" name="username" placeholder="Username" id="username"><br>
			<span></span>
		</div>
		<div>
			<input type="text" name="email" placeholder="Email" id="email"><br>
			<span></span>
		</div>
		<div>
			<input type="password" name="password" placeholder="Password" id="password"><br>
			<span></span>
		</div>
		<div>
			<input type="password" name="password2" placeholder="Confirm_Password" id="password2"><br>
			<span></span>
		</div>
		<div>
			<button type="button" name="register" id="reg_btn">Register</button>
		</div>
	</form>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="javascript/Regist.js"></script>
</body>
</html>