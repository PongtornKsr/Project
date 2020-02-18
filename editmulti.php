<?php 
require 'connect.php';
echo $_POST['num1'];
   echo $_POST['num2'];
   $a = $_POST['num1'];
   $b = $_POST['num2'];
   echo $a;
   echo $b;
   echo "OK";
$sql = "UPDATE asset SET room_ID ='".$_POST['rm']."' , asset_location_ID = '".$_POST['lo']."', resper_ID = '".$_POST['rsid']."' , asset_stat_ID = '".$_POST['utype']."' WHERE asset_number = '".$_POST['num1']."' OR asset_number = '".$_POST['num2']."' OR (asset_number >  '".$_POST['num1']."' AND  asset_number <  '".$_POST['num2']."') ";

/*if ($conn->query($sql) === TRUE) {
   // header('Location: assetmanage.php');
   echo $_POST['num1'];
   echo $_POST['num2'];
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();*/
?>