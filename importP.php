<?php

//import.php

include 'Excel_v/vendor/autoload.php'; /* เรียกใช้ lib */

require 'connect.php';
$connn = new PDO("mysql:host=localhost;dbname=prodata", "admin", "1234");
if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);

  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();
  $Aloop = false;
  $Bloop = false;
  $tn = "";
    $repid = "";
  $NO = 0;
  $aslo = "";
  $rm = "";
  $resper ="";
  $vendor_ID ="";
  $astype ="";
  $mid = "";
  $getMethod_ID = "";
  $dstat_ID ="";
  $asset_set  = "";
  $astat = "";
  $asstat = "";
  $ddd = "";
  $idA = array();
  $idB = array();
  $a = array();
  $e = array();
  $dd = array();
  $setarr = array();
  $mindd = array();
  $setarr2 = array();
  $checkpoint= array();
  foreach($data as $row)
  {/*เก็บเป็นอาเรย์ ตามตำแหน่ง วนลูปตามจำนวนแถว */

    if(!$Aloop){
      $Aloop = true;
    }
    else{
      $setarr = [];
      $astat = "";
      $astat = $row[21];
      $group_price = $row[15];
      if($asset_set == ""){

        if(count(explode(',',$row[2])) > 1){
          $sql = "SELECT MAX(No) FROM asset";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          while($rows = $result->fetch_assoc()) {
          if($rows['MAX(No)']==NULL)
              { $NO = 1;}
          else if ($rows['MAX(No)']!=NULL){ $NO = $rows['MAX(No)'] + 1; }
          }
          }
      $aa = explode(',',$row[2]);
      for($v = 0; $v < count($aa); $v ++){
      if(count(explode('-',$aa[$v])) > 1){
          $k = explode('-',$aa[$v]);
          for($r = $k[0];$r <= $k[1]; $r++ ){
            array_push($setarr,$r);
          }
      }
      else{
      array_push($setarr,$aa[$v]);
      }
    }
    }else{
      if(count(explode('-',$row[2])) > 1){
        $sql = "SELECT MAX(No) FROM asset";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          while($rows = $result->fetch_assoc()) {
          if($rows['MAX(No)']==NULL)
              { $NO = 1;}
          else if ($rows['MAX(No)']!=NULL){ $NO = $rows['MAX(No)'] + 1; }
          }
          }
          $k = explode('-',$row[2]);
          for($r = $k[0];$r <= $k[1]; $r++ ){
            array_push($setarr,$r);
          }


      }
      else{
        $sql = "SELECT MAX(No) FROM asset";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
      while($rows = $result->fetch_assoc()) {
      if($rows['MAX(No)']==NULL)
          { $NO = 1;}
      else if ($rows['MAX(No)']!=NULL){ $NO = $rows['MAX(No)'] + 1; }
      }
      }
      $asset_set = $row[2];
      }
    }
    

      }else {
          if( $asset_set == $row[2]){

          }else if( $asset_set != $row[2] ){
            if(count(explode(',',$row[2])) > 1){
                  $sql = "SELECT MAX(No) FROM asset";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                  while($rows = $result->fetch_assoc()) {
                  if($rows['MAX(No)']==NULL)
                      { $NO = 1;}
                  else if ($rows['MAX(No)']!=NULL){ $NO = $rows['MAX(No)'] + 1; }
                  }
                  }
              $aa = explode(',',$row[2]);
              for($v = 0; $v < count($aa); $v ++){
              if(count(explode('-',$aa[$v])) > 1){
                  $k = explode('-',$aa[$v]);
                  for($r = $k[0];$r <= $k[1]; $r++ ){
                    array_push($setarr,$r);
                  }
              }
              else{
              array_push($setarr,$aa[$v]);
              }
            }
            }else{
              if(count(explode('-',$row[2])) > 1){
                $sql = "SELECT MAX(No) FROM asset";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                  while($rows = $result->fetch_assoc()) {
                  if($rows['MAX(No)']==NULL)
                      { $NO = 1;}
                  else if ($rows['MAX(No)']!=NULL){ $NO = $rows['MAX(No)'] + 1; }
                  }
                  }
                  $k = explode('-',$row[2]);
                  for($r = $k[0];$r <= $k[1]; $r++ ){
                    array_push($setarr,$r);
                  }


              }
              else{
                $sql = "SELECT MAX(No) FROM asset";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              while($rows = $result->fetch_assoc()) {
              if($rows['MAX(No)']==NULL)
                  { $NO = 1;}
              else if ($rows['MAX(No)']!=NULL){ $NO = $rows['MAX(No)'] + 1; }
              }
              }
              array_push($setarr,$row[2]);
              $asset_set = $row[2];
              }
            }
            

          }

      }
      $rm = $row[12];
      if($rm == "" || empty($rm) || $rm == "-"){
        $rmn = str_replace(' ', '', $rm);
        if($rmn == ""){
          $sql = "SELECT room_ID FROM room WHERE room like '%ยังไม่กำหนด%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                            $rm = $rows['room_ID'];
             }
            }

        }
      }else if($rm != ""){
        $rmn = str_replace(' ', '', $rm);
        $sql = "SELECT room_ID FROM room WHERE room = '".$rmn."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                            $rm = $rows['room_ID'];
                      }
                  }else {
                    
                    $sql = "INSERT INTO room ( room ) VALUE ( '".$rmn."' )";
                if ($conn->query($sql) == TRUE) {
                    $sql = "SELECT room_ID FROM room WHERE room = '".$rmn."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($rows = $result->fetch_assoc()) {
                      $rm = $rows['room_ID'];
                    }
                }
            }

                  }
      }

      $astype  = $row[13];
      if($astype == "" || empty($astype) || $astype == "-"){
        $astypen = str_replace(' ', '', $astype);
        if($astypen == ""){
          $sql = "SELECT * FROM `assettype` WHERE asset_type_name like '%ยังไม่กำหนด%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                            $astype = $rows['asset_type_ID'];
             }
            }

        }
      }else if($astype != ""){
        $astypen = str_replace(' ', '', $astype);
        $sql = "SELECT * FROM `assettype` WHERE asset_type_name like '%".$astypen."%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                            $astype = $rows['asset_type_ID'];
                      }
                  }else {

                    $sql= "INSERT INTO assettype (  asset_type_name ) VALUES ( '".$astypen."')";           
                    if ($conn->query($sql) == TRUE) {
                        $sql = "SELECT asset_type_ID FROM assettype WHERE asset_type_name = '".$astypen."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                          $astype = $rows['asset_type_ID'];
                        }
                        }
        
        
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                  }
      }

      $mid = $row[16];
      if($mid == "" || empty($mid)){
        $midn = str_replace(' ', '', $mid);
        if($midn == ""){
          $sql = "SELECT * FROM `money_type` WHERE money_type like '%ยังไม่กำหนด%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                            $mid = $rows['mid'];
             }
            }

        }
      }else if($mid != ""){
        $midn = str_replace(' ', '', $mid);
        $sql = "SELECT * FROM `money_type` WHERE money_type like '%".$midn."%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                            $mid = $rows['mid'];
                      }
                  }else {

                    $sql = "SELECT * FROM `money_type` WHERE money_type like '%ยังไม่กำหนด%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                            $mid = $rows['mid'];
             }
            }


                  }
      }

      $getMethod_ID = $row[17];

      if($getMethod_ID == "" || empty($getMethod_ID)){
        $getMethod_IDn = str_replace(' ', '', $getMethod_ID);
        if($getMethod_IDn == ""){
          $sql = "SELECT * FROM `getmethod` WHERE method like '%ยังไม่กำหนด%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                          $getMethod_ID = $rows['getMethod_ID'];
             }
            }

        }
      }else if($getMethod_ID != ""){
        $getMethod_IDn = str_replace(' ', '', $getMethod_ID);
        $sql = "SELECT * FROM `getmethod` WHERE method like '%".$getMethod_IDn."%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                          $getMethod_ID = $rows['getMethod_ID'];
                      }
                  }else {

                    $sql = "SELECT * FROM `getmethod` WHERE method like '%ยังไม่กำหนด%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                          $getMethod_ID = $rows['getMethod_ID'];
             }
            }
           }
      }
      
      $dstat_ID = $row[20];
      if($dstat_ID == "" || empty($dstat_ID)){
        $dstat_IDn = str_replace(' ', '', $dstat_ID);
        if($dstat_IDn == ""){
          $sql = "SELECT * FROM `deploy_stat` WHERE dstat like '%ยังไม่กำหนด%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                          $dstat_ID = $rows['dstat_ID'];
             }
            }

        }
      }else if($dstat_ID != ""){
        $dstat_IDn = str_replace(' ', '', $dstat_ID);
        $sql = "SELECT * FROM `deploy_stat` WHERE dstat like '%".$dstat_IDn."%'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                          $dstat_ID = $rows['dstat_ID'];
                      }
                  }else {

                    $sql= "INSERT INTO deploy_stat (  dstat ) VALUES ( '".$dstat_IDn."')";           
                    if ($conn->query($sql) == TRUE) {
                        $sql = "SELECT * FROM deploy_stat WHERE dstat = '".$dstat_IDn."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                          $dstat_ID = $rows['dstat_ID'];
                        }
                        }
        
        
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                  }
      }

      if($astat == "" || empty($astat) || $astat == "-"){
        $astat = str_replace(' ', '', $astat);
        $sql = "SELECT * FROM assetstat WHERE asset_stat_name LIKE '%ใช้งานได้%'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
          while($rows = $result->fetch_assoc()) {
            $asstat  = $rows['asset_stat_ID'];
          }
        }
      }
      else if($astat != ""){
          $astat = str_replace(' ', '', $astat);
        $sql = "SELECT * FROM assetstat WHERE asset_stat_name LIKE '%".$astat."%'";
        $result = $conn->query($sql);
      if ($result->num_rows == 1) {

        while($rows = $result->fetch_assoc()) {
          $asstat = $rows['asset_stat_ID'];
        }
      }else{
        $sql = "SELECT * FROM assetstat WHERE asset_stat_name LIKE '%ใช้งานได้%'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {

          while($rows = $result->fetch_assoc()) {
            $asstat = $rows['asset_stat_ID'];
          }
        }
      }
      }

      $sql = "SELECT * FROM `respon_per` WHERE resper_firstname like '%ยังไม่กำหนด%'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
      while($rows = $result->fetch_assoc()) {
        $resper = $rows['resper_ID'];
}
}
$sql = "SELECT * FROM `vendor` WHERE vendor_company like '%ยังไม่กำหนด%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($rows = $result->fetch_assoc()) {
  $vendor = $rows['vendor_ID'];
}
}
$ddd = $row[11];
$ddd = str_replace(' ','',$ddd);
if($ddd == "-" || $ddd == ""){
  $ddd = date("d/m/Y");
}else{
  $ddd = $row[11];
}
$vt = $row[4];
$vt = str_replace(' ', '', $vt);
if($vt == "-" || $vt == ""){
$vt = "";
}else {
  $vt = $row[4];
}


