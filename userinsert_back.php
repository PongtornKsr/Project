<?php 
require 'connect.php';
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'] ;
}


if(isset($_POST['email'])){
$sql = "SELECT email From userdata WHERE email = '".$email."'";
$result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "อีเมลนี้มีการลงทะเบียนแล้ว";
            exit();
        }
    }
}
if(isset($_POST['username'])){
    $sql = "SELECT username From userdata WHERE username = '".$username."'";
$result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ชื่อผู้ใช้นี้มีการลงทะเบียนแล้ว";
            exit();
        }
    }
}


?>