<?php 
  require_once "config.php";
  $loginURL = $gClient->createAuthUrl();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Css/BG.css">
  <link rel="stylesheet" href="CSS/navbar.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login with google</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
<body background="image/BG.png">

  
 

  <div class="p-3 mb-2 bg-success text-black"></div>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="image/LOGOxx.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">

					<form action = "login2.php" method="POST">
					<div class="input-group mb-2">
						
						<div class="input-group-append">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div>
					<input type="Text" name = "uname" class="form-control input_pass"  placeholder="USERNAME">
					</div>
						<div class="input-group mb-3">
						
							<input type="password" name = "password" class="form-control input_user" placeholder="PASSWORD">
						</div>
						
						<a style = "float: right"href="Setnewpass.php">ลืมรหัสผ่าน</a>
						</div>
						
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit"  class="btn btn-success" value="Login">
					&nbsp&nbsp
					<button type="button" onclick = "window.location ='Register.php'">Register</button>
					&nbsp&nbsp
					 <!-- <button type="button" onclick = "window.location = '<?php // echo $loginURL ; ?>'" class="btn btn-danger">Google-Login</button -->
				   </div>
				   <br><br>
				   <center><b style="color: red;font-size: 30px;"><?php if(!isset($_GET['error'])){ }elseif(isset($_GET['error'])){ echo "ชื่อผู้ใช้หรือรหัสผ่านไม่ตรงกับข้อมูลที่มีอยู่ในระบบ";} ?></b></center>
					</form>
				
				</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>