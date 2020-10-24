<?php SESSION_START();
    require 'connect.php';
    include 'action_insert.php';
    require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

// ลองรับภาษาไทย ต้องไปโหลด sarabun มาใส่ลง vendor
$mpdf = new \Mpdf\Mpdf([
  
  'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI'=> 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
  
]);


ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS_Asset</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
    body{
        font-family: 'Sarabun', sans-serif;
        font-size:16px;
    }
    div.a {
  text-align: right;
}

</style>
</head>
<body>

<h2 align="center">รายการครุภัณฑ์</h2>
<br>

<?php 

 // var_dump($_SESSION['Account']);
 require 'connect.php';
 $search_word ="ค้นหารายการจาก: ";
     $sortway = "";
     $s = $_POST['searchtxt'];
     $clause = " WHERE ";
     $_SESSION['sqlxee'] = $sql="SELECT * FROM asset natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room NATURAL JOIN getmethod  NATURAL JOIN assetstat";//Query stub
     if($_POST['searchtxt'] != ''){
         $search_word .= " [รหัสหรือชื่อครุภัณฑ์: ".$_POST['searchtxt']."] ";
            $c = "asset_ID";
            $_SESSION['sqlxe'] = $sql .= $clause." (`".$c."` LIKE '%{$s}%' OR asset_name LIKE '%{$s}%')";
         $clause = " and ";//Change  to OR after 1st WHERE
         $sortway.= $c." = ".$s;
        }
        if(empty($_POST['searchtxt']))
        {
         $search_word .= " รายการทั้งหมด ";
        }
        $rmb = false;
        if(!empty($_POST['rm']))
        {
           $numItems = count($_POST['rm']);
           $i = 0;
           $search_word .= " [ห้องจัดเก็บครุภัณฑ์: ";
           
           $_SESSION['sqlxe'] = $sql .= $clause." (";
           foreach($_POST['rm'] as $w){
            if($w == 0){
                $w = 64;
            }
                $sqlss = "SELECT * FROM room WHERE room_ID = '".$w."'";
            $result = $conn->query($sqlss);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   if(++$i === $numItems) {
                    $search_word .= $row['room']." ";
                   $r = $w;
                   $c = "room_ID";
                   if($rmb == false){
                        $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r} ";
                   }else{
                        $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
                   }
                   
                   $clause = " or ";
                   $sortway.= $c." = ".$r;
                   }
                   else{
                       $search_word .= $row['room'].",";
                       $r = $w;
                       $c = "room_ID";
                       if($rmb == false){
                        $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r}";
                        $rmb = true;
                       }else{
                        $_SESSION['sqlxe'] = $sql .=  $clause."`".$c."` = {$r}";
                       }
                      
                       $clause = " or ";
                       $sortway.= $c." = ".$r;
                   }
                }
            }
           }
           $_SESSION['sqlxe'] = $sql .= ")";
           $search_word .=" ] ";
           $clause = " and ";
        }
        $tpb = false;
        if(isset($_POST['tp']))
         {
            $numItems = count($_POST['tp']);
            $i = 0;
            $search_word .= " [ประเภทครุภัณฑ์: ";
            $_SESSION['sqlxe'] = $sql .= $clause." (";
            foreach($_POST['tp'] as $w){
                if($w == 0){
                    $w = 23;
                }
             $sqlss = "SELECT * FROM assettype WHERE asset_type_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                        $search_word .= $row['asset_type_name']." ";
                        $r = $w;
                        $c = "asset_type_ID";
                        if($tpb == false){
                            $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r} ";
                        }else{
                             $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
                        }
                       
                        $clause = " or ";
                        $sortway.= $c." = ".$r;
                      }
                      else{
                        $r = $w;
                        $c = "asset_type_ID";
                        if($tpb == false){
                            $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r} ";
                            $tpb = true;
                        }
                        else{
                            $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
                        }
                        $clause = " or ";
                        $sortway.= $c." = ".$r;
                          $search_word .= $row['asset_type_name'].",";
                      }
                     
                 }
             }
            }
            $_SESSION['sqlxe'] = $sql .= ")";
            $search_word .= "] ";
            $clause = " and ";

         }
         $sttb = false;
         if(isset($_POST['stt']))
         {
            $numItems = count($_POST['stt']);
            $i = 0;
            $search_word .= " [สถานะครุภัณฑ์: ";
            $_SESSION['sqlxe'] = $sql .= $clause." (";
            foreach($_POST['stt'] as $w){
                if($w == 0){
                    $w = 15;
                }
             $sqlss = "SELECT * FROM assetstat WHERE asset_stat_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['asset_stat_name']." ";
                     $r = $w;
                    $c = "asset_stat_ID";
                    if($sttb == false){
                        $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r} ";
                    }else{
                        $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
                    }
                    
                    $clause = " or ";
                    $sortway.= $c." = ".$r;
                    }else{
                        $search_word .= $row['asset_stat_name'].",";
                        $r = $w;
                        $c = "asset_stat_ID";
                        if($sttb == false){
                            $sttb = true; $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r} ";
                        }
                        else{
                             $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
                        }
                       
                        $clause = " or ";
                        $sortway.= $c." = ".$r;
                    }
                 }
             }
             
            }
            $_SESSION['sqlxe'] = $sql .= ")";
            $search_word .= " ] "; 
            $clause = " and ";
         }
         $dsttb = false;
         if(isset($_POST['dstt']))
         {
            $numItems = count($_POST['dstt']);
            $i = 0;
            $search_word .= " [ลักษณะการติดตั้ง: ";
            $_SESSION['sqlxe'] = $sql .= $clause." (";
            foreach($_POST['dstt'] as $w){
                if($w == 0){
                    $w = 12;
                }
             $sqlss = "SELECT * FROM deploy_stat WHERE dstat_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['dstat']." ";
                     $r = $w;
                     $c = "dstat_ID";
                     if($dsttb == false){
                        $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r} ";
                     }else{
                        $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
                     }
                     
                     $clause = " or ";
                     $sortway.= $c." = ".$r;
                    }else{
                        $search_word .= $row['dstat'].",";
                        $r = $w;
                        $c = "dstat_ID";
                        if($dsttb == false){
                            $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r} ";
                            $dsttb = true;
                        }else{
                            $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
                        }
                        
                        $clause = " or ";
                        $sortway.= $c." = ".$r;
                    }
                 }
             }
            
            }
            $_SESSION['sqlxe'] = $sql .= ")";
            $search_word .= " ] ";
            $clause = " and ";
         }
         $rpb = false;
         if(isset($_POST['rp']))
         {
            $numItems = count($_POST['rp']);
            $i = 0;
            $search_word .= " [ผู้รับผิดชอบ: ";
            $_SESSION['sqlxe'] = $sql .= $clause." (";
            foreach($_POST['rp'] as $w){
                if($w == 0){
                    $w = 48;
                }
             $sqlss = "SELECT * FROM respon_per WHERE resper_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                        $r = $w;
                        $c = "resper_ID";
                        if($rpb == false){
                            $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r} ";
                        }else{
                            $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
                        }
                        
                        $clause = " or ";
                        $sortway.= $c." = ".$r;
                     $search_word .= $row['resper_firstname']." ".$row['resper_lastname']." ";
                    }else{
                        $search_word .= $row['resper_firstname']." ".$row['resper_lastname'].",";
                        $r = $w;
                        $c = "resper_ID";
                        if($rpb == false){
                            $_SESSION['sqlxe'] = $sql .= "`".$c."` = {$r} ";
                            $rpb = true;
                        }else{
                            $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
                        }
                        $clause = " or ";
                        $sortway.= $c." = ".$r;
                    }
                 }
             }
            
            }
            $_SESSION['sqlxe'] = $sql .= ")";
            $search_word .= " ] ";
            $clause = " and ";
         }
         $gmb = false;
         if(isset($_POST['gm']))
         {
            $numItems = count($_POST['gm']);
            $i = 0;
            $search_word .= " [วิธีได้รับ: ";
            $_SESSION['sqlx'] = $sql .= $clause." (";
            foreach($_POST['gm'] as $w){
                if($w == 0){
                    $w = 13;
                }
             $sqlss = "SELECT * FROM getmethod WHERE getMethod_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['method']." ";
                     $r = $w;
                     $c = "getMethod_ID";
                     if($gmb == false){
                        $_SESSION['sqlx'] = $sql .= "`".$c."` = {$r} ";
                     }else{
                          $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
                     }
                    
                     $clause = " or ";
                     $sortway.= $c." = ".$r;
                    }else{
                        $search_word .= $row['method'].",";
                        $r = $w;
                        $c = "getMethod_ID";
                        if($gmb == false){
                            $_SESSION['sqlx'] = $sql .= "`".$c."` = {$r} ";
                            $gmb = true;
                        }else{
                            $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
                        }
                        $clause = " or ";
                        $sortway.= $c." = ".$r;
                    }
                 }
             }
            
            }
            $_SESSION['sqlx'] = $sql .= ")";
            $search_word .= " ] ";
            $clause = " and ";
         }
        
        
        if(isset($_POST['asid'])){ $asids = $_POST['asid']; }
       if(isset($_POST['nkn'])){ $nkn = $_POST['nkn'];}
       if(isset($_POST['ustat'])){ $ustat = $_POST['ustat'];}
       if(isset($_POST['astyp'])){ $astyp = $_POST['astyp'];}
       if(isset($_POST['asroom'])){ $asroom = $_POST['asroom'];}
       if(isset($_POST['respers'])){ $respers = $_POST['respers'];}
       if(isset($_POST['asname'])){ $asname = $_POST['asname'];}
         $se = array();
       $head = "";
       //echo "show ".$asids;

       if(isset($asids)){ $head .= "<th align='center'>รหัสครุภัณฑ์</th>"; array_push($se,"asset_ID");}
       if(isset($asname)){ $head .= "<th align='center'>ชื่อครุภัณฑ์</th>"; array_push($se , "asset_name"); }
      if(isset($nkn)){ $head .= "<th align='center'>ชื่อเรียกครุภัณฑ์</th>"; array_push($se,"asset_nickname");}
      if(isset($ustat)){ $head .= "<th align='center'>สถานะครุภัณฑ์</th>"; array_push($se, "asset_stat_name");}
      if(isset($astyp)){ $head .= "<th align='center'>ประเภทครุภัณฑ์</th>"; array_push($se, "asset_type_name");}
      if(isset($asroom)){ $head .= "<th align='center'>ห้องที่จัดเก็บ</th>"; array_push($se, "room");}
      if(isset($respers)){ $head .= "<th align='center'>ผู้รับผิดชอบ</th>"; array_push($se,"resper_firstname|resper_lastname");}
     else{
        $head .= "<th align='center'>รหัสครุภัณฑ์</th>"; array_push($se,"asset_ID");
        $head .= "<th align='center'>ชื่อเรียกครุภัณฑ์</th>"; array_push($se,"asset_nickname");
        $head .= "<th align='center'>ห้องที่จัดเก็บ</th>"; array_push($se, "room");
     }
      