$e = [];
if($row[3]=="" || empty($row[3]) || $row[3] == "-" || str_replace(' ','',$row[3]) == ""){

  for($b = 0 ; $b < count($setarr); $b++){
    array_push($a,$row[1]."/".$setarr[$b]." ".$vt);
    $insert_data = array(
      ':No'=> $NO,
      ':order_number'=> $row[0],
      ':asset_ID'=> $row[1]."/".$setarr[$b]." ".$vt,
      ':asset_Set'=> $setarr[$b],
      ':asset_number'=> $setarr[$b],
      ':asset_setname'=> $row[5],
      ':asset_nickname'=> $row[6],    
      ':asset_name'=> $row[7],    
      ':model'=> $row[8],
      ':asset_order'=> $row[9],
      ':property'=> $row[10],
      ':addin_date'=> $ddd,
      ':asset_location_ID'=> 1,
      ':room_ID'=> $rm,
      ':resper_ID'=> $resper,
      ':vendor_ID'=> $vendor,
      ':asset_type_ID'=> $astype,
      ':quantity'=> 1,
      ':price_per_qty' => $row[14],
      ':group_price' => $group_price,
      ':mid' => $mid,
      ':getMethod_ID' => $getMethod_ID,
      ':getm' => $row[18],
      ':note' => $row[19],
      ':dstat_ID' => $dstat_ID,
     );
     $query = "INSERT INTO asset(No,order_number,asset_ID,asset_Set,asset_number,
                                     asset_setname,asset_nickname,asset_name,model,asset_order,
                                     property,addin_date,asset_location_ID,room_ID,resper_ID,vendor_ID,asset_type_ID,quantity
                                     ,price_per_qty,group_price,mid,getMethod_ID,getm,note,dstat_ID)
      
                    VALUES (:No,:order_number,:asset_ID,:asset_Set,:asset_number,
                                    :asset_setname,:asset_nickname,:asset_name,:model,:asset_order,
                                    :property,:addin_date,:asset_location_ID,:room_ID,:resper_ID,:vendor_ID,:asset_type_ID,:quantity,
                                    :price_per_qty,:group_price,:mid,:getMethod_ID,:getm,:note,:dstat_ID)";
      
      
         $statement = $connn->prepare($query);
         $statement->execute($insert_data);

  }


}
else{
$e = explode('-',$row[3]);
if(count($e) > 1)
{
  $minn = "";
  $maxx = "";
$checkpoint = [];
    $checkpoint = explode('.',$e[0]);
      $minn = $checkpoint[1];
    $checkpoint = explode('.',$e[1]);
      $maxx = $checkpoint[1];
   
    
  
  if($minn != $maxx && $minn < $maxx){
      for($i = $minn ;$i<=$maxx;$i++){
        array_push($a,$row[1]."/".$asset_set.".".$i." ".$vt);
        $insert_data = array(
          ':No'=> $NO,
          ':order_number'=> $row[0],
          ':asset_ID'=> $row[1]."/".$asset_set.".".$i." ".$vt,
          ':asset_Set'=> $asset_set,
          ':asset_number'=> $asset_set.".".$i,
          ':asset_setname'=> $row[5],
          ':asset_nickname'=> $row[6],    
          ':asset_name'=> $row[7],    
          ':model'=> $row[8],
          ':asset_order'=> $row[9],
          ':property'=> $row[10],
          ':addin_date'=> $ddd,
          ':asset_location_ID'=> 1,
          ':room_ID'=> $rm,
          ':resper_ID'=> $resper,
          ':vendor_ID'=> $vendor,
          ':asset_type_ID'=> $astype,
          ':quantity'=> 1,
          ':price_per_qty' => $row[14],
          ':group_price' => $group_price,
          ':mid' => $mid,
          ':getMethod_ID' => $getMethod_ID,
          ':getm' => $row[18],
          ':note' => $row[19],
          ':dstat_ID' => $dstat_ID,
         );
      
         $query = "INSERT INTO asset(No,order_number,asset_ID,asset_Set,asset_number,
                                     asset_setname,asset_nickname,asset_name,model,asset_order,
                                     property,addin_date,asset_location_ID,room_ID,resper_ID,vendor_ID,asset_type_ID,quantity
                                     ,price_per_qty,group_price,mid,getMethod_ID,getm,note,dstat_ID)
      
                    VALUES (:No,:order_number,:asset_ID,:asset_Set,:asset_number,
                                    :asset_setname,:asset_nickname,:asset_name,:model,:asset_order,
                                    :property,:addin_date,:asset_location_ID,:room_ID,:resper_ID,:vendor_ID,:asset_type_ID,:quantity,
                                    :price_per_qty,:group_price,:mid,:getMethod_ID,:getm,:note,:dstat_ID)";
      
      
         $statement = $connn->prepare($query);
         $statement->execute($insert_data);




      }
  }else if($minn == $maxx){
    array_push($a,$row[1]."/".$asset_set.".".$minn." ".$vt);
    $insert_data = array(
      ':No'=> $NO,
      ':order_number'=> $row[0],
      ':asset_ID'=> $row[1]."/".$asset_set.".".$minn." ".$vt,
      ':asset_Set'=> $asset_set,
      ':asset_number'=> $asset_set.".".$minn,
      ':asset_setname'=> $row[5],
      ':asset_nickname'=> $row[6],    
      ':asset_name'=> $row[7],    
      ':model'=> $row[8],
      ':asset_order'=> $row[9],
      ':property'=> $row[10],
      ':addin_date'=> $ddd,
      ':asset_location_ID'=> 1,
      ':room_ID'=> $rm,
      ':resper_ID'=> $resper,
      ':vendor_ID'=> $vendor,
      ':asset_type_ID'=> $astype,
      ':quantity'=> 1,
      ':price_per_qty' => $row[14],
      ':group_price' => $group_price,
      ':mid' => $mid,
      ':getMethod_ID' => $getMethod_ID,
      ':getm' => $row[18],
      ':note' => $row[19],
      ':dstat_ID' => $dstat_ID,
     );
  
     $query = "INSERT INTO asset(No,order_number,asset_ID,asset_Set,asset_number,
                                 asset_setname,asset_nickname,asset_name,model,asset_order,
                                 property,addin_date,asset_location_ID,room_ID,resper_ID,vendor_ID,asset_type_ID,quantity
                                 ,price_per_qty,group_price,mid,getMethod_ID,getm,note,dstat_ID)
  
                VALUES (:No,:order_number,:asset_ID,:asset_Set,:asset_number,
                                :asset_setname,:asset_nickname,:asset_name,:model,:asset_order,
                                :property,:addin_date,:asset_location_ID,:room_ID,:resper_ID,:vendor_ID,:asset_type_ID,:quantity,
                                :price_per_qty,:group_price,:mid,:getMethod_ID,:getm,:note,:dstat_ID)";
  
  
     $statement = $connn->prepare($query);
     $statement->execute($insert_data);




  }


}else{

  array_push($a,$row[1]."/".$row[3]." ".$vt);
  $insert_data = array(
    ':No'=> $NO,
    ':order_number'=> $row[0],
    ':asset_ID'=> $row[1]."/".$row[3]." ".$vt,
    ':asset_Set'=> $asset_set,
    ':asset_number'=> $row[3],
    ':asset_setname'=> $row[5],
    ':asset_nickname'=> $row[6],    
    ':asset_name'=> $row[7],    
    ':model'=> $row[8],
    ':asset_order'=> $row[9],
    ':property'=> $row[10],
    ':addin_date'=> $ddd,
    ':asset_location_ID'=> 1,
    ':room_ID'=> $rm,
    ':resper_ID'=> $resper,
    ':vendor_ID'=> $vendor,
    ':asset_type_ID'=> $astype,
    ':quantity'=> 1,
    ':price_per_qty' => $row[14],
    ':group_price' => $group_price,
    ':mid' => $mid,
    ':getMethod_ID' => $getMethod_ID,
    ':getm' => $row[18],
    ':note' => $row[19],
    ':dstat_ID' => $dstat_ID,
   );

   $query = "INSERT INTO asset(No,order_number,asset_ID,asset_Set,asset_number,
                               asset_setname,asset_nickname,asset_name,model,asset_order,
                               property,addin_date,asset_location_ID,room_ID,resper_ID,vendor_ID,asset_type_ID,quantity
                               ,price_per_qty,group_price,mid,getMethod_ID,getm,note,dstat_ID)

              VALUES (:No,:order_number,:asset_ID,:asset_Set,:asset_number,
                              :asset_setname,:asset_nickname,:asset_name,:model,:asset_order,
                              :property,:addin_date,:asset_location_ID,:room_ID,:resper_ID,:vendor_ID,:asset_type_ID,:quantity,
                              :price_per_qty,:group_price,:mid,:getMethod_ID,:getm,:note,:dstat_ID)";


   $statement = $connn->prepare($query);
   $statement->execute($insert_data);



}

}


  }
  }

  for($x = 0; $x< count($a); $x++){
    $q = $a[$x];
    //echo $q;
    $sqlst = "SELECT * FROM asset WHERE asset_ID = '".$q."'";
    $result = $conn->query($sqlst);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $assetnum = $row['id'];
        array_push($idA,$assetnum);
        $sqlsta = "INSERT INTO `asset_stat_overview`( `id`, `asset_stat_ID`) VALUES('".$assetnum."','".$asstat."')";
        if ($conn->query($sqlsta) == TRUE) {
        //echo $sqlsta;
        }
    }
}
}
 

  foreach($data as $row)
  {
    //echo "ok";
    $tn = "";
    $tn .= time();
    $tn .= rand();
    
    if(!$Bloop){
      $Bloop = true;
    }
    else{

      $asnumset = $row[24];
   $insert_data = array(
    ':time_now'=> $tn,
    ':datee'=> $row[25],
    ':report_NO'=> $row[26],
    ':report_order'=> $row[27],
    ':unit'=> $row[28],
    ':price_per_unit'=> $row[29],
    ':summary'=> $row[30],
    ':life_time'=> $row[31],
    ':Depreciation_rate'=> $row[32],
    ':year_Depreciation'=> $row[33],
    ':sum_Depreciation'=> $row[34],
    ':net_value'=> $row[35],
    ':Change_order'=> $row[36],
    ':report_number'=> $row[37],

   );

  $query = "INSERT INTO asset_report(time_now,date,report_NO,report_order,
  unit,price_per_unit,summary,life_time,Depreciation_rate,
  year_Depreciation,sum_Depreciation,net_value,
  Change_order,report_number)
   
   VALUES (:time_now,:datee,:report_NO,:report_order,:unit,:price_per_unit,
          :summary,:life_time,:Depreciation_rate,:year_Depreciation,
          :sum_Depreciation,:net_value,:Change_order,:report_number) ";

  $statement = $connn->prepare($query);
  $statement->execute($insert_data);

$aid = "";
 $sql = "SELECT aid FROM asset_report WHERE time_now = '".$tn."'" ;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($rows = $result->fetch_assoc()) {
                   $aid = $rows['aid'];
                   
                  }
                }
