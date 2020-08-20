<?php

SESSION_START();
require 'connect.php';
$name = $_SESSION['userData']['name'];
$eml = $_SESSION['userData']['email'];
$pass = base64_encode($_POST['password']);
$sql = "SELECT * FROM userdata WHERE (name = '$name' and email ='".$eml."') or ( username = '".$_POST['uname']."'and password = '".$pass."')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['Account'] = $row['givenName']." ".$row['familyName'];
    if($row['profile_ID'] == 1){
        header("location: indexAdmin.php");
    }
    else if ($row['profile_ID'] == 2 && $row['ID_stat'] == 1){
        header("location: index.php");
    } 
    else if ($row['profile_ID'] == 2 && $row['ID_stat'] == 2){
        header("location: Blockwarning.php");
    }
    }
} else if(isset($_POST['uname']) || isset($_POST['password'])){
    header('location: login.php?error=y');
}
else {
    $sqla = "INSERT INTO `userdata`(`givenName`, `familyName`, `name`, `email`, last_update , `profile_ID`,'ID_stat') VALUES ('".$_SESSION['userData']['givenName']."','".$_SESSION['userData']['familyName']."','".$_SESSION['userData']['name']."','".$_SESSION['userData']['email']."',(NOW()),'2','1')";
    if ($conn->query($sqla) === TRUE) {
        header("location: login2.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
}



?>