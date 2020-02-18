<!DOCTYPE html>
<?php SESSION_START(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
      require 'connect.php';
 ?>
<body>

<form action='assetmanage.php'>
<button type="submit">BACK</button>
</form>
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

</body>
</html>