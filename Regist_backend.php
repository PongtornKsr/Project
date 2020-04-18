<?php 
$db = mysqli_connect('localhost', 'admin', '1234', 'prodata');

    if (isset($_POST['username_check'])) {
        $username = $_POST['username'];
        $sql = "SELECT * FROM userdata WHERE username = '$username' ";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
            echo 'taken';
        } else {
            echo 'not_taken';
        }
        exit();
    }

    if (isset($_POST['email_check'])) {
        $email = $_POST['email'];
        $sql = "SELECT * FROM userdata WHERE email = '$email' ";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
            echo 'taken';
        } else {
            echo 'not_taken';
        }
        exit();
    }

    if (isset($_POST['save'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = base64_encode($_POST['password']);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $name = $fname.' '.$lname;
        $sql = "SELECT * FROM userdata WHERE username = '$username' ";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
            echo "exists";
            exit();
        }  else {
            $query = "INSERT INTO `userdata`(`givenName`, `familyName`, `name`, `email`, `username`, `password`, `last_update`, `profile_ID`,`ID_stat`) VALUES ('".$fname."','".$lname."','".$name."','".$email."','".$username."','".$password."',(NOW()),'2','1')";
            $results = mysqli_query($db, $query);
            echo 'Saved';
            exit();
        }
    }

?>