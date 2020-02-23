<?php 
$major = $_POST['major'];
$tel = $_POST['tel'];
$number = $_POST['number'];
$to = $_POST['to'];
$tdate = $_POST['tdate'];
$hmajor = $_POST['hmajor'];
$text = $_POST['text'];
$a_text = $_POST['approve_text'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .center {
  position: fixed;
  top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
}
u {    
    border-bottom: 1px line #000;
    text-decoration: underline;
}

    </style>
</head>
<body>

    <h1 align = "center">บันทึกข้อความ</h1><br>
    <b>ส่วนราชการ</b><u><?php echo "วิทยาการคอม"; ?></u>
  
</body>
</html>