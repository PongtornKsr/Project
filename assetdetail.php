<!DOCTYPE html>
<?php SESSION_START(); ?>
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
    <title>Document</title>
</head>
<?php
      require 'connect.php';
 ?>
<body>
<?php require 'nav.php'; ?>

<form class="box" action='assetmanage.php'>
<div class="head">รายละเอียดครุภัณฑ์</div>
<br><br>
<?php 
$number = $_GET['asset_number'];
$st= "";
    $id ="";
    $sqlq = "SELECT * FROM asset natural join asset_stat_overview natural join assetstat WHERE id = $number";
    $result = $conn->query($sqlq);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $st.=$row['asset_stat_name']." ";
    }
    }
$sql = "SELECT * FROM asset  natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room natural join vendor WHERE id = '".$number."'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
    echo "เลขรายการ :".$row['order_number']."<br>";
    echo "รหัสครุภัณฑ์ :".$row['asset_ID']."<br>";
    echo "ชื่อชุดครุภัณฑ์ :".$row['asset_setname']."<br>";
    echo "ชื่อเรียกครุภัณฑ์ :".$row['asset_nickname']."<br>";
    echo "ชื่อครุภัณฑ์ :".$row['asset_name']."<br>";
    echo "รุ่น/แบบ :".$row['model']."<br>";
    echo "คุณสมบัติ :".$row['property']."<br>";
    echo "วันที่ :".$row['addin_date']."<br>";
    echo "สถานที่ :".$row['asset_location']."<br>";
    echo "ห้องที่จัดเก็บ :".$row['room']."<br>";
    echo "ชื่อผู้รับผิดชอบ :".$row['resper_firstname']." ".$row['resper_lastname']."<br>";
    echo "สถานะการติดตั้ง :".$row['dstat']."<br>";
    echo "สถานะการใช้งาน :".$st."<br>";
    echo "ประเภทครุภัณฑ์ :".$row['asset_type_name']."<br>";
    echo "วิธีการได้รับ :".$row['get_method']."<br>";
    echo "ชื่อบริษัทผู้ขาย :".$row['vendor_company']."<br>";
    echo "ที่อยู่บริษัท :".$row['vendor_location']."<br>";
    echo "เบอร์โทรบริษัท :".$row['vendor_tel']."<br>";
    echo "โทรสาร :".$row['fax']."<br>";
}
}
?>
</form>
<?php require 'footer.php'; ?>
</body>
</html>