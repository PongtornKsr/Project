<?php 
SESSION_START();
$aid = $_SESSION['id'];
require 'connect.php';
if(isset($_POST['RoomUpdate'])){
    $rm = $_POST['rmid'];
foreach ($aid as $x){
    $sql = "UPDATE asset SET room_ID = '".$rm."',resper_ID = (SELECT resper_ID FROM `room` join respon_per where room_ID = '".$rm."' and (room.resper_IDs = respon_per.resper_ID)) WHERE id = '".$x."'";
    if ($conn->query($sql) === TRUE) {
       
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
}
unset($_SESSION['id']);
exit();
}else if(isset($_POST['StatUpdate'])){
    $st = $_POST['stid'];
    foreach ($aid as $x){
        $sql = "UPDATE asset_stat_overview SET asset_stat_ID = '".$st."' WHERE id = '".$x."'";
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error updating record: " . $conn->error;
        }
}unset($_SESSION['id']);
exit();
}else if(isset($_POST['newStat'])){
    $st = $_POST['stid'];
    foreach ($aid as $x){
        $sql = "INSERT INTO asset_stat_overview (id,asset_stat_ID )VALUES ('".$x."','".$st."')";
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    unset($_SESSION['id']);
header('Location: assetmanage.php');

}


?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>