<?php SESSION_START();
    require 'connect.php';
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
     $_SESSION['sqlxee'] = $sql="SELECT * FROM asset natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room NATURAL JOIN getmethod NATURAL JOIN asset_stat_overview NATURAL JOIN assetstat";//Query stub
     if($_POST['searchtxt'] != ''){
         $search_word .= " [รหัสหรือชื่อครุภัณฑ์: ".$_POST['searchtxt']."] ";
            $c = "asset_ID";
            $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` LIKE '%{$s}%' OR asset_name LIKE '%{$s}%'";
         $clause = " and ";//Change  to OR after 1st WHERE
         $sortway.= $c." = ".$s;
        }
        if($_POST['searchtxt'] == '')
        {
         $search_word .= " รายการทั้งหมด ";
        }
        
         if($_POST['rm'] !=  '')
         {
            $numItems = count($_POST['rm']);
            $i = 0;
            $search_word .= " [ห้องจัดเก็บครุภัณฑ์: ";
            foreach($_POST['rm'] as $w){
                 $sqlss = "SELECT * FROM room WHERE room_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['room']." ";
                    }
                    else{
                        $search_word .= $row['room'].",";
                    }
                 }
             }
             
             $r = $w;
             $c = "room_ID";
             $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .=" ] ";
            $clause = " and ";
            
         }
        if($_POST['tp'] != '')
         {
            $numItems = count($_POST['tp']);
            $i = 0;
            $search_word .= " [ประเภทครุภัณฑ์: ";
            foreach($_POST['tp'] as $w){
             $sqlss = "SELECT * FROM assettype WHERE asset_type_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                        $search_word .= $row['asset_type_name']." ";
                      }
                      else{
                          $search_word .= $row['asset_type_name'].",";
                      }
                     
                 }
             }
             $r = $w;
             $c = "asset_type_ID";
             $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
           
            }
            $search_word .= "] ";
            $clause = " and ";

         }
         if($_POST['stt'] != '')
         {
            $numItems = count($_POST['stt']);
            $i = 0;
            $search_word .= " [สถานะครุภัณฑ์: ";
            foreach($_POST['stt'] as $w){
             $sqlss = "SELECT * FROM assetstat WHERE asset_stat_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['asset_stat_name']." ";
                    }else{
                        $search_word .= $row['asset_stat_name'].",";
                    }
                 }
             }
             $r = $w;
             $c = "asset_stat_ID";
             $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .= " ] "; 
            $clause = " and ";
         }
         if($_POST['dstt'] != '')
         {
            $numItems = count($_POST['dstt']);
            $i = 0;
            $search_word .= " [ลักษณะการติดตั้ง: ";
            foreach($_POST['dstt'] as $w){
             $sqlss = "SELECT * FROM deploy_stat WHERE dstat_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['dstat']." ";
                    }else{
                        $search_word .= $row['dstat'].",";
                    }
                 }
             }
             $r = $w;
             $c = "dstat_ID";
             $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .= " ] ";
            $clause = " and ";
         }
         if($_POST['rp'] != '')
         {
            $numItems = count($_POST['rp']);
            $i = 0;
            $search_word .= " [ผู้รับผิดชอบ: ";
            foreach($_POST['rp'] as $w){
             $sqlss = "SELECT * FROM respon_per WHERE resper_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['resper_firstname']." ".$row['resper_lastname']." ";
                    }else{
                        $search_word .= $row['resper_firstname']." ".$row['resper_lastname'].",";
                    }
                 }
             }
             $r = $w;
             $c = "resper_ID";
             $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .= " ] ";
            $clause = " and ";
         }
         if($_POST['gm'] != '')
         {
            $numItems = count($_POST['gm']);
            $i = 0;
            $search_word .= " [วิธีได้รับ: ";
            foreach($_POST['gm'] as $w){
             $sqlss = "SELECT * FROM getmethod WHERE getMethod_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['method']." ";
                    }else{
                        $search_word .= $row['method'].",";
                    }
                 }
             }
             $r = $w;
             $c = "getMethod_ID";
             $_SESSION['sqlxe'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .= " ] ";
            $clause = " and ";
         }
        
        
       $asids = $_POST['asid'];
       $nkn = $_POST['nkn'];
       $ustat = $_POST['ustat'];
       $astyp = $_POST['astyp'];
       $asroom = $_POST['asroom'];
       $respers = $_POST['respers'];
       $asname = $_POST['asname'];
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
<table class="table table-bordered" width = "100%" style = "text-align:center">
<thead align='center'>
<tr>
<?php echo $head; ?>
</tr>
</thead>
<tbody>

<?php 
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            for($i = 0 ; $i < count($se) ; $i++){
                if($se[$i] == "resper_firstname|resper_lastname"){ $arr = explode("|",$se[$i]); echo "<td>".$row[$arr[0]]." ".$row[$arr[1]]."</td>"; }
                else{
                echo "<td>".$row[$se[$i]]."</td>";
                }
            }
            echo "</tr>";
        }
    }
    echo $sql;
?>
</tbody>
</table>


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
    <center><a  href="pdf/Asset_Order_List.pdf" target="_blank"><button type="button" class="btn btn-success">ดาวโหลดเอกสาร</botton></a><center>
</body>
</html>
<?php 

header("Location: pdf/Asset_Order_List.pdf"); 

ob_end_flush();
?>