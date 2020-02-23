<?php 
SESSION_START();
require 'connect.php';
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$uid = $_POST['uid'];
$pass = base64_encode($_POST['password']);
$name = $fname." ".$lname;
$sql ="UPDATE `userdata` SET `givenName`='".$fname."',`familyName`='".$lname."',`name`='".$name."',`email`='".$email."',`username`='".$uname."',`password`='".$pass."',`last_update`=(NOW()) WHERE ID = '".$uid."'";
if ($conn->query($sql) === TRUE) {
    if($_SESSION['editop']==2){ $_SESSION['Account'] = $name; header("location: index.php"); }
    elseif($_SESSION['editop']==1){ $_SESSION['Account'] = $name; header("location: indexAdmin.php"); }
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>