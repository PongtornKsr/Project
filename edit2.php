<?php 
require 'connect.php';
if($_POST['action']=="Single"){
$sql = "UPDATE asset SET room_ID ='".$_POST['rm']."' ,addin_date = '".$_POST['dte']."',  resper_ID = '".$_POST['rsid']."' , asset_setname = '".$_POST['a_snf']."', asset_nickname = '".$_POST['a_nnf']."', asset_name = '".$_POST['a_nf']."' , model = '".$_POST['mod']."' , asset_order = '".$_POST['a_orf']."' , property = '".$_POST['a_ppf']."'  WHERE asset_number = '".$_POST['asnum']."'";

if ($conn->query($sql) === TRUE) {
    header('Location: assetmanage.php');
} else {
    echo "Error updating record: " . $conn->error;
}
}
else if ($_POST['action']=="Multi")
{
    $sql = "UPDATE asset SET  room_ID ='".$_POST['rm']."' ,addin_date = '".$_POST['dte']."',  resper_ID = '".$_POST['rsid']."' , asset_setname = '".$_POST['a_snf']."', asset_nickname = '".$_POST['a_nnf']."', asset_name = '".$_POST['a_nf']."' , model = '".$_POST['mod']."' , asset_order = '".$_POST['a_orf']."' , property = '".$_POST['a_ppf']."'  WHERE asset_number = '".$_POST['num1']."' OR asset_number = '".$_POST['num2']."' OR (asset_number >  '".$_POST['num1']."' AND  asset_number <  '".$_POST['num2']."') ";

if ($conn->query($sql) === TRUE) {
   header('Location: assetmanage.php');
} else {
    echo "Error updating record: " . $conn->error;
}


}

$conn->close();
?>