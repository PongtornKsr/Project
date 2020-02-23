<!DOCTYPE html>
<html lang="en"><?php SESSION_START(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="Css/BG.css">
    <link rel="stylesheet" href="CSS/Editpro.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>


</style>
<body background="img/BG.png">
<?php  require 'connect.php';
        $email ="";
        $fname = "";
        $lname ="";
        $uname = "";
        $pass = "";
        $uid = "";
       $sqla = "SELECT * FROM userdata WHERE name = '".$_SESSION['Account']."'";
       $result = $conn->query($sqla);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           if($row['profile_ID']==2){ 
               $_SESSION['editop'] = 2; require 'Userheader.php';
               $GLOBALS['email'] = $row['email'];
               $GLOBALS['fname'] = $row['givenName'];
               $GLOBALS['lname'] = $row['familyName'];
               $GLOBALS['uname'] = $row['username'];
               $GLOBALS['uid'] = $row['ID'];
               $GLOBALS['pass'] = base64_decode($row['password']);
        }
           elseif($row['profile_ID']==1){ $_SESSION['editop'] = 1; require 'nav.php';
            $GLOBALS['email'] = $row['email'];
               $GLOBALS['fname'] = $row['givenname'];
               $GLOBALS['lname'] = $row['familyname'];
               $GLOBALS['uname'] = $row['username'];
               $GLOBALS['uid'] = $row['ID'];
               $GLOBALS['pass'] = base64_decode($row['password']);
        }
            }
        }
?>
<form action="update_profile.php" method="post" class = "form">
  <h2>Profile Edit</h2>
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input class="w3-input" id="Email" name="email" value ="<?php echo $email; ?>"type="text" required>
        </p>
        <p>
			<label  class="floatLabel">Firstname</label>
			<input class="w3-input"  name="fname" value ="<?php echo $fname; ?>" type="text" required>
        </p>
        <p>
			<label  class="floatLabel">Lastname</label>
			<input  class="w3-input" name="lname" value ="<?php echo $lname; ?>" type="text" required>
        </p>
        <p>
			<label  class="floatLabel">Username</label>
			<input  class="w3-input" name="uname" value ="<?php echo $uname; ?>" type="text" required>
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input class="w3-input" id="password" onkeyup = "passcount()" value ="<?php echo $pass; ?>" name="password" type="password">
			<span id = "hint1">Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input class="w3-input" id="confirm_password" onkeyup= "passcheck()" value ="<?php echo $pass; ?>" name="confirm_password" type="password">
			<span id = "hint2">Your passwords do not match</span>
        </p>
        <center>
		<p>
            <input type="submit" value=" UPDATE PROFILE " id="submit">
            <input type="hidden" name="uid" value = "<?php echo $uid; ?>">
		</p></center>
	</form>
<?php require 'footer.php'; ?>
</body>
</html>
<script type="text/javascript" src="javascript/Regist.js"></script>     