<?php 

/*SESSION_START();
require 'connect.php';
$email = $_POST['email'];
$uname = $_POST['uname'];
$pass = base64_encode($_POST['password']);
$sql = "SELECT * FROM userdata WHERE email = '".$email."' and username = '".$uname."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sql = "UPDATE userdata SET password = '".$pass."' WHERE email = '".$email."' and username = '".$uname."'";
        if ($conn->query($sql) === TRUE) {
            header("location: login.php");
        }
        else {
        echo "Error updating record: " . $conn->error;
        }
    }
}
else{
    header("location: Setnewpass.php?error=y");

}*/

$to = "goodbye_baby@hotmailmail.co.th";
$subject = "My subject";
$txt = "Hello world! test";
$headers = "From: Assetwebmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
?>