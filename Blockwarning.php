<!DOCTYPE html>
<html lang="en">
<?php SESSION_START(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="shortcut icon" href="img/computer.png">
    <link rel="stylesheet" href="CSS/fonts/thsarabunnew.css" />
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>CS_Asset</title>
</head>
<body class = "thsarabunnew" background="img/BG.png" style ="
  background-repeat: no-repeat;
  background-attachment: fixed; ">
<br>
<br><br>
<br>
<?php if($_GET['warn']=="block"){  ?>
    <form Align = "center" class = "whitebox" action="logout.php"><h1 style ="color:red">ไม่สามารถเข้าสู่ระบบได้</h1>
    <br>
    <img src="img/block2.png" alt="">
    <h1>ติดต่อเจ้าหน้าที่ระบบเพื่อปลดล็อคบัญชีของท่าน</h1>
    <br>
    <input type="submit" class="btn btn-outline-danger" value = "Back To Login Page"></form>
<?php }else if($_GET['warn']=="noID") {?>
    <form Align = "center" class = "whitebox" action="logout.php"><h1 style ="color:red">ไม่สามารถเข้าสู่ระบบได้</h1>
    <br>
    <img src="img/newadd.png" alt="">
    <br>
    <h1>ติดต่อเจ้าหน้าที่ระบบเพื่อเพิ่มข้อมูลผู้ใช้งานใหม่สำหรับท่าน</h1>
    <br>
    
    <input type="submit" class="btn btn-outline-danger" value = "Back To Login Page">
    </form>
<?php } ?>
    
</body>
</html>