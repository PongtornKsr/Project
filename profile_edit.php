<!DOCTYPE html>
<html lang="en"><?php SESSION_START(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="Css/BG.css">
    <link rel="stylesheet" href="CSS/Editpro.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="shortcut icon" href="img/computer.png">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    
    <title>CS_Asset</title>
</head>
<style>


</style>
<body background="img/BG.png">
<?php require 'nav.php'; ?>
<?php  require 'connect.php';
        $email ="";
        $fname = "";
        $lname ="";
        $uname = "";
        $pass = "";
        $uid = "";
        if(!isset($_GET['ID'])){
            $sqla = "SELECT * FROM userdata WHERE name = '".$_SESSION['Account']."'";
        }
        else if(isset($_GET['ID'])){
            $sqla = "SELECT * FROM userdata WHERE ID = '".$_GET['ID']."'";
        }
       
       $result = $conn->query($sqla);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           if($row['profile_ID']==2){ 
               $_SESSION['editop'] = 2; 
               $GLOBALS['email'] = $row['email'];
               $GLOBALS['fname'] = $row['givenName'];
               $GLOBALS['lname'] = $row['familyName'];
               $GLOBALS['uname'] = $row['username'];
               $GLOBALS['uid'] = $row['ID'];
               $GLOBALS['pass'] = base64_decode($row['password']);
        }
           elseif($row['profile_ID']==1){ $_SESSION['editop'] = 1;
               $GLOBALS['email'] = $_SESSION['echeck'] = $row['email'];
               $GLOBALS['fname'] = $row['givenName'];
               $GLOBALS['lname'] = $row['familyName'];
               $GLOBALS['uname'] = $_SESSION['ucheck'] = $row['username'];
               $GLOBALS['uid'] = $row['ID'];
               $GLOBALS['pass'] = base64_decode($row['password']);
        }
            }
        }
?>
<br><br><br>
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/LOGOxx.png" class="brand_logo" alt="Logo" height= "200">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">

	<div style = "width: 500px;height:auto">
<form class = "whitebox" >
<a href='AccountManage.php'> <button type='button' class='btn btn-default' >ย้อนกลับ</button></a>
  <div><h2>แก้ไขข้อมูลผู้ใช้</h2></div>
  <div><h4 id = "error_msg" style="text-align:center; color:red">df</h4></div>
  
  <div class="form-group">
	<label style= "float:left">ชื่อ<b style = "color:red">*</b></label>
    <input type="text" class="form-control" name = "fname" id="fname" value = "<?php echo $fname; ?>" placeholder="ชื่อ">
	<span id = "name_alert" style = "color:red" ></span>
		</div>
	
	<div class="form-group">
    <label  style= "float:left">นามสกุล<b style = "color:red">*</b></label>
    <input type="text" class="form-control" name = "lname" id="lname"  value = "<?php echo $lname; ?>"placeholder="นามสกุล">
	<span id = "lname_alert" style = "color:red"></span>
		</div>
			
		<div class="form-group">
	<label  style= "float:left">อีเมล<b style = "color:red">*</b></label>
    <input class="form-control" id="email" name="email" value ="<?php echo $email; ?>"type="text" <?php if($email == "fams.rmutk@gmail.com"){ echo "disabled" ;} ?> required>
	<span id = "email_alert" style = "color:red"></span>
	</div>
        <center>
        <br>
		
            <button type="button" class= "btn btn-success"name="update_button" id="update_button">&nbsp;แก้ไขข้อมูล&nbsp;</button>
            <input type="hidden" name="uid" id ="uid" value = "<?php echo $uid; ?>">
		</center>
	</form>
    </div>
    </div>
    </div>
    </div>
    </div>
    
