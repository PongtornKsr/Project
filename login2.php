<?php

SESSION_START();
require 'connect.php';
$name = $_SESSION['userData']['name'];
$sql = "SELECT * FROM userdata WHERE name = '$name' or ( givenName = '".$_POST['fname']."' and email = '".$_POST['email']."')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['Uname'] = $_POST['fname'];
        $_SESSION['Account'] = $row['givenName']." ".$row['familyName'];
    if($row['profile_ID'] == 1){
        header("location: indexAdmin.php");
    }
    else if ($row['profile_ID'] == 2 and $row['ID_stat'] == 1){
        header("location: index.php");
    }
    else if ($row['profile_ID'] == 2 and $row['ID_stat'] == 2){
        header("location: Blockwarning.php");
    }
    }
} else {
    $sqla = "INSERT INTO `userdata`(`givenName`, `familyName`, `name`, `email`, last_update , `profile_ID`,'ID_stat') VALUES ('".$_SESSION['userData']['givenName']."','".$_SESSION['userData']['familyName']."','".$_SESSION['userData']['name']."','".$_SESSION['userData']['email']."',(NOW()),'2','1')";
    if ($conn->query($sqla) === TRUE) {
        ?>
        <script language="javascript">
        alert("บันทึกข้อมูลเรียบร้อยแล้ว");
        </script>
        <?php
        header("location: login2.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
}
$conn->close();
    

?>