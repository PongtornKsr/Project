<?php 
$db = mysqli_connect('localhost', 'admin', '1234', 'prodata');

if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $sql = "SELECT * FROM userdata WHERE username = '$username' and email = '$email' ";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo 'exist';
    } else {
        echo 'not_exist';
    }
    exit();
}

if (isset($_POST['email_check'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM userdata WHERE email = '$email' ";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        echo 'exist';
    } else {
        echo 'not_exist';
    }
    exit();
}

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = base64_encode($_POST['password']);
    $sql = "SELECT * FROM userdata WHERE username = '$username' and email = '$email'";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
        $query = "UPDATE userdata SET password='$password',last_update=(NOW()) WHERE email = '$email'";
        $results = mysqli_query($db, $query);
        echo 'Saved';
        exit();
    }  else {
        echo 'not_exist';
        exit();
    }
}
?>