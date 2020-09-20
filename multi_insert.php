<?php
//insert.php;
SESSION_START();
require 'connect.php';
$connect = mysqli_connect("localhost", "admin", "1234", "prodata");  
 $numberss = count($_POST['num']); 
 $sqlm = array();
 $qtyr = array();
 $idA = array();
 $idB = array();
 $a = array();
 $break = false;
 if($numberss >= 0)  
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
      for($count=0; $count<$numberss; $count++)  
      {  
        $order_number = $_POST['on'][$count];
        $adate = $_POST['addin_date'][$count];//วัน
        //$atype = $_POST['atype'][$count];
        $assettype = $_POST['assettype'][$count];//ดรอปดาวประเภท
        $type = $_POST['type'][$count];//อินพุตประเภทใหม่
        $asset_ID = $_POST['asset_ID'][$count];//รหัสครุภัณฑ์1
        $asset_Set = $_POST['asset_Set'][$count];//รหัสครุภัณฑ์2
        $assetid = $_POST['assetid'][$count];//รหัสครุภัณฑ์3
        $asset_name =  $_POST['asset_name'][$count];//ชื่อชุดครุภัณฑ์
        $aset_name = $_POST['asset_setname'][$count];//ชื่อครุภัรฑ์
        $anick_name = $_POST['asset_nickname'][$count];//ชื่อเรียกครุภัณฑ์
        $property = $_POST['property'][$count];//คุณลักษณะ
        $model = $_POST['model'][$count];//รุ่นแบบ
        //$aslo = $_POST['aslo'][$count];
        $assetloca = 1;//คณะ
        //$asloc = $_POST['asloc'][$count];
        //$voption = $_POST['voption'][$count];
        $asven = $_POST['asven'][$count];//ดรอปดาวผู้ขาย
        $vendor_company = $_POST['vendor_company'][$count];//เพิ่มผข
        $vendor_location = $_POST['vendor_location'][$count];//เพิ่มผข
        $vendor_tel = $_POST['vendor_tel'][$count];//เพิ่มผข
        $fax = $_POST['fax'][$count];//เพิ่มผข
        $gett = $_POST['get'][$count];//เรดิโอ วิธีการได้รับ
        $gmet = $_POST['getmet'][$count];//ดรอปดาววิธีการได้รับ
        $year = $_POST['incomeyrd'][$count];
        $els = $_POST['els'][$count];
        $qty = $_POST['quantity'][$count];//จำนวนครุภัณฑ์
        $price = $_POST['price'][$count];
        //$res = $_POST['res'][$count];
        $resid = $_POST['resid'][$count];//ดรอปดาวชื่อผู้รับผิดชอบ        
        $resfname = $_POST['resfname'][$count];//อินพุตชื่อผู้รับผิดชอบใหม่
        $reslname = $_POST['reslname'][$count];//อินพุตนามสกุลผู้รับผิดชอบใหม่
        //$rm = $_POST['rm'][$count];
        $rmid = $_POST['rmid'][$count];//ดรอปดาวห้องจัดเก็บ
        $rmname = $_POST['rmname'][$count];//ห้องเพิ่มใหม่
        $asset_order = $_POST['asset_order'][$count];//หมายเลขทะเบียน
        $note = $_POST['note'][$count];//หมายเหตุ
        $dstat_ID = $_POST['dstat_ID'][$count];//ดรอปดาวลักษณะการติดตั้ง
        $dtype = $_POST['dtype'][$count];//ลักษณะการติดตั้งที่เพิ่มใหม่
        $setof = $_POST['setof'][$count];
        $runnumber = $_POST['runnumber'][$count];
        echo($runnumber);
        var_dump($_POST['runnumber']);
        echo '<br> setof: '.$setof;
        echo '<br> runnumber :'.$runnumber;
        

        $get = "" ; 
    
        if($assettype == 0)
            {
                $tpe = str_replace(' ', '', $type);
                if($tpe!=""){
                     $sql= "INSERT INTO assettype (  asset_type_name ) VALUES ( '".$type."')";           
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
                }else{
                    $sql= "INSERT INTO assettype ( asset_type_name ) VALUES ('ค่าว่าง')";           
                    if ($conn->query($sql) == TRUE) {
                        $sql = "SELECT asset_type_ID FROM assettype WHERE asset_type_name = 'ค่าว่าง'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $assettype = $row['asset_type_ID'];
                        }
                        }
        
        
                    } else {
                        $sql = "SELECT asset_type_ID FROM assettype WHERE asset_type_name = 'ค่าว่าง'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $assettype = $row['asset_type_ID'];
                        }
                        }
                    }
                }
                
               
            }
            else {
                $assettype = $_POST['assettype'][$count];
            }
            
            if($dstat_ID == 0)
                {
                    $dtp = str_replace(' ', '', $dtype);
                    if($dtp!=""){
                        $sql = "INSERT INTO deploy_stat (  dstat ) VALUES ('".$dtype."')"; 
                    if ($conn->query($sql) == TRUE) {
                        $sql = "SELECT dstat_ID FROM deplpoy_stat WHERE dstat = '".$dtype."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $dstat_ID = $row['dstat_ID'];
                        }
                        }
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    }else{
                        $sql = "INSERT INTO deploy_stat (  dstat ) VALUES ('ค่าว่าง')"; 
                    if ($conn->query($sql) == TRUE) {
                        $sql = "SELECT dstat_ID FROM deplpoy_stat WHERE dstat = 'ค่าว่าง'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $dstat_ID = $row['dstat_ID'];
                        }
                        }
                    } else {
                        $sql = "SELECT dstat_ID FROM deplpoy_stat WHERE dstat = 'ค่าว่าง'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $dstat_ID = $row['dstat_ID'];
                        }
                        }
                    }
                    }
                    
                }
            else {
                $dstat_ID = $_POST['dstat_ID'][$count];
            }


            if($asven == 0)
            {
                $vdc = str_replace(' ', '', $vendor_company);
                $vdl = str_replace(' ', '', $vendor_location);
                if($vdc != "" &&  $vdl != "" ){
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
                else{
                    $sql= "INSERT INTO vendor ( vendor_company , vendor_location , vendor_tel , fax ) VALUES ('ค่าว่าง','ค่าว่าง','ค่าว่าง','ค่าว่าง')";           
                if ($conn->query($sql) == TRUE) {
                    $sql = "SELECT vendor_ID FROM vendor WHERE vendor_company = 'ค่าว่าง'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $asven = $row['vendor_ID'];
                    }
                    }
    
    
                } else {
                    $sql = "SELECT vendor_ID FROM vendor WHERE vendor_company = 'ค่าว่าง'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $asven = $row['vendor_ID'];
                    }
                    }
                }
                }
                
            }else{
                $asven = $_POST['asven'][$count];
            }

            if($rmid == 0)
            {
                $rmn = str_replace(' ', '', $rmname);
                if($rmn != ""){
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
                else{
                    $sql = "INSERT INTO room ( room ) VALUE ( 'ค่าว่าง' )";
                    if ($conn->query($sql) == TRUE) {
                        $sql = "SELECT room_ID FROM room WHERE room = 'ค่าว่าง'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $rmid = $row['room_ID'];
                        }
                    }
                }
                else{
                    $sql = "SELECT room_ID FROM room WHERE room = 'ค่าว่าง'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $rmid = $row['room_ID'];
                        }
                    }
                }
                }
               
            }else{
                $rmid = $_POST['rmid'][$count];
            }

            if($resid == 0)
            {
                $rf = str_replace(' ', '', $resfname);
                $rl = str_replace(' ', '', $reslname);
                if($rf != "" && $rl != ""){
                    $sql = "INSERT INTO respon_per ( resper_firstname , resper_lastname ) VALUE ( '".$resfname."','".$reslname."' )";
                if ($conn->query($sql) == TRUE) {
                    $sql = "SELECT 	resper_ID FROM  respon_per WHERE resper_firstname = '".$resfname."' and resper_lastname = '".$reslname."' " ;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $resid = $row['resper_ID'];
                    }
                }
            }
                }
                else{
                    $sql = "INSERT INTO respon_per ( resper_firstname , resper_lastname ) VALUE ( 'ค่าว่าง','ค่าว่าง' )";
                    if ($conn->query($sql) == TRUE) {
                        $sql = "SELECT 	resper_ID FROM  respon_per WHERE resper_firstname = 'ค่าว่าง' and resper_lastname = 'ค่าว่าง' " ;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $resid = $row['resper_ID'];
                        }
                    }
                }else{
                    $sql = "SELECT 	resper_ID FROM  respon_per WHERE resper_firstname = 'ค่าว่าง' and resper_lastname = 'ค่าว่าง' " ;
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $resid = $row['resper_ID'];
                        }
                    }
                }

                }
                
            }else {
                $resid = $_POST['resid'][$count];
            }

            if($gett == 2 || $gett == 4){
                $sql = "SELECT money_type FROM money_type WHERE mid = '".$gett."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($gmet == 2){
                        $get = $row['money_type']." ".$year;
                        }
                        else if($gmet == 9)
                        {$get = "อื่นๆ : ".$els; }
                        else{ $get = $row['money_type']; }
                    }
                    }
                
            }

            if($gmet != 0){
            
                    $gmet = $_POST['getmet'][$count];
                }
            else{
                $gmet = 10;

            }
            //echo "'".$NO."','".$order_number."','".$asset_ID."/".$asset_Set.".".$qty." ".$assetid."','".$asset_Set."','".$asset_Set.".".$qty."','".$asset_name."','".$model."','".$asset_order."','".$property."','".$assetloca."','".$rmid."'.'".$resid."','".$asven."','".$assettype."','1','".$price."','1','".$get."','".$note."','".$dstat_ID."'";
            
          
                if($setof == "more"){
                    if($runnumber == "defaultex"){
                        $c = 1;
                         while($c <= $qty){
                            $datestring = date("d/m/Y", strtotime($adate));
                            array_push($sqlm,"INSERT INTO `asset`(`No`, `order_number`, `asset_ID`, `asset_Set`, `asset_number`, `asset_name`,`asset_setname`,`asset_nickname`, `model`, `asset_order`, `property`,`addin_date`, `asset_location_ID`, `room_ID`, `resper_ID`, `vendor_ID`, `asset_type_ID`, `quantity`, `price_per_qty`, `mid`, `getMethod_ID`,`getm`, `note`, `dstat_ID`) VALUES 
                            ('".$NO."','".$order_number."','".$asset_ID."/".$asset_Set.".".$c." ".$assetid."','".$asset_Set."','".$asset_Set.".".$c."','".$asset_name."','".$aset_name."','".$anick_name."','".$model."','".$asset_order."','".$property."','".$datestring."','".$assetloca."','".$rmid."','".$resid."','".$asven."','".$assettype."','1','".$price."','".$gett."','".$gmet."','".$get."','".$note."','".$dstat_ID."')"); 
                            array_push($a,"$asset_Set".".$c");
                            $c++;
                        }

                    }
                    else if($runnumber == "notdefaultex"){
                        $c = 1;
                         while($c <= $qty){
                             $asidas = 'asset_ID'.''.($count+1).'';
                             $asas = 'asset_Set'.''.($count+1).'';
                             $asn = 'asset_n'.''.($count+1).'';
                             $asidid = 'assetid'.''.($count+1).'';
                             echo $asidas.'<br>';
                             $p1 = $_POST[$asidas][$c-1];
                             $p2 = $_POST[$asas][$c-1];
                             $p3 = $_POST[$asn][$c-1];
                             $p4 = $_POST[$asidid][$c-1];
                             echo $p1;
                            $datestring = date("d/m/Y", strtotime($adate));
                            array_push($sqlm,"INSERT INTO `asset`(`No`, `order_number`, `asset_ID`, `asset_Set`, `asset_number`, `asset_name`,`asset_setname`,`asset_nickname`, `model`, `asset_order`, `property`,`addin_date`, `asset_location_ID`, `room_ID`, `resper_ID`, `vendor_ID`, `asset_type_ID`, `quantity`, `price_per_qty`, `mid`, `getMethod_ID`,`getm`, `note`, `dstat_ID`) VALUES 
                            ('".$NO."','".$order_number."','".$p1."/".$p2.".".$p3." ".$p4."','".$p2."','".$p2.".".$p3."','".$asset_name."','".$aset_name."','".$anick_name."','".$model."','".$asset_order."','".$property."','".$datestring."','".$assetloca."','".$rmid."','".$resid."','".$asven."','".$assettype."','1','".$price."','".$gett."','".$gmet."','".$get."','".$note."','".$dstat_ID."')"); 
                            array_push($a,"$p2".".$p3");
                            $c++;
                        }

                    }

                }
                else if($setof == "one"){
                        $c = 1;
                         while($c <= $qty){
                            $asidas = 'asset_ID'.''.($count+1).'';
                            $asas = 'asset_Set'.''.($count+1).'';
                            $asidid = 'assetid'.''.($count+1).'';
                            echo '<br> asset_ID :'.$asidas;
                            $p1 = $_POST[$asidas][$c-1];
                            $p2 = $_POST[$asas][$c-1];
                            $p4 = $_POST[$asidid][$c-1];
                            echo '<br> r : '.$p1;
                            $datestring = date("d/m/Y", strtotime($adate));
                            $de = explode("/",$datestring);
                            $datestring = $de[0]."/".$de[1]."/".($de[2]+543);
                            array_push($sqlm,"INSERT INTO `asset`(`No`, `order_number`, `asset_ID`, `asset_Set`, `asset_number`, `asset_name`,`asset_setname`,`asset_nickname`, `model`, `asset_order`, `property`,`addin_date`, `asset_location_ID`, `room_ID`, `resper_ID`, `vendor_ID`, `asset_type_ID`, `quantity`, `price_per_qty`, `mid`, `getMethod_ID`,`getm`, `note`, `dstat_ID`) VALUES 
                            ('".$NO."','".$order_number."','".$p1."/".$p2." ".$p4."','".$p2."','".$p2."','".$asset_name."','".$aset_name."','".$anick_name."','".$model."','".$asset_order."','".$property."','".$datestring."','".$assetloca."','".$rmid."','".$resid."','".$asven."','".$assettype."','1','".$price."','".$gett."','".$gmet."','".$get."','".$note."','".$dstat_ID."')"); 
                            array_push($a,"$p2");
                            $c++;
                         }


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
          //print_r($sqlm);
          
           for ($i = 0; $i < count($sqlm); $i++) {
            
               // mysqli_query($connect, $sqlm[$i]);
                $sqlq = $sqlm[$i];          
                if ($conn->query($sqlq) == TRUE) {                     
            
            //echo $sqlm[$i];
            }
        }
       // echo count($sqlm);
        //print_r($a);
        //echo "count : a :".count($a);
        for($x = 0; $x< count($a); $x++){
            $q = $a[$x];
            $sqlst = "SELECT * FROM asset WHERE asset_number = $q";
            $result = $conn->query($sqlst);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $assetnum = $row['id'];
                array_push($idA,$assetnum);
                $sqlsta = "INSERT INTO `asset_stat_overview`( `id`, `asset_stat_ID`) VALUES('".$assetnum."',1)";
                if ($conn->query($sqlsta) == TRUE) {
                //echo $sqlsta;
                }
            }
        }

        }
    
    $count_re = $_POST['count_re'];
    for($h = 0 ; $h <= $count_re; $h++)
    {
    $date = $_POST['report_date'][$h];
    $report_NO = $_POST['report_NO'][$h];
    $report_order = $_POST['report_order'][$h];
    $unit = $_POST['unit'][$h];
    $price_per_unit = $_POST['price_per_unit'][$h];
    $summary = $_POST['summary'][$h];
    $life_time = $_POST['life_time'][$h];
    $Depreciation_rate = $_POST['Depreciation_rate'][$h];
    $year_Depreciation = $_POST['year_Depreciation'][$h];
    $sum_Depreciation = $_POST['sum_Depreciation'][$h];
    $net_value = $_POST['net_value'][$h];
    $Change_order = $_POST['Change_order'][$h];
    $report_number = $_POST['report_number'][$h];
    $t = time();
    $sql = "INSERT INTO `asset_report`( `date`,`time_now`, `report_NO`, `report_order`, `unit`, `price_per_unit`, `summary`, `life_time`, `Depreciation_rate`, `year_Depreciation`, `sum_Depreciation`, `net_value`, `Change_order`, `report_number`) VALUES ('".$date."','".$t.$h."','".$report_NO."','".$report_order."','".$unit."','".$price_per_unit."','".$summary."','".$life_time."','".$Depreciation_rate."','".$year_Depreciation."','".$sum_Depreciation."','".$net_value."','".$Change_order."','".$report_number."')";
    if ($conn->query($sql) == TRUE) {
           $sql = "SELECT aid FROM asset_report WHERE time_now = '".$t.$h."'" ;
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $repid = $row['aid'];
            array_push($idB,$repid);
            }
           }
        
        }
  
    }
    //print_r($idA);
    //print_r($idB);
    //print_r($sqlm);


    for($i = 0 ; $i <count($idA); $i++){
        for($z = 0 ; $z <count($idB) ; $z++){
            $sqll = "INSERT INTO `asset_report_text`( `id`, `aid`) VALUES ('".$idA[$i]."','".$idB[$z]."')";
            if ($conn->query($sqll) == TRUE) {
            //echo $sqll;
            }

        }

    }
    //echo "number".count($_POST['num']);
    //echo "a".count($a);
    //echo " ".$idA;
    //echo " ".$idB;
    //echo count($sqlm);






       

      //echo var_dump($number);
      //echo "Data Inserted";
      //print_r($a);
      //echo $sqlst;
      //echo $sqlsta;
      header('Location: assetmanage.php');
      /*
      echo $_POST['asset_name'];
      echo $_POST['num'];
      var_dump($_POST['num']);
      var_dump($_POST['asset_name']);
  */


?>