<!DOCTYPE html><?php SESSION_START(); 
if(!isset($_SESSION['Account'])){header("Location:Login.php");}
else{} ?>
<html lang="en">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/fonts/thsarabunnew.css" />
    <link rel="stylesheet" href="Css/BG.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="shortcut icon" href="img/computer.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'nav.php'; ?>
    <form Align ="center">
<img src="img/newlogoex.png" class="brand_logo" alt="Logo" style="margin-top:10%" height= "500px">
</form>
    <?php require 'footer.php'; ?>
</body>
</html>
