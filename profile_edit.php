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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

<form class = "form">
<a href='AccountManage.php'> <button type='button' class='btn btn-outline-secondary' >ย้อนกลับ</button></a>
  <h2>แก้ไขข้อมูลผู้ใช้</h2>
  <h4 id = "error_msg" style="text-align:center; color:red">df</h4>
  <br>
		<p>
			<label class="floatLabel">อีเมล</label>
			<input class="w3-input" id="email" name="email" value ="<?php echo $email; ?>"type="text" required>
            <span id = "hint2"></span>
        </p>
        <p>
			<label  class="floatLabel">ชื่อ</label>
			<input class="w3-input"  id = "fname" name="fname" value ="<?php echo $fname; ?>" type="text" required>
        </p>
        <p>
			<label  class="floatLabel">นามสกุล</label>
			<input  class="w3-input" id = "lname" name="lname" value ="<?php echo $lname; ?>" type="text" required>
        </p>
        <p>
			<label  class="floatLabel">ชื่อผู้ใช้</label>
			<input  class="w3-input" id = "username" name="uname" value ="<?php  echo $uname; ?>" type="text" required>
            <span id = "hint2"></span>
		</p>
		<p>
			<label for="password" class="floatLabel">รหัสผ่าน</label>
			<input class="w3-input" id="password" onkeyup = "passcount()" value ="<?php echo $pass; ?>" name="password" type="password">
			<span id = "hint1">Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">ยืนยันรหัสผ่าน</label>
			<input class="w3-input" id="password2" onkeyup= "passcheck()" value ="<?php echo $pass; ?>" name="confirm_password" type="password">
			<span id = "hint2">Your passwords do not match</span>
        </p>
        <center>
		<p>
            <button type="button" class= "btn btn-outline-success"name="update_button" id="update_button">&nbsp;แก้ไขข้อมูล&nbsp;</button>
            <input type="hidden" name="uid" id ="uid" value = "<?php echo $uid; ?>">
		</p></center>
	</form>
    </div>
<?php require 'footer.php'; ?>
</body>
</html>
<script type="text/javascript">
$('document').ready(function(){
    var username_state = true;
    var email_state = true;
    var passwordin_state = true;
    var passwordinc_state = true;
    function start(){
        $('#email').siblings("span").hide();
        $('#username').siblings("span").hide();
        $('#error_msg').hide();
    }
    function check_stat(){
        if (username_state == false || email_state == false || passwordin_state == false || passwordinc_state == false) {
            e.preventDefault();
            $('#error_msg').show();
            $("#error_msg").text("กรุณากรอกข้อมูลให้ถูกต้องก่อนดำเนินการ");
            $('#update_button').attr('disabled',true);
        } else {
            $('#error_msg').hide();
            $('#update_button').attr('disabled',false);
        }
    }
    function check(){
        var value = $('#password').val();
        if(value.length < 8 && value != "Default text"){
            passwordin_state = false;
            $('#password').parent().removeClass();
            $('#password').parent().addClass('form_error');
            $('#password').siblings("span").text("รหัสผ่านต้องมี8ตัวอักษรหรือมากกว่า");
            $('#password').siblings("span").show();
        } 
        else{
            passwordin_state = true;
            $('#password').parent().removeClass();
            $('#password').parent().addClass('form_success');
            $('#password').siblings("span").text("");
            $('#password').siblings("span").hide();
            $('#password').parent().removeClass();
        }
        var passwordin1 = $('#password').val();
        var passwordin2 = $('#password2').val();
        if(passwordin2 != passwordin1){
            passwordinc_state = false;
            $('#password2').parent().removeClass();
            $('#password2').parent().addClass('form_error');
            $('#password2').siblings("span").text("รหัสผ่านไม่ตรงกัน");
            $('#password2').siblings("span").show();
        }
        else{
            passwordinc_state = true;
            $('#password2').parent().removeClass();
            $('#password2').parent().addClass('form_success');
            $('#password2').siblings("span").text("");
            $('#password2').siblings("span").hide();
            $('#password2').parent().removeClass();
        }
    }
    start();
    check();

    $('#password').on('keyup',function(){
       check();
       check_stat();
    });
    $('#password2').on('keyup',function(){
        check();
        check_stat();
    });

    $('#username').on('blur', function() {
        var username = $('#username').val();
        if (username == '') {
            username_state = false;
            return;
        }
        $.ajax({
            url: 'update_profile.php',
            type: 'post',
            data: {
                'username_check': 1,
                'username': username
            },
            success: function(response) {
                if (response == 'taken') {
                    username_state = false;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('form_error');
                    $('#username').siblings("span").text("ชื่อผู้ใช้มีการลงทะเบียนในระบบแล้ว");
                    $('#username').siblings("span").show();
                    check_stat();
                } else if (response == "not_taken") {
                    username_state = true;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('form_success');
                    $('#username').siblings("span").text("ชื่อผู้ใช้สามารถใช้ได้");
                    $('#username').siblings("span").hide();
                    check_stat();
                }
            }
        })
    });

    $('#email').on('blur', function() {
        var email = $('#email').val().trim();
        if (email == '') {
            email_state = false;
            $('#email').parent().removeClass();
                    $('#email').parent().addClass('form_error');
                    $('#email').siblings("span").text("กรุณาใส่อีเมล");
                    $('#email').siblings("span").show();
            return;
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

    $('#update_button').on("click", function(e) {
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var uid = $("#uid").val();
        if (username_state == false || email_state == false || passwordin_state == false || passwordinc_state == false) {
            e.preventDefault();
            $('#error_msg').show();
            $("#error_msg").text("กรุณากรอกข้อมูลให้ถูกต้องก่อนดำเนินการ");
            
        } else {
            $.ajax({
                url: 'update_profile.php',
                type: 'post',
                data: {
                    'save': 1,
                    'email': email,
                    'username': username,
                    'password': password,
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