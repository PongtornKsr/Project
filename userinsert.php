<!DOCTYPE html>
<html lang="en">
<?php SESSION_START(); ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/BG.css">
	<link rel="stylesheet" href="CSS/navbar.css">
	<link rel="stylesheet" href="CSS/formstyle.css">
	<link rel="shortcut icon" href="img/computer.png">
	<link rel="stylesheet" href="CSS/fonts/thsarabunnew.css" />
	<link rel="stylesheet" href="CSS/Editpro.css">
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
						<img src="img/LOGOxx.png" class="brand_logo" alt="Logo" height= "190">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">

   
	<div style = "width: 600px;height:auto">
    <form class = "whitebox" action="usermanage.php?function=2" method = "POST" Align = "center">
	<div><h2>เพิ่มผู้ใช้งานใหม่</h2></div>
    <input type="hidden" value = "2" name = "function">
      
		<div class="form-group">
	<label style= "float:left">ชื่อ<b style = "color:red">*</b></label>
    <input type="text" class="form-control" name = "fname" id="fname"  placeholder="ชื่อ">
	<span id = "name_alert" style = "color:red" ></span>
		</div>
	<div class="form-group">
    <label  style= "float:left">นามสกุล<b style = "color:red">*</b></label>
    <input type="text" class="form-control" name = "lname" id="lname"  placeholder="นามสกุล">
	<span id = "lname_alert" style = "color:red"></span>
		</div>	
		<div class="form-group">
	<label  style= "float:left">อีเมล<b style = "color:red">*</b></label>
    <input type="email" class="form-control"  name = "email" id="email"  placeholder="อีเมล">
	<span id = "email_alert" style = "color:red"></span>
	</div>
	<div class="form-group">
	<label style= "float:left">ชื่อผู้ใช้งาน<b style = "color:red">*</b></label>
    <input type="text" class="form-control" name = "username" id="username"  placeholder="ชื่อผู้ใช้งาน">
	<span id = "username_alert" style = "color:red" ></span>
		</div>
	<div class="form-group">
    <label  style= "float:left">รหัสผ่าน<b style = "color:red">*</b></label>
    <input type="text" class="form-control" name = "pass" id="pass"  placeholder="รหัสผ่าน">
	<span id = "pass_alert" style = "color:red"></span>
		</div>
  <label  style= "float:left">ประเภทบัญชี</label>
  <select class="form-control form-control-sm" name = "Type">
  <option value="2">ผู้ใช้งานทั่วไป</option>
<option value="1">เจ้าหน้าที่ระบบ</option>   
 
  </select>
  
					<div class="d-flex justify-content-center mt-3 login_container">
					
				 	<button type="submit" id = "accsubmit" class="btn btn-success">Accept</button>&nbsp&nbsp
				    <!-- <a href="indexadmin.php"><button type="submit" class="btn btn-outline-danger">Back</button></a> -->
				   </div>
				   
				   
					</form>
					</div>
				</div>
				</div>
			</div>
		</div>
	</center>
      

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src ="javascript/user_check.js"></script>
  </body>
</html>