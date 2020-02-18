<?php
$servername = "localhost";
$username = "admin";
$password = "1234";
$dbname = "Prodata";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function insert($sql)
{

    if ($conn->query($sql) === TRUE) {
        return 1;
    } else {
        return 0;
    }
    
    $conn->close();

}

function select($sql)
{



}

?>