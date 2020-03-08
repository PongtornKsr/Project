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
$sql = "SELECT * FROM asset  natural join assetstat natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room natural join vendor WHERE asset_number = '".$_GET['asset_number']."'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
    echo $row['order_number']."<br>";
    echo $row['asset_ID']."<br>";
    echo $row['asset_name']."<br>";
    echo $row['model']."<br>";
    echo $row['asset_location']."<br>";
    echo $row['room']."<br>";
    echo $row['model']."<br>";
    echo $row['resper_firstname']." ".$row['resper_lastname']."<br>";
    echo $row['dstat']."<br>";
    echo $row['asset_stat_name']."<br>";
    echo $row['asset_type_name']."<br>";
    echo $row['get_method']."<br>";
    echo $row['vendor_company']."<br>";
    echo $row['vendor_location']."<br>";
    echo $row['vendor_tel']."<br>";
    echo $row['fax']."<br>";
}
}
?>
</form>
<?php require 'footer.php'; ?>
</body>
</html>