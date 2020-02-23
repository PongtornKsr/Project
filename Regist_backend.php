<?php 
require 'connect.php';
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pass = base64_encode($_POST['password']);
$name = $fname." ".$lname;
$sq =  "INSERT INTO `userdata`(`givenName`, `familyName`, `name`, `email`, `username`, `password`, `last_update`, `profile_ID`,`ID_stat`) VALUES ('".$fname."','".$lname."','".$name."','".$email."','".$uname."','".$pass."',(NOW()),'2','1')";
if ($conn->query($sq) === TRUE) {
    header("location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>