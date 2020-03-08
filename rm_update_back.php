<?php 
SESSION_START();
$aid = $_SESSION['rm'];
$rm = $_POST['rmid'];
require 'connect.php';
foreach ($aid as $x){
    $sql = "UPDATE asset SET room_ID = '".$rm."' WHERE id = '".$x."'";
    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
}
unset($_SESSION['rm']);
header('Location: assetmanage.php');

?>