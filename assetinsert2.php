<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
      require 'connect.php';
        $order_number = $_POST['order_number'];
        $atype = $_POST['atype'];
        $assettype = $_POST['assettype'];
        $type = $_POST['type'];
        $asset_ID = $_POST['asset_ID'];
        $asset_Set = $_POST['asset_Set'];
        $assetid = $_POST['assetid'];
        $asset_name =  $_POST['asset_name'];
        $property = $_POST['property'];
        $model = $_POST['model'];
        $aslo = $_POST['aslo'];
        $assetloca = $_POST['assetloca'];
        $asloc = $_POST['asloc'];
        $voption = $_POST['voption'];
        $asven = $_POST['asven'];
        $vendor_company = $_POST['vendor_company'];
        $vendor_location = $_POST['vendor_location'];
        $vendor_tel = $_POST['vendor_tel'];
        $fax = $_POST['fax'];
        $gmet = $_POST['gmet'];
        $year = $_POST['year'];
        $els = $_POST['els'];
        $qty = $_POST['quantity'];
        $price = $_POST['price'];
        $res = $_POST['res'];
        $resid = $_POST['resid'];        
        $resfname = $_POST['resfname'];
        $reslname = $_POST['reslname'];
        $rm = $_POST['rm'];
        $rmid = $_POST['rmid'];
        $rmname = $_POST['rmname'];
        $asset_order = $_POST['asset_order'];
        $note = $_POST['note'];
        $dstat_ID = $_POST['dstat_ID'];


        $tid = 0;
        $lid = 0;
        $vid = 0;
        $get = "" ; 
    
        if($atype == 2)
            {
                $sql= "INSERT INTO assettype ( asset_type_name ) VALUES ('".$type."')";           
                if ($conn->query($sql) == TRUE) {
                    $sql = "SELECT asset_type_ID FROM assettype WHERE asset_type_name = '".$type."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $assettype = $row['asset_type_ID'];
                    }
                    }

    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            if($aslo == 2)
            {
                $sql= "INSERT INTO asset_location ( asset_location ) VALUES ('".$asloc."')";           
                if ($conn->query($sql) == TRUE) {
                    $sql = "SELECT asset_location_ID FROM asset_loction WHERE asset_location = '".$asloc."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $assetloca = $row['asset_location_ID'];
                    }
                    }

    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            if($voption == 2)
            {
                $sql= "INSERT INTO vendor ( vendor_company , vendor_location , vendor_tel , fax ) VALUES ('".$vendor_company."','".$vendor_location."','".$vendor_tel."','".$fax."')";           
                if ($conn->query($sql) == TRUE) {
                    $sql = "SELECT vendor_ID FROM vendor WHERE vendor_company = '".$vendor_company."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $asven = $row['vendor_ID'];
                    }
                    }

    
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            if($rm == 2)
            {
                $sql = "INSERT INTO room ( room ) VALUE ( '".$rmname."' )";
                if ($conn->query($sql) == TRUE) {
                    $sql = "SELECT room_ID FROM room WHERE room = '".$rmname."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $rmid = $row['room_ID'];
                    }
                }
            }
            }
            if($res == 2)
            {
                $sql = "INSERT INTO respon_per ( resper_firstname , resper_lastname ) VALUE ( '".$resfname."','".$reslname."' )";
                if ($conn->query($sql) == TRUE) {
                    $sql = "SELECT 	resper_ID FROM  respon_per WHERE resper_firstname = '".$resfname."' and resper_lastname = '".$reslname."' " ;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $rmid = $row['resper_ID'];
                    }
                }
            }
            }

            $sql = "SELECT method FROM getmethod WHERE getMethod_ID = '".$gmet."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($gmet == 2){
                        $get = $row['method']." ".$year;
                        }
                        else if($gmet == 9)
                        {$get = $els; }
                        else{ $get = $row['method']; }
                    }
                    }
                    $NO = 0;
            $sql = "SELECT MAX(No) FROM asset";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['MAX(No)']==NULL)
                    { $NO = 1;}
                else if ($row['MAX(No)']!=NULL){ $NO = $row['MAX(No)'] + 1; }
            }
            }
            
            echo "'".$NO."','".$order_number."','".$asset_ID."/".$asset_Set.".".$qty." ".$assetid."','".$asset_Set."','".$asset_Set.".".$qty."','".$asset_name."','".$model."','".$asset_order."','".$property."','".$assetloca."','".$rmid."'.'".$resid."','".$asven."','".$assettype."','1','".$price."','1','".$get."','".$note."','".$dstat_ID."'";
            
            /*for($i = 1 ; $i <= $qty ; $i++)
            {}*/
            $i = 1;
            while($i <= $qty){
                $sql= "INSERT INTO `asset`(`No`, `order_number`, `asset_ID`, `asset_Set`, `asset_number`, `asset_name`, `model`, `asset_order`, `property`, `asset_location_ID`, `room_ID`, `resper_ID`, `vendor_ID`, `asset_type_ID`, `quantity`, `price_per_qty`, `asset_stat_ID`, `get_method`, `note`, `dstat_ID`) VALUES 
                ('".$NO."','".$order_number."','".$asset_ID."/".$asset_Set.".".$i." ".$assetid."','".$asset_Set."','".$asset_Set.".".$i."','".$asset_name."','".$model."','".$asset_order."','".$property."','".$assetloca."','".$rmid."','".$resid."','".$asven."','".$assettype."','1','".$price."','1','".$get."','".$note."','".$dstat_ID."')";           
                if ($conn->query($sql) == TRUE) {                     

                }
                $i++;
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            

        ?>

</body>
</html>