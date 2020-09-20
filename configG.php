<?php 
session_start();
require_once 'google/vendor/autoload.php';

$google_client = new Google_Client();
$google_client->setClientID('282215510592-shnoia66blmtdo337jqf2h5g0qdk07fp.apps.googleusercontent.com');
$gClient->setApplicationName("FixedAsset");
$google_client->setClientSecret('pSvCcFsJq2YFLERV0b0JPnPk');
$google_client->setRedirecUri('http://127.0.0.1/Project/google_callback.php');
$google_client->addScope('email');
$google_client->addScope('profile');

?>