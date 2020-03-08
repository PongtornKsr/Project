<!DOCTYPE html>
<?php SESSION_START(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/RegistCSS.css">
	<link rel="stylesheet" href="Css/BG.css">
    <title>Document</title>
</head>
<body background="image/BG.png">

<center>
	    <img src="image/LOGOxx.png" class="brand_logo" alt="Logo">
</center>
<form action="Setnewpass_backend.php" method="post">
  <h2>Set new Password</h2>
    
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input id="Email" name="email" type="text" required>
        </p>
        <p>
			<label  class="floatLabel">Username</label>
			<input  name="uname" type="text" required>
		</p>
		<p>
			<label for="password" class="floatLabel">New Password</label>
			<input id="password" onkeyup = "passcount()" name="password" type="password" required>
			<span id = "hint1">Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm New Password</label>
			<input id="confirm_password" onkeyup= "passcheck()" name="confirm_password" type="password" required>
			<span id = "hint2">Your passwords do not match</span>
        </p>
        <b style="text-align: center;font-size: 20px;color: red;"><?php if(!isset($_GET['error'])){ }elseif(isset($_GET['error'])){ echo "อีเมลหรือชื่อผู้ใช้ไม่ตรงกับข้อมูลที่มีอยู่ในระบบ";}  ?></b>      
		<p>
			<input type="submit" value="Set new Password" id="submit">
		</p>
	</form>
</body>
</html>
<script type="text/javascript" src="javascript/Regist.js"></script>