<?php require 'footer.php'; ?>
</body>
</html>
<script type="text/javascript">
$('document').ready(function(){
    var username_state = true;
    var email_state = true;
    var fname_state = true;
    var lname_state = true;
    var passwordin_state = true;
    var passwordinc_state = true;
    start();
    function start(){
        $('#email').siblings("span").hide();
        $('#username').siblings("span").hide();
        $('#fname').siblings("span").hide();
        $('#lname').siblings("span").hide();
        $('#error_msg').hide();
        $('span').hide();
    }
    function check_stat(){
        if (fname_state == false || email_state == false || lname_state == false) {
           // e.preventDefault();
           // $('#error_msg').show();
          //  $("#error_msg").text("กรุณากรอกข้อมูลให้ถูกต้องก่อนดำเนินการ");
            $('#update_button').attr('disabled',true);
        } else {
            $('#error_msg').hide();
            $('#update_button').attr('disabled',false);
        }
    }
    

    function injectin_check(ijtext){
        if(ijtext == "" || ijtext.trim() == "" || ijtext.includes("'") || ijtext.includes("*") || ijtext.includes(";") || ijtext.includes("<") || ijtext.includes(">") || ijtext.includes(",")){
            return false;
        }
        else { return true; }
    }
   
    $('#email').on('keyup', function() {
        var email = $('#email').val();
        email_state = injectin_check(email);
        if (email_state == false) {
            email_state = false;
           // $('#email').parent().removeClass();
                 //   $('#email').parent().addClass('form_error');
                    $('#email').siblings("span").text("กรุณาใส่อีเมลที่ไม่ใช้ค่าว่าง และ ตัวอักษรพิเศษ");
                    $('#email').siblings("span").show();
                    check_stat();
            return;
        }else{
            email_state = true;
            $('#email').siblings("span").hide();
            check_stat()
        }
        $.ajax({
            url: 'update_profile.php',
            type: 'post',
            data: {
                'email_check': 1,
                'email': email
            },
            success: function(response) {
                if (response == 'taken') {
                    email_state = false;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_error');
                    $('#email').siblings("span").text("อีเมลนี้มีการใช้งานในระบบแล้ว");
                    $('#email').siblings("span").show();
                    check_stat();
                } else if (response == "not_taken") {
                    email_state = true;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_success');
                    $('#email').siblings("span").text("อีเมลสามารถใช้ได้");
                    $('#email').siblings("span").hide();
                    check_stat();
       
                }
            }
        })
    });

    $('#fname').on('keyup', function() {
        var name = $(this).val();
        fname_state = injectin_check(name);
        if (fname_state == false) {
            fname_state = false;
          //  $(this).parent().removeClass();
                   // $(this).parent().addClass('form_error');
                    $(this).siblings("span").text("กรุณาใส่ค่าที่ไม่ใช้ค่าว่าง และ ตัวอักษรพิเศษ");
                    $(this).siblings("span").show();
                    check_stat();
            
        }else{
            $(this).siblings("span").hide();
            check_stat();
            
        }
        
    });
    $('#lname').on('keyup', function() {
        var name = $(this).val();
        lname_state = injectin_check(name);
        if (lname_state == false) {
            lname_state = false;
           // $(this).parent().removeClass();
                  //  $(this).parent().addClass('form_error');
                    $(this).siblings("span").text("กรุณาใส่ค่าที่ไม่ใช้ค่าว่าง และ ตัวอักษรพิเศษ");
                    $(this).siblings("span").show();
                    check_stat();
                   
        }else{
            lname_state = true;
            $(this).siblings("span").hide();
            check_stat();

        }
        
    });


    $('#update_button').on("click", function(e) {
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var uid = $("#uid").val();
        if ( email_state == false || fname_state == false || lname_state == false) {
            e.preventDefault();
           // $('#error_msg').show();
           // $("#error_msg").text("กรุณากรอกข้อมูลให้ถูกต้องก่อนดำเนินการ");
            
        } else {
            $.ajax({
                url: 'update_profile.php',
                type: 'post',
                data: {
                    'save': 1,
                    'email': email,
                    'username': '',
                    'password': '',
                    'fname' : fname,
                    'lname' : lname,
                    'uid' : uid
                },
                success: function(response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ดำเนินการสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        setTimeout(function() {
                        window.location.href = "AccountManage.php";
                        }, 2000);
                    
                    
                    
                   
                }
            })
        }
    });

});
</script>     
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>