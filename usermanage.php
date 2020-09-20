<?php 
SESSION_START();
require_once ('Log.class.php');
$Fuction = "";
if(isset($_GET['function'])){
    $Fuction = $_GET['function'];
}
$Option = "";
if(isset($_POST['function'])){
    $Option = $_POST['function'];
}

if($Fuction == 1||$Option ==1){
    useractive();
}
else if($Fuction == 2||$Option ==2){
    userinsert();
}
else if($Fuction == 3||$Option ==3){
    userdel();
}
else if($Fuction == 4||$Option ==4){
    usblock();
}
else if($Fuction == 5||$Option ==5){
    RoleUp();
}
else if($Fuction == 6||$Option ==6){
    RoleDown();
}

function RoleUp(){
    require 'connect.php';
    $ID = $_GET['ID'];
    $sql = "UPDATE `userdata` SET `profile_ID`= 1 , last_update = (SELECT DATE_FORMAT(NOW(),'%d/%m/%y : %H:%i')) WHERE ID= ".$ID." ";
    if ($conn->query($sql) === TRUE) {  
        $sql = "SELECT * From userdata WHERE ID = ".$ID."";
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $name = $row['givenName']." ".$row['familyName'];
                $log = new Log();
                $log->Write('log/test.txt','#### '.date("l jS \of F Y h:i:s A").' ####');
                $log->Write('log/test.txt','#### Account : '.$_SESSION['Account'].' ####');
                $log->Write('log/test.txt','#### Action : RoleUp to Admin : '.$name.' ####');
                $log->Write('log/test.txt','-----------------------------------------------------------------------------');
                header("location: AccountManage.php");
        }
    }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function RoleDown(){
    require 'connect.php';
    $sql = "UPDATE `userdata` SET `profile_ID`= 2 , last_update = (SELECT DATE_FORMAT(NOW(),'%d/%m/%y : %H:%i')) WHERE ID= ".$_GET['ID']." ";
    if ($conn->query($sql) === TRUE) {  
        $ID = $_GET['ID'];
        $sql = "SELECT * From userdata WHERE ID = ".$ID."";
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $name = $row['givenName']." ".$row['familyName'];
                $log = new Log();
                $log->Write('log/test.txt','#### '.date("l jS \of F Y h:i:s A").' ####');
                $log->Write('log/test.txt','#### Account : '.$_SESSION['Account'].' ####');
                $log->Write('log/test.txt','#### Action : RoleDown to NormalUser : '.$name.' ####');
                $log->Write('log/test.txt','-----------------------------------------------------------------------------');
                header("location: AccountManage.php");
        }
    }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function useractive(){
    require 'connect.php';
    $sql = "UPDATE `userdata` SET `ID_stat`= 1 , last_update = (SELECT DATE_FORMAT(NOW(),'%d/%m/%y : %H:%i')) WHERE ID= ".$_GET['ID']." ";
    if ($conn->query($sql) === TRUE) {  
        $ID = $_GET['ID'];
        $sql = "SELECT * From userdata WHERE ID = ".$ID."";
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $name = $row['givenName']." ".$row['familyName'];
                $log = new Log();
                $log->Write('log/test.txt','#### '.date("l jS \of F Y h:i:s A").' ####');
                $log->Write('log/test.txt','#### Account : '.$_SESSION['Account'].' ####');
                $log->Write('log/test.txt','#### Action : Set User_stat to Normal : '.$name.' ####');
                $log->Write('log/test.txt','-----------------------------------------------------------------------------');
                header("location: AccountManage.php");
        }
    }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
function userinsert(){
    require 'connect.php';
    $name = $_POST['fname']." ".$_POST['lname']; 
    $sqla = "INSERT INTO `userdata`(`givenName`, `familyName`, `name`, `email`,`username`,`password`, last_update , `profile_ID`, ID_stat) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$name."','".$_POST['email']."','".$_POST['username']."','".$_POST['pass']."',(SELECT DATE_FORMAT(NOW(),'%d/%m/%y : %H:%i')),'".$_POST['Type']."','1')";
    if ($conn->query($sqla) === TRUE) {
        $log = new Log();
        $log->Write('log/test.txt','#### '.date("l jS \of F Y h:i:s A").' ####');
        $log->Write('log/test.txt','#### Account : '.$_SESSION['Account'].' ####');
        $log->Write('log/test.txt','#### Action : insert new user : '.$name.' ####');
        $log->Write('log/test.txt','-----------------------------------------------------------------------------');
        //echo $log->Read('test.txt');
        header("location: Accountmanage.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function userdel(){
    require 'connect.php';
    $sql = "SELECT * FROM userdata WHERE ID= ".$_POST['ID']."";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['profile_ID'] == 2){
                $sql = "DELETE FROM userdata WHERE ID = ".$_POST['ID']." ";
                if ($conn->query($sql) === TRUE) {
        
                    echo "PASS";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }else{
                echo "no";
            }
        }   
    }
}
function usblock(){
    require 'connect.php';
    $sql = "SELECT * FROM userdata WHERE ID= ".$_GET['ID']."";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['profile_ID'] == 2){
                $sql = "UPDATE `userdata` SET `ID_stat`= 2 , last_update = (SELECT DATE_FORMAT(NOW(),'%d/%m/%y : %H:%i')) WHERE ID= ".$_GET['ID']." ";
                    if ($conn->query($sql) === TRUE) {
                        $ID = $_GET['ID'];
                        $sql = "SELECT * From userdata WHERE ID = ".$ID."";
                        $result = $conn->query($sql); 
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $name = $row['givenName']." ".$row['familyName'];
                                $log = new Log();
                                $log->Write('log/test.txt','#### '.date("l jS \of F Y h:i:s A").' ####');
                                $log->Write('log/test.txt','#### Account : '.$_SESSION['Account'].' ####');
                                $log->Write('log/test.txt','#### Action : Set User_stat to Deleted : '.$name.' ####');
                                $log->Write('log/test.txt','-----------------------------------------------------------------------------');
                                echo "PASS";
                        }
                    }
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            } else{
                echo "no";
            }
        }
    }
    
}
?>