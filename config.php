<?php  

    SESSION_START();
    require_once "googleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("540476120220-vrle1kq5dfqvtjc57n105khenvcvdt59.apps.googleusercontent.com");
    $gClient->setClientSecret("3LYB8ZgRDULNhOMndddlP6nk");
    $gClient->setApplicationName("Project_web");
    $gClient->setRedirectUri("http://localhost/Project/g-callback.php");
    $gClient->addScope([Google_Service_Oauth2::PLUS_LOGIN,Google_Service_Oauth2::USERINFO_EMAIL]);

    

?>