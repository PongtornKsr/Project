<?php 
require_once 'config.php';
unset($_SESSION['access_token']);
$gClient->revokeToken();
session_unset();
session_destroy();
header("location: login.php");


?>