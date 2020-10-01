<?php 

function insert_action($action){

require 'connect.php';
$datestring = date("d/m/Y");
$sqlID = "SELECT *  FROM userdata WHERE name = '".$_SESSION['Account']."'";
$result = $conn->query($sqlID);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    $sqlacion = "INSERT INTO `action_log`( `action`, `time`, `action_date`, `ID`) VALUES ('".$action."', DATE_FORMAT(NOW(), '%H:%i') ,'".$datestring."','".$row['ID']."')" ;
    if ($conn->query($sqlacion) === TRUE) {

    }
    else{
        echo "Error: " . $sqlacion . "<br>" . $conn->error;
    }
}
}

}


?>