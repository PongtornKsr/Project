<?php 
require 'connect.php';
if($_POST['action']=="Single"){
    $datestring = $_POST['dte'];
$sql = "UPDATE asset SET order_number = '".$_POST['onum']."', asset_ID = '".$_POST['asid']."' , room_ID ='".$_POST['rm']."' ,addin_date = '".$datestring."',  resper_ID = '".$_POST['rsid']."' , asset_setname = '".$_POST['a_snf']."', asset_nickname = '".$_POST['a_nnf']."', asset_name = '".$_POST['a_nf']."' , model = '".$_POST['mod']."' , asset_order = '".$_POST['a_orf']."' , property = '".$_POST['a_ppf']."' , dstat_ID = '".$_POST['dtypeid']."' , asset_type_ID = '".$_POST['typeid']."' , getMethod_ID = '".$_POST['gmtype']."' , mid = '".$_POST['mttype']."' , vendor_ID = '".$_POST['vdid']."' WHERE asset_number = '".$_POST['asnum']."'";

if ($conn->query($sql) === TRUE) {
    header('Location: assetmanage.php');
} else {
    echo "Error updating record: " . $conn->error;
}
}
else if ($_POST['action']=="Multi")
{
    $datestring = $_POST['dte'];
    $sql = "UPDATE asset SET order_number = '".$_POST['onum']."', room_ID ='".$_POST['rm']."' ,addin_date = '".$datestring."',  resper_ID = '".$_POST['rsid']."' , asset_setname = '".$_POST['a_snf']."', asset_nickname = '".$_POST['a_nnf']."', asset_name = '".$_POST['a_nf']."' , model = '".$_POST['mod']."' , asset_order = '".$_POST['a_orf']."' , property = '".$_POST['a_ppf']."' , dstat_ID = '".$_POST['dtypeid']."' , asset_type_ID = '".$_POST['typeid']."' , getMethod_ID = '".$_POST['gmtype']."' , mid = '".$_POST['mttype']."' , vendor_ID = '".$_POST['vdid']."'   WHERE asset_number = '".$_POST['num1']."' OR asset_number = '".$_POST['num2']."' OR (asset_number >  '".$_POST['num1']."' AND  asset_number <  '".$_POST['num2']."') ";

if ($conn->query($sql) === TRUE) {
   header('Location: assetmanage.php');
} else {
    echo "Error updating record: " . $conn->error;
}


}

$conn->close();
?>