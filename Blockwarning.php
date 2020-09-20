<!DOCTYPE html>
<html lang="en">
<?php SESSION_START(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>CS_Asset</title>
</head>
<body background="img/BG.png" style ="
  background-repeat: no-repeat;
  background-attachment: fixed; ">

<?php if($_GET['warn']=="block"){  ?>
    <form Align = "center"><h1>YOU ARE BLOCKED</h1>
    <br>
    <h1>PLEASE CONTACT ADMIN TO UNBLOCK YOUR USER ID</h1>
    <br></form>
<?php }else if($_GET['warn']=="noID") {?>
    <form Align = "center"><h1>ไม่สามารถเข้าได้</h1>
    <br>
    <h1>ติดต่อเจ้าหน้าที่ระบบเพื่อเพิ่มข้อมูลผู้ใช้งานใหม่สำหรับท่าน</h1>
    <br></form>
<?php } ?>
    <form action="logout.php" Align="center"><input type="submit" class="btn btn-outline-danger" value = "Back To Login Page"></form>
</body>
</html>