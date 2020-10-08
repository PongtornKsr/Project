<!DOCTYPE html>
<?php SESSION_START();
$_SESSION['sql_detail'] = $_SESSION['sqlx'];
$_SESSION['word_detail'] = $_SESSION['searchword'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="stylesheet" href="CSS/fonts/thsarabunnew.css" />
    <link rel="stylesheet" href="CSS/submitstyle.css">
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="shortcut icon" href="img/computer.png">
    <link rel="stylesheet" href="CSS/navbar.css">
    <title>CS_Asset</title>
</head>
<?php
      require 'connect.php';
 ?>
<body>
<?php require 'nav.php'; ?>

<form align ="center" class="box" action='assetmanage.php'>
<div class="head">รายละเอียดครุภัณฑ์</div>
<a href="assetmanage.php" style ="float:left"><button>ย้อนกลับ</button></a>
<br><br>
<div align ="center">
<center>
<div align ="center">
<table align ="center">
<?php 
$number = $_GET['asset_number'];
$st= "";
    $id ="";
    $sqlq = "SELECT * FROM asset natural join asset_stat_overview natural join assetstat WHERE id = $number";
    $result = $conn->query($sqlq);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row['asset_stat_ID'] == 15){
            $st.= "<div style='color:orange'>".$row['asset_stat_name']."</div>";
        }
        else{
            $st.= "<div style='color:".$row['asset_stat_color']."'>".$row['asset_stat_name']."</div>";
        }
        
    }
    }

$sql = "SELECT * FROM asset  natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room natural join vendor natural join money_type natural join getmethod WHERE id = '".$number."</td></tr>'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
    $datethai = explode("/",$row['addin_date']);
    echo "<tr><td>เลขรายการ :</td><td>".$row['order_number']."</td></tr>";
    echo "<tr><td>รหัสครุภัณฑ์ :</td><td>".$row['asset_ID']."</td></tr>";
    echo "<tr><td>ประเภทครุภัณฑ์ :</td><td>".$row['asset_type_name']."</td></tr>";
    echo "<tr><td>วิธีการได้รับ :</td><td>".$row['money_type']." : ".$row['method']." ".$row['getm']."</td></tr>";
    echo "<tr><td>ชื่อบริษัทผู้ขาย :</td><td>".$row['vendor_company']."</td></tr>";
    echo "<tr><td>ที่อยู่บริษัท :</td><td>".$row['vendor_location']."</td></tr>";
    echo "<tr><td>เบอร์โทรบริษัท :</td><td>".$row['vendor_tel']."</td></tr>";
    echo "<tr><td>โทรสาร :</td><td>".$row['fax']."</td></tr>";
    echo "<tr><td>ชื่อชุดครุภัณฑ์ :</td><td>".$row['asset_setname']."</td></tr>";
    echo "<tr><td>ชื่อเรียกครุภัณฑ์ :</td><td>".$row['asset_nickname']."</td></tr>";
    echo "<tr><td>ชื่อครุภัณฑ์ :</td><td>".$row['asset_name']."</td></tr>";
    echo "<tr><td>รุ่น/แบบ :</td><td>".$row['model']."</td></tr>";
    echo "<tr><td>คุณสมบัติ :</td><td>".$row['property']."</td></tr>";
    echo "<tr><td>วันที่ :</td><td>".$datethai[0]."/".$datethai[1]."/".($datethai[2]+543)."</td></tr>";
    echo "<tr><td>สถานที่ :</td><td>".$row['asset_location']."</td></tr>";
    echo "<tr><td>ห้องที่จัดเก็บ :</td><td>".$row['room']."</td></tr>";
    echo "<tr><td>ชื่อผู้รับผิดชอบ :</td><td>".$row['resper_firstname']." ".$row['resper_lastname']."</td></tr>";
    echo "<tr><td>สถานะการติดตั้ง :</td><td>".$row['dstat']."</td></tr>";
    echo "<tr><td>สถานะการใช้งาน :</td><td>".$st."</td></tr>";
    
}
}
?>
</table>
</div>
</center>
</div>
</form>
<?php require 'footer.php'; ?>
</body>
</html>