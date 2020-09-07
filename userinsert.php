<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Css/BG.css">
	<link rel="stylesheet" href="CSS/navbar.css">
	<link rel="stylesheet" href="CSS/formstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		   <title>CS_Asset</title>
</head>
<body>
	

<?php require 'nav.php'; ?>
<center>		
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/LOGOxx.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
<br>
<br>
    <br>
	<div class = "whitebox" style = "width: 500px;height:auto">
    <form action="usermanage.php?function=2" method = "POST" Align = "center">
    <input type="hidden" value = "2" name = "function">
      
		<div class="form-group">
	<label>First Name</label>
    <input type="text" class="form-control" name = "fname" id="fname"  placeholder="first name">
	<div id = "name_alert" tyle = "color:red" ></div>
		</div>
	
	<div class="form-group">
    <label>Familyname</label>
    <input type="text" class="form-control" name = "lname" id="lname"  placeholder="Familyname">
	<div id = "lname_alert" tyle = "color:red"></div>
		</div>
			
		<div class="form-group">
	<label>Email</label>
    <input type="email" class="form-control"  name = "email" id="email"  placeholder="Enter email">
	<div id = "email_alert" style = "color:red"></div>
	</div>
	
	<div class="form-group">
	<label>Username</label>
    <input type="text" class="form-control"  name = "username" id="username"  placeholder="Enter email">
	<div id = "username_alert" style = "color:red"></div>
	</div>
	
	<div class="form-group">
	<label>Password</label>
    <input type="password" class="form-control"  name = "pass" id="pass"  placeholder="Enter email">
	<div id = "pass_alert" style = "color:red"></div>
	</div>
	
  <label>Status</label>
  <select class="form-control form-control-sm" name = "Type">
  <option value="2">GUEST</option>
<option value="1">ADMIN</option>   
 
  </select>
  <br><br>
					<div class="d-flex justify-content-center mt-3 login_container">
					
				 	<button type="submit" id = "accsubmit" class="btn btn-outline-success">Accept</button>&nbsp&nbsp
				    <!-- <a href="indexadmin.php"><button type="submit" class="btn btn-outline-danger">Back</button></a> -->
				   </div>
				   
				   
					</form>
					</div>
				</div>
				</div>
			</div>
		</div>
	</center>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src ="javascript/user_check.js"></script>
  </body>
</html>