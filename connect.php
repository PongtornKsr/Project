<?php 

$servername = "localhost";
$username = "admin";
$password = "1234";
$dbname = "prodata";
/*
$servername = "localhost";
$username = "u263202561_fams";
$password = "Famsproject1234";
$dbname = "u263202561_fams";*/
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>