$dd = [];
$setarr2 = [];
$mindd = [];
if(count(explode(',',$asnumset))>1){
  $dd = explode(',',$asnumset);
  for($f = 0;$f < count($dd); $f++){
    if(count(explode('-',$dd[$f]))>1){
      $mindd = explode('-',$dd[$f]);
      if(count(explode('.',$mindd[0])) > 1 && count(explode('.',$mindd[1])) > 1)
    {
      $mdd1 = explode('.',$mindd[0]);
      $mdd2 = explode('.',$mindd[1]);
      for($u = $mdd1[1];$u <= $mdd2[1]; $u++){
      array_push($setarr2,$mdd1[0].".".$u);
    }
    }else{
      for($u = $mindd[0];$u <= $mindd[1]; $u++){
        array_push($setarr2,$u);
      }
    }
    }else{
      array_push($setarr2,$dd[$f]);
    }
  }
  
}else{
  if(count(explode('-',$asnumset))>1){
    $mindd = explode('-',$asnumset);
    if(count(explode('.',$mindd[0])) > 1 && count(explode('.',$mindd[1])) > 1)
    {
      $mdd1 = explode('.',$mindd[0]);
      $mdd2 = explode('.',$mindd[1]);
      for($u = $mdd1[1];$u <= $mdd2[1]; $u++){
      array_push($setarr2,$mdd1[0].".".$u);
    }
    }else{
      for($u = $mindd[0];$u <= $mindd[1]; $u++){
        array_push($setarr2,$u);
      }
    }
    
  }else{
    //$setarr2 = [];
    array_push($setarr2,$asnumset);
  }
}
for($i = 0; $i < count($setarr2); $i++){
  //echo $setarr2[$i];
  echo count($setarr2)."<br>";
  echo $row[23]."/".$setarr2[$i]."<br>";
  $sql = "SELECT asset_ID,id FROM asset WHERE asset_ID like '".$row[23]."/".$setarr2[$i]."%' " ;
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
            while($rowse = $result->fetch_assoc()) {
              $sqll = "INSERT INTO `asset_report_text`( `id`, `aid`) VALUES ('".$rowse['id']."','".$aid."')";
              if ($conn->query($sqll) == TRUE) {
                echo $rowse['asset_ID']."<br>";
              }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
                   

            }
           }
          }
          
    }

 

    }
    $setarr2 = [];

$message = '<div class="alert alert-success">Data Imported Successfully</div>';
  

}
else
{
 $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
}
}
else
{
$message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;


