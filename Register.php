<!DOCTYPE html>
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

<form action="Regist_backend.php" method="post">
  <h2>Sign Up</h2>
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input id="Email" name="email" type="text" required>
        </p>
        <p>
			<label  class="floatLabel">Firstname</label>
			<input  name="fname" type="text" required>
        </p>
        <p>
			<label  class="floatLabel">Lastname</label>
			<input  name="lname" type="text" required>
        </p>
        <p>
			<label  class="floatLabel">Username</label>
			<input  name="uname" type="text" required>
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" onkeyup = "passcount()" name="password" type="password" required>
			<span id = "hint1">Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input id="confirm_password" onkeyup= "passcheck()" name="confirm_password" type="password" required>
			<span id = "hint2">Your passwords do not match</span>
		</p>
		<p>
			<input type="submit" value="Create new Account" id="submit">
		</p>
	</form>
</body>
</html>
<script>

</script>
<script type="text/javascript" src="javascript/Regist.js"></script>
