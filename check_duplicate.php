<?php 
include 'connect.php';
$sql = "SELECT asset_ID from asset WHERE asset_ID = '".$_POST['sett']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "taken";
    exit();
}else{
    echo "nottaken";
    exit();
}


?>