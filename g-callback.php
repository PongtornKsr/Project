<?php 
    SESSION_START();
    require_once "config.php";
    if(isset($_SESSION['access_token']))
    {
        $gClient->setAccessToken($_SESSION['access_token']);

    }else if(isset($_GET['code'])){
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;

    }else {
        header("location : login.php");

    }

    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo->get();
    echo "<pre>";
    
    $user['givenName'] = $userData->givenName;
    $user['familyName'] = $userData->familyName;
    $user['email'] = $userData->email;
    $user['name'] = $userData->name;
    $user['picture'] = $userData->picture;

    $_SESSION['userData'] = $user;

    header("location: index.php");
    print_r($userData);
    

?>