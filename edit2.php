<?php 
SESSION_START();
require 'connect.php';
include 'action_insert.php';
if($_POST['action']=="Single"){
    $datestring = date("d/m/Y", strtotime($_POST['dte']));
$sql = "UPDATE asset SET order_number = '".$_POST['onum']."', asset_ID = '".$_POST['asid']."' , room_ID ='".$_POST['rm']."' ,addin_date = '".$datestring."',  resper_ID = '".$_POST['rsid']."' , asset_setname = '".$_POST['a_snf']."', asset_nickname = '".$_POST['a_nnf']."', asset_name = '".$_POST['a_nf']."' , model = '".$_POST['mod']."' , asset_order = '".$_POST['a_orf']."' , property = '".$_POST['a_ppf']."' , dstat_ID = '".$_POST['dtypeid']."' , asset_type_ID = '".$_POST['typeid']."' , getMethod_ID = '".$_POST['gmtype']."' , mid = '".$_POST['mttype']."' , vendor_ID = '".$_POST['vdid']."' , price_per_qty = '".$_POST['price']."' , group_price = '".$_POST['gprice']."', note = '".$_POST['note']."' , getm = '".$_POST['getm']."' WHERE asset_ID like '".$_SESSION['asset_ID']."%' and asset_number = '".$_POST['asnum']."'";

if ($conn->query($sql) === TRUE) {
    insert_action("แก้ไขข้อมูลครุภัณฑ์ ".$_POST['asid']);
    header('Location: assetmanage.php');
} else {
    echo "Error updating record: " . $conn->error;
}
}
else if ($_POST['action']=="Multi")
{
    
        $datestring = date("d/m/Y", strtotime($_POST['dte']));
    $sql = "UPDATE asset SET order_number = '".$_POST['onum']."', room_ID ='".$_POST['rm']."' ,addin_date = '".$datestring."',  resper_ID = '".$_POST['rsid']."' , asset_setname = '".$_POST['a_snf']."', asset_nickname = '".$_POST['a_nnf']."', asset_name = '".$_POST['a_nf']."' , model = '".$_POST['mod']."' , asset_order = '".$_POST['a_orf']."' , property = '".$_POST['a_ppf']."' , dstat_ID = '".$_POST['dtypeid']."' , asset_type_ID = '".$_POST['typeid']."' , getMethod_ID = '".$_POST['gmtype']."' , mid = '".$_POST['mttype']."' , vendor_ID = '".$_POST['vdid']."' , price_per_qty = '".$_POST['price']."' , group_price = '".$_POST['gprice']."' , note = '".$_POST['note']."' , getm = '".$_POST['getm']."'  WHERE asset_ID like '".$_SESSION['asset_ID']."%' and asset_Set = '".$_SESSION['editset']."'";
    
    

if ($conn->query($sql) === TRUE) {
    insert_action("แก้ไขข้อมูลครุภัณฑ์รายการทั้งหมดที่มีอยู่ในรหัสเดียวกันกับ".$_SESSION['thisID']);
  // header('Location: assetmanage.php');
  unset($_SESSION['thisID']);
  unset($_SESSION['asset_ID']);
  unset($_SESSION['editset']);
  
} else {
    echo "Error updating record: " . $conn->error;
}


}

$conn->close();
?>