?>

<div style ="float:left"><?php echo $search_word; ?></div>
<br>
<div id = "order_table">
<table class="table table-bordered" width = "100%" style = "text-align:center">
<thead align='center'>
<tr>
<?php echo $head; $_SESSION['excel_head'] = $head; $_SESSION['se'] = $se ; ?>
</tr>
</thead>
<tbody>

<?php 
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            for($i = 0 ; $i < count($se) ; $i++){
                if($se[$i] == "resper_firstname|resper_lastname"){ $arr = explode("|",$se[$i]); echo "<td align ='left'>".$row[$arr[0]]." ".$row[$arr[1]]."</td>"; }
                else{
                echo "<td align ='left'>".$row[$se[$i]]."</td>";
                }
            }
            echo "</tr>";
        }
    }
    $_SESSION['sqlexcel'] = $sql;
    echo $sql;
?>
</tbody>
</table>
</div>

<?php  
    $paperaxis = $_POST['axis'];
    $mpdf->SetDisplayMode('fullwidth'); 
    if($paperaxis == 'P'){
        $mpdf->AddPage('P');
    }else{
        $mpdf->AddPage('A4-L');
    }
    // ตั้งค่ากระดาษ
    $html = ob_get_contents(); // ดึงข้อมูลที่เก็บไว้ในบัฟเฟอร์
    $mpdf->WriteHTML($html); // นำตัวแปรHTMLมาแสดงผล
    $mpdf->Output("pdf/Asset_Order_List.pdf"); // ส่งไปที่ไฟล์Myreport   
    
   
    ?>
    <center><a  href="pdf/Asset_Order_List.pdf" target="_blank"><button type="button" class="btn btn-success">ดาวโหลดเอกสารPDF</botton></a><button id ="create_excel"type="button" class="btn btn-success">ดาวโหลดไฟล์Excel</button><center>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>  


 $(document).ready(function(){  
      $('#create_excel').click(function(){  
        window.location.href = "order_excel.php";
           
      });  
 });  
 </script>  
</html>
<?php 

if($_POST['checkway'] == "order"){
    insert_action("พิมพ์ รายการครุภัณฑ์");
    header("Location: pdf/Asset_Order_List.pdf"); 
}else{
    insert_action("ดาวน์โหลดไฟล์ Excel รายการครุภัณฑ์");
    header("Location: order_excel.php");
}


ob_end_flush();
?>