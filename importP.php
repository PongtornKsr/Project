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
  $idA = array();
  $idB = array();
  $a = array();
  $e = array();
  $checkpoint= array();
  foreach($data as $row)
  {/*เก็บเป็นอาเรย์ ตามตำแหน่ง วนลูปตามจำนวนแถว */

    if(!$Aloop){
      $Aloop = true;
    }
    else{

      $group_price = $row[14];
      if($asset_set == ""){
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
      }else {
          if( $asset_set == $row[2]){

          }else if( $asset_set != $row[2] ){
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
      $rm = $row[11];
      if($rm == "" || empty($rm)){
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

      $astype  = $row[12];
      if($astype == "" || empty($astype)){
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
      }else if($rm != ""){
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

      $mid = $row[15];
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

      $getMethod_ID = $row[16];

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
      
      $dstat_ID = $row[19];
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
$e = [];
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
        array_push($a,$asset_set.".".$i);
        $insert_data = array(
          ':No'=> $NO,
          ':order_number'=> $row[0],
          ':asset_ID'=> $row[1]."/".$asset_set.".".$i,
          ':asset_Set'=> $asset_set,
          ':asset_number'=> $asset_set.".".$i,
          ':asset_setname'=> $row[4],
          ':asset_nickname'=> $row[5],    
          ':asset_name'=> $row[6],    
          ':model'=> $row[7],
          ':asset_order'=> $row[8],
          ':property'=> $row[9],
          ':addin_date'=> $row[10],
          ':asset_location_ID'=> 1,
          ':room_ID'=> $rm,
          ':resper_ID'=> $resper,
          ':vendor_ID'=> $vendor,
          ':asset_type_ID'=> $astype,
          ':quantity'=> 1,
          ':price_per_qty' => $row[13],
          ':group_price' => $group_price,
          ':mid' => $mid,
          ':getMethod_ID' => $getMethod_ID,
          ':getm' => $row[17],
          ':note' => $row[18],
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
    array_push($a,$asset_set.".".$minn);
    $insert_data = array(
      ':No'=> $NO,
      ':order_number'=> $row[0],
      ':asset_ID'=> $row[1]."/".$asset_set.".".$minn,
      ':asset_Set'=> $asset_set,
      ':asset_number'=> $asset_set.".".$minn,
      ':asset_setname'=> $row[4],
      ':asset_nickname'=> $row[5],    
      ':asset_name'=> $row[6],    
      ':model'=> $row[7],
      ':asset_order'=> $row[8],
      ':property'=> $row[9],
      ':addin_date'=> $row[10],
      ':asset_location_ID'=> 1,
      ':room_ID'=> $rm,
      ':resper_ID'=> $resper,
      ':vendor_ID'=> $vendor,
      ':asset_type_ID'=> $astype,
      ':quantity'=> 1,
      ':price_per_qty' => $row[13],
      ':group_price' => $group_price,
      ':mid' => $mid,
      ':getMethod_ID' => $getMethod_ID,
      ':getm' => $row[17],
      ':note' => $row[18],
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

  array_push($a,$row[3]);
  $insert_data = array(
    ':No'=> $NO,
    ':order_number'=> $row[0],
    ':asset_ID'=> $row[1]."/".$row[3],
    ':asset_Set'=> $asset_set,
    ':asset_number'=> $row[3],
    ':asset_setname'=> $row[4],
    ':asset_nickname'=> $row[5],    
    ':asset_name'=> $row[6],    
    ':model'=> $row[7],
    ':asset_order'=> $row[8],
    ':property'=> $row[9],
    ':addin_date'=> $row[10],
    ':asset_location_ID'=> 1,
    ':room_ID'=> $rm,
    ':resper_ID'=> $resper,
    ':vendor_ID'=> $vendor,
    ':asset_type_ID'=> $astype,
    ':quantity'=> 1,
    ':price_per_qty' => $row[13],
    ':group_price' => $group_price,
    ':mid' => $mid,
    ':getMethod_ID' => $getMethod_ID,
    ':getm' => $row[17],
    ':note' => $row[18],
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

  for($x = 0; $x< count($a); $x++){
    $q = $a[$x];
    //echo $q;
    $sqlst = "SELECT * FROM asset WHERE asset_number = '".$q."'";
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
      $asnumset = $row[22];
   $insert_data = array(
    ':time_now'=> $tn,
    ':datee'=> $row[23],
    ':report_NO'=> $row[24],
    ':report_order'=> $row[25],
    ':unit'=> $row[26],
    ':price_per_unit'=> $row[27],
    ':summary'=> $row[28],
    ':life_time'=> $row[29],
    ':Depreciation_rate'=> $row[30],
    ':year_Depreciation'=> $row[31],
    ':sum_Depreciation'=> $row[32],
    ':net_value'=> $row[33],
    ':Change_order'=> $row[34],
    ':report_number'=> $row[35],

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


  $sql = "SELECT id FROM asset WHERE asset_Set = '".$asnumset."'" ;
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
            while($rowse = $result->fetch_assoc()) {
              $sqll = "INSERT INTO `asset_report_text`( `id`, `aid`) VALUES ('".$rowse['id']."','".$aid."')";
              if ($conn->query($sqll) == TRUE) {
                //echo "ok";
              }
                   

            }
           }

    }

 

    }


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


