<?php
//insert.php;

require 'connect.php';
$connect = mysqli_connect("localhost", "admin", "1234", "prodata");  
 $number = count($_POST['num']);  
 $report = '';
 $sqlm = array();
 $qtyr = array();
 $break = false;
 if($number >= 0)  
 {  
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
      for($count=0; $count<$number; $count++)  
      {  
        $order_number = $_POST['order_number'][$count];
        $atype = $_POST['atype'][$count];
        $assettype = $_POST['assettype'][$count];
        $type = $_POST['type'][$count];
        $asset_ID = $_POST['asset_ID'][$count];
        $asset_Set = $_POST['asset_Set'][$count];
        $assetid = $_POST['assetid'][$count];
        $asset_name =  $_POST['asset_name'][$count];
        $property = $_POST['property'][$count];
        $model = $_POST['model'][$count];
        $aslo = $_POST['aslo'][$count];
        $assetloca = $_POST['assetloca'][$count];
        $asloc = $_POST['asloc'][$count];
        $voption = $_POST['voption'][$count];
        $asven = $_POST['asven'][$count];
        $vendor_company = $_POST['vendor_company'][$count];
        $vendor_location = $_POST['vendor_location'][$count];
        $vendor_tel = $_POST['vendor_tel'][$count];
        $fax = $_POST['fax'][$count];
        $gmet = $_POST['getmet'][$count];
        $year = $_POST['year'][$count];
        $els = $_POST['els'][$count];
        $qty = $_POST['quantity'][$count];
        $price = $_POST['price'][$count];
        $res = $_POST['res'][$count];
        $resid = $_POST['resid'][$count];        
        $resfname = $_POST['resfname'][$count];
        $reslname = $_POST['reslname'][$count];
        $rm = $_POST['rm'][$count];
        $rmid = $_POST['rmid'][$count];
        $rmname = $_POST['rmname'][$count];
        $asset_order = $_POST['asset_order'][$count];
        $note = $_POST['note'][$count];
        $dstat_ID = $_POST['dstat_ID'][$count];
    
    
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
                   
            
            echo "'".$NO."','".$order_number."','".$asset_ID."/".$asset_Set.".".$qty." ".$assetid."','".$asset_Set."','".$asset_Set.".".$qty."','".$asset_name."','".$model."','".$asset_order."','".$property."','".$assetloca."','".$rmid."'.'".$resid."','".$asven."','".$assettype."','1','".$price."','1','".$get."','".$note."','".$dstat_ID."'";
            
           if($gmet == 2 && ($year  == '' || $year == null )){
            $report .= 'asset number '.$count.' กรุณาเติมปีงบประมาณ '; $break = true; break;
            }
            else if($gmet == 9 && ($els == '' || $els == null )){
            $report .= 'asset number '.$count.' กรุณาระบุวิธีการอื่นๆที่ได้รับ '; $break = true; break;
            }else if($break == false){

                $c = 1;
                while($c <= $qty){
                    array_push($sqlm,"INSERT INTO `asset`(`No`, `order_number`, `asset_ID`, `asset_Set`, `asset_number`, `asset_name`, `model`, `asset_order`, `property`, `asset_location_ID`, `room_ID`, `resper_ID`, `vendor_ID`, `asset_type_ID`, `quantity`, `price_per_qty`, `asset_stat_ID`, `get_method`, `note`, `dstat_ID`) VALUES 
                    ('".$NO."','".$order_number."','".$asset_ID."/".$asset_Set.".".$c." ".$assetid."','".$asset_Set."','".$asset_Set.".".$c."','".$asset_name."','".$model."','".$asset_order."','".$property."','".$assetloca."','".$rmid."','".$resid."','".$asven."','".$assettype."','1','".$price."','1','".$get."','".$note."','".$dstat_ID."')"); 
                    $c++;
                }
                        
            
            }

            
            //header('Location: ' . $_SERVER['HTTP_REFERER']);
            

              /*  
              $sql= "INSERT INTO `asset`(`No`, `order_number`, `asset_ID`, `asset_Set`, `asset_number`, `asset_name`, `model`, `asset_order`, `property`, `asset_location_ID`, `room_ID`, `resper_ID`, `vendor_ID`, `asset_type_ID`, `quantity`, `price_per_qty`, `asset_stat_ID`, `get_method`, `note`, `dstat_ID`) VALUES 
                ('".mysqli_real_escape_string($connect,$NO)."','".mysqli_real_escape_string($connect,$order_number)."','".mysqli_real_escape_string($connect,$asset_ID)."/".mysqli_real_escape_string($connect,$asset_Set).".".mysqli_real_escape_string($connect,$i)." ".mysqli_real_escape_string($connect,$assetid)."','".mysqli_real_escape_string($connect,$asset_Set)."','".mysqli_real_escape_string($connect,$asset_Set).".".mysqli_real_escape_string($connect,$i)."','".mysqli_real_escape_string($connect,$asset_name)."','".mysqli_real_escape_string($connect,$model)."','".mysqli_real_escape_string($connect,$asset_order)."','".mysqli_real_escape_string($connect,$property)."','".mysqli_real_escape_string($connect,$assetloca)."','".mysqli_real_escape_string($connect,$rmid)."','".mysqli_real_escape_string($connect,$resid)."','".mysqli_real_escape_string($connect,$asven)."','".mysqli_real_escape_string($connect,$assettype)."','1','".mysqli_real_escape_string($connect,$price)."','1','".mysqli_real_escape_string($connect,$get)."','".mysqli_real_escape_string($connect,$note)."','".mysqli_real_escape_string($connect,$dstat_ID)."')";           
                mysqli_query($connect, $sql);  
              $sql = "INSERT INTO `asset`(`No`, `order_number`, `asset_ID`, `asset_Set`, `asset_number`, `asset_name`, `model`, `asset_order`, `property`, `asset_location_ID`, `room_ID`, `resper_ID`, `vendor_ID`, `asset_type_ID`, `quantity`, `price_per_qty`, `asset_stat_ID`, `get_method`, `note`, `dstat_ID`) VALUES
                ('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";  
                mysqli_query($connect, $sql);  */
           }
           if ($break == false){ 
           for ($i = 0; $i < count($sqlm); $i++) {
            
               // mysqli_query($connect, $sqlm[$i]);
                $sqlq= $sqlm[$i];          
                if ($conn->query($sqlq) == TRUE) {                     

                }
            
       echo $sqlm[$i];
        }
    }
      } 
    
       

      echo var_dump($number);
      echo "Data Inserted";  /*
      echo $_POST['asset_name'];
      echo $_POST['num'];
      var_dump($_POST['num']);
      var_dump($_POST['asset_name']);
  */


?>