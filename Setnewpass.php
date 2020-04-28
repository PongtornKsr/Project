<!DOCTYPE html>
<?php SESSION_START(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/RegistCSS.css"> <!--ใช้ CSS เดียวกับ หน้า register -->
	<link rel="stylesheet" href="Css/BG.css">
    <title>Document</title>
</head>
<body background="image/BG.png">

<center>
	    <img src="image/LOGOxx.png" class="brand_logo" alt="Logo">
</center>
<form id = "regist_form">
<h1>Set new password</h1>
		<div id="error_msg"></div>
		<div>
			<input type="text" name="email" placeholder="Email" id="email"><br>
			<span></span>
		</div>
		<div>
			<input type="text" name="username" placeholder="Username" id="username"><br>
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
			<button type="button"  id="reg_btn">Set new password</button>
		</div>
	</form>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="javascript/recoverypass.js"></script>