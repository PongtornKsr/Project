<?php

SESSION_START();
require 'connect.php';
$name = $_SESSION['userData']['name'];
$eml = $_SESSION['userData']['email'];
$pass = base64_encode($_POST['password']);
$sql = "SELECT * FROM userdata WHERE (name = '$name' and email ='".$eml."') or ( username = '".$_POST['uname']."'and password = '".$pass."') or (email = '".$eml."')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['Account'] = $row['givenName']." ".$row['familyName'];
        if(isset($eml)){
            $sqle = "UPDATE `userdata` SET last_update = (SELECT DATE_FORMAT(NOW(),'%d/%m/%y/%H:%i')) WHERE email = '".$eml."' ";
            if ($conn->query($sqle) === TRUE) {  
    
            }
        }else if(isset($_POST['uname'])){
            $sqle = "UPDATE `userdata` SET last_update = (SELECT DATE_FORMAT(NOW(),'%d/%m/%y/%H:%i')) WHERE username = '".$_POST['uname']."' ";
            if ($conn->query($sqle) === TRUE) {  
    
            }
        }
    
        
    if($row['profile_ID'] == 1){
        header("location: indexAdmin.php");
    }
    else if ($row['profile_ID'] == 2 && $row['ID_stat'] == 1){
        header("location: index.php");
    } 
    else if ($row['profile_ID'] == 2 && $row['ID_stat'] == 2){
        header("location: Blockwarning.php?warn=block");
    }
    }
} else if(isset($_POST['uname']) || isset($_POST['password'])){
    header('location: login.php?error=y');
}
else {
    header("location: Blockwarning.php?warn=noID");
    
}



?>