<?php
SESSION_START();
require 'connect.php';
include 'action_insert.php';
insert_action("พิมพ์ทะเบียนคุมทรัพย์สินครุภัณฑ์ทุกรายการ");
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
table.table-bordered > thead > tr > th{
  border:1px solid black;
}

</style>
</head>
<body>

<?php 

$mt = "";
$getm = "";
$C = "";
$set ="";
$NO = "";
$min = "";
$max = "";
$mas = "";
$cun = array();
$cmin = array();
$rowc= array();
$setas = array();
$NOAS = array();
$sql = "SELECT * FROM `asset` GROUP by No ORDER BY `asset`.`asset_setname` DESC ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    array_push($setas,$row['asset_Set']);
    array_push($NOAS,$row['No']);
}
}
for ($x = 0; $x < count($setas) ; $x++) {
$set = $setas[$x];
$NO = $NOAS[$x];
$sql = "SELECT * From asset WHERE asset_Set like '".$set."' ORDER BY id ASC limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$min .= $row['asset_ID'];
}
}
$cmin = explode(" ",$min);
$sql = "SELECT asset_ID From asset WHERE asset_Set like '".$set."' ORDER BY id DESC limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$max .= $row['asset_ID'];
}
}
$sql = "SELECT asset_number From asset WHERE asset_Set like '".$set."' order by id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$mas .= $row['asset_number'];
}
}
$sql = "SELECT asset_number From asset WHERE asset_Set like '".$set."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  array_push($cun,$row['asset_number']);
}
}
$e = explode(".",$mas);
$cu = count($cun);
  $mod = fmod($cu,2);
if(count($e) == 2){
  if(count($cun) == $e[1]){
    if($min == $max){
    $C .= $min;
    }else {
    $C .= $cmin[0];
    if(!empty($cmin[1])){
      $C .= '-'.$mas.' '.$cmin[1];
      
    }else{
      $C .= '-'.$mas;
    }
    
    }
  }else {
    if($mod == 1){
      $C .= $cmin[0];
  $t = false;
  $rr = false;
  $l = false;
  $b = [];
  $f = [];
  for($i = 1; $i < count($cun);$i++){
    if($i == (count($cun)-1)){
      $rr = true;
    }
      $b = explode('.',$cun[$i-1]);
      $f = explode('.',$cun[$i]);
      if(($b[1]+1) == $f[1]){
          if($i != (count($cun)-1) && $t == false && $rr == false){
              $t = true;
              $C .= '-';
              $l = true;
          }
          else if($i == (count($cun)-1) && ($b[1]+1) == $f[1] && $rr == true && $l ==false){
            
            $C .= "-".$cun[$i];
          }
          else if($i == (count($cun)-1) && ($b[1]+1) == $f[1] && $rr == true && $l ==true){
            $C .= $cun[$i];
          }
          
      }
      else if(($b[1]+1) != $f[1]){
          if($t == true){
              $t = false;
              $C .= $cun[$i-1].','.$cun[$i];
              $l = false;
          }
          else if($t == false){
            $l = false;
              $C .= ','.$cun[$i]; 
          }
         
      }

  }
  if(!empty($cmin[1])){
    $C .= ' '.$cmin[1];
  }

  }else if($mod == 0){
      
          $C .= $cmin[0];
          $t = false;
          $rr = false;
          $b = [];
          $f = [];
          for($i = 1; $i < count($cun);$i++){
            if($i == (count($cun)-1)){
              $rr = true;
            }
              $b = explode('.',$cun[$i-1]);
              $f = explode('.',$cun[$i]);
              if(($b[1]+1) == $f[1]){
                  if($i != (count($cun)-1) && $t == false && $rr == false){
                      $t = true;
                      $C .= '-';
                  }
                  else if($i == (count($cun)-1) && ($b[1]+1) == $f[1] || $rr == true ){
                    
                    $C .= $cun[$i];
                  }
                  
              }
              else if(($b[1]+1) != $f[1]){
                  if($t == true){
                      $t = false;
                      $C .= $cun[$i-1].','.$cun[$i];
                  }
                  else if($t == false){
                      
                      $C .= ','.$cun[$i]; 
                  }
                 
              }
        
          }
          if(!empty($cmin[1])){
            $C .= ' '.$cmin[1];
          }
        }
        
  }
  }else{
    //echo "B";
    $aid = "";
    $sql = "SELECT aid From asset NATURAL JOIN asset_report_text natural join asset_report WHERE asset_number = '".$mas."' LIMIT 1 ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $aid = $row['aid'];
      //echo " d ".$row['aid']; 
      }
    }
   $allid = [];
    $sql = "SELECT asset_number FROM asset_report_text NATURAL join asset WHERE aid = '".$aid."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($allid,$row['asset_number']);
        //echo " d ".$row['asset_number']; 
      }
    }
    if(count($allid) == 1){
      $C .= $min;
      
    }
    else{
      $r = explode('/', $min);
      $C .= $r[0].'/'.$allid[0];
      $tt = false;
      
      for($i = 1; $i < count($allid);$i++){
  
          
          if(($allid[$i-1]+1) == $allid[$i]){
              if($tt == false){
                  $tt = true;
                  $C .= '-';
                  if($i+1 == count($allid)){
                    $C .= $allid[$i];
                  }
              }else if($i == count($allid)-1 && $tt == true ){
                $C .= $allid[$i];
              }
          }
          else if(($allid[$i-1]+1) != $allid[$i]){
              if($tt == true){
                  $tt = false;
                  $C .= $allid[$i-1].','.$allid[$i];
              }
              else if($tt == false){
                  $C .= ','.$allid[$i]; 
              }
          }
           
  
    }
    if(!empty($cmin[1])){
      $C .= ' '.$cmin[1];
    }
    }
  
  
  
  }



$sql = "SELECT * FROM asset natural join asset_location natural join vendor natural join assettype natural join money_type natural join getmethod where No = '".$NO."' GROUP BY No";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$mt = $row['mid'];
$getm = $row['getMethod_ID'];
$Dot = "...............";
$A = $row['order_number'];
$B = $row['asset_type_name'];

$D = $row['property'];
$E = $row['model'];

$F = $row['asset_location'];
$G = $row['vendor_company'];

$H = $row['vendor_location'];
$I = $row['vendor_tel'];
$J = $row['fax'];
}
}

 $sql = "SELECT * FROM asset natural join asset_report_text natural join asset_report where asset_Set = '".$set."' and asset_number = ( SELECT MIN(asset_number) FROM asset WHERE asset_Set = '".$set."' ) ";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
array_push($rowc , '
<tr>
<td align="right" width = "50px">'.$row['date'].'</td> <!--วันที่-->
<td align="center" width = "50px">'.$row['report_NO'].'</td> <!--เลขเอกสาร-->
<td align="left" width = "300px">'.$row['report_order'].'</td> <!--รายการ-->
<td align="center" width = "50px">'.$row['unit'].'</td>  <!--จำนวนชุด-->
<td align="right"width = "50px">'.$row['price_per_unit'].'</td>  <!--ราคาต่อหน่วย-->
<td align="right" width = "100px">'.$row['summary'].'</td>  <!--ราคารวม-->
<td align="right" width = "50px">'.$row['life_time'].'</td>  <!--ค่าเสื่อมประจำปี-->
<td align="right"width = "50px">'.$row['Depreciation_rate'].'</td>  <!--ค่าเสื่อมประจำปี-->
<td align="right"width = "50px">'.$row['year_Depreciation'].'</td> <!--ค่าเสื่อมสะสม-->
<td align="right"width = "50px">'.$row['sum_Depreciation'].'</td> <!--มูลค่าสุทธื-->
<td align="right"width = "100px">'.$row['net_value'].'</td> <!--มูลค่าสุทธื-->
<td align="center"width = "50px">'.$row['Change_order'].'</td>  <!--รายการเปลี่ยนแปลง-->
<td align="center"width = "50px">'.$row['report_number'].'</td>  <!--เลขที่เอกสาร-->   
  </tr>') ;}      }

  $countrowc = count($rowc); //23
  $forcount = floor($countrowc / 7);  // 3
  $forin = fmod($countrowc , 7);  //2
?>
<?php for($i = 0; $i <$forcount; $i++) { ?>
<h2 align="center">ทะเบียนคุมทรัพย์สิน</h2>

    

<div class="a">

<p>ส่วนราชการ มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ<Br>
หน่วยงานวิทยาเขตเทคนิคกรุงเทพฯ </p>
</div>

<?php


echo "รายการที่" .$Dot. $A .$Dot;  
echo "<br>"  ;
echo "ประเภท" .$Dot. $B.$Dot;
echo " รหัส ".$Dot.$C.$Dot;
echo "ลักษณะ /คุณสมบัติ " .$Dot.$D.$Dot ;  
echo "รุ่น/แบบ".$Dot.$E.$Dot;  
echo "<br>";
echo"สถานที่ตั้ง/หน่วยงานที่รับผิดชอบ".$Dot.$F.$Dot; 
echo"ชื่อผู้ขาย/รับจ้าง/ผู้บริจาค".$Dot.$G.$Dot; 
echo "<br>";
echo "ที่อยู่".$Dot.$H.$Dot;
echo"โทรศัพท์ ".$Dot. $I.$Dot ;
echo "โทรสาร".$Dot.$J.$Dot;   
echo "<br>"  ;
echo "<br>"  ;


?>
  <table style ="width:100%" class='table borderless'>

   <col width="250"> 
   <col width="250"> 
   <col width="250"> 
   <col width="250"> 
   <tr>
   <td></td>
   <td><input type="RADIO"  value="1" align = "center" <?php if($mt == 1){ echo "checked='checked'"; } ?> >&nbsp; &nbsp;  เงินงบประมาณ(งปม.) </td>
   <td><input type="RADIO"  <?php if($mt == 2){ echo "checked='checked'"; } ?> > &nbsp; &nbsp; เงินนอกงบประมาณ </td>
   <td><input type="RADIO"  <?php if($mt == 3){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; เงินบริจาคช่วยเหลือ   </td>
   <td><input type="RADIO"  <?php if($mt == 4){ echo "checked='checked'"; } ?> > &nbsp; &nbsp; อื่นๆ  <br></td>
   </tr>
    <tr>
    <td> <p>วิธีที่ได้รับมา </p></td>
    <td><input type="RADIO"  <?php if($getm == 4){ echo "checked='checked'"; } ?> > &nbsp; &nbsp; ตกลงราคา  </td>
    <td> <input type="RADIO"  <?php if($getm == 5){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; สอบราคา  </td>
    <td> <input type="RADIO"  <?php if($getm == 6){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; ประกวดราคา E-auction  </td>
    <td><input type="RADIO"  <?php if($getm == 7){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; วิธีพิเศษ  </td>
    <td> <input type="RADIO"  <?php if($getm == 8){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; รับบริจาค  </td>
   </tr>
   </table>
   
  <br>
  <br>
  
  <table style ="width:100%" class="table table-bordered"> 
  <tr>
  <th align="center" width = "50px" rowspan=2>วัน/เดือน/ปี</th>
    <th align="center" width = "50px" rowspan=2>เลขที่เอกสาร</th> 
    <th align="center" width = "300px" rowspan=2>รายการ</th>
    <th align="center" width = "50px" rowspan=2>จำนวน/หน่วย</th>
    <th align="center" width = "50px" rowspan=2>ราคาต่อ หน่วย/ชุด/กลุ่ม</th>
    <th align="center" width = "100px" rowspan=2>มูลค่ารวม</th>
    <th align="center" width = "50px" rowspan=2>อายุใช้งาน</th>
    <th align="center" width = "50px" rowspan=2>อัตราค่าเสื่อมราคา(%)</th>
    <th align="center" width = "50px" rowspan=2>ค่าเสื่อมราคาประจำปี</th>
    <th align="center" width = "50px" rowspan=2>ค่าเสื่อมราคาสะสม</th>
    <th align="center" width = "100px" rowspan=2>มูลค่าสุทธิ</th>
    <th align="center" width = "100px" colspan="2">รายการเปลี่ยนแปลง การเคลื่อนย้ายสถานภาพ</th>
  </tr>

  <tr>
  <th align="center" width = "50px">รายการเปลี่ยน</th>
  <th align="center" width = "50px">เลขที่เอกสาร</th>
</tr>
<?php 
                                    
 
  for($q = 7*$i ; $q < 7*($i+1) ; $q ++){
    echo $rowc[$q];
  }
    echo '</table>';
    echo '<pagebreak/>';
  }
if( $forin > 0){
  
    ?>
<h2 align="center">ทะเบียนคุมทรัพย์สิน</h2>

    

<div class="a">

<p>ส่วนราชการ มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ <Br>
หน่วยงานวิทยาเขตเทคนิคกรุงเทพฯ </p>
</div>

<?php


echo "รายการที่" .$Dot. $A .$Dot;  
echo "<br>"  ;
echo "ประเภท" .$Dot. $B.$Dot;
echo " รหัส ".$Dot.$C.$Dot;
echo "ลักษณะ /คุณสมบัติ " .$Dot.$D.$Dot ;  
echo "รุ่น/แบบ".$Dot.$E.$Dot;  
echo "<br>";
echo"สถานที่ตั้ง/หน่วยงานที่รับผิดชอบ".$Dot.$F.$Dot; 
echo"ชื่อผู้ขาย/รับจ้าง/ผู้บริจาค".$Dot.$G.$Dot; 
echo "<br>";
echo "ที่อยู่".$Dot.$H.$Dot;
echo"โทรศัพท์ ".$Dot. $I.$Dot ;
echo "โทรสาร".$Dot.$J.$Dot;   
echo "<br>"  ;
echo "<br>"  ;


?>
  <table style ="width:100%"  class='table borderless'>

   <col width="250"> 
   <col width="250"> 
   <col width="250"> 
   <col width="250"> 
   <tr>
   <td></td>
   <td><input type="RADIO"  value="1" align = "center" <?php if($mt == 1){ echo "checked='checked'"; } ?> >&nbsp; &nbsp;  เงินงบประมาณ(งปม.) </td>
   <td><input type="RADIO"  <?php if($mt == 2){ echo "checked='checked'"; } ?> > &nbsp; &nbsp; เงินนอกงบประมาณ </td>
   <td><input type="RADIO"  <?php if($mt == 3){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; เงินบริจาคช่วยเหลือ   </td>
   <td><input type="RADIO"  <?php if($mt == 4){ echo "checked='checked'"; } ?> > &nbsp; &nbsp; อื่นๆ  <br></td>
   </tr>
    <tr>
    <td> <p>วิธีที่ได้รับมา </p></td>
    <td><input type="RADIO"  <?php if($getm == 4){ echo "checked='checked'"; } ?> > &nbsp; &nbsp; ตกลงราคา  </td>
    <td> <input type="RADIO"  <?php if($getm == 5){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; สอบราคา  </td>
    <td> <input type="RADIO"  <?php if($getm == 6){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; ประกวดราคา E-auction  </td>
    <td><input type="RADIO"  <?php if($getm == 7){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; วิธีพิเศษ  </td>
    <td> <input type="RADIO"  <?php if($getm == 8){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; รับบริจาค  </td>
   </tr>
   </table>
   
  <br>
  <br>
  
  <table style ="width:100%" class="table table-bordered"> 
  <tr>
  <th align="center" width = "50px" rowspan=2>วัน/เดือน/ปี</th>
    <th align="center" width = "50px" rowspan=2>เลขที่เอกสาร</th> 
    <th align="center" width = "300px" rowspan=2>รายการ</th>
    <th align="center" width = "50px" rowspan=2>จำนวน/หน่วย</th>
    <th align="center" width = "50px" rowspan=2>ราคาต่อ หน่วย/ชุด/กลุ่ม</th>
    <th align="center" width = "100px" rowspan=2>มูลค่ารวม</th>
    <th align="center" width = "50px" rowspan=2>อายุใช้งาน</th>
    <th align="center" width = "50px" rowspan=2>อัตราค่าเสื่อมราคา(%)</th>
    <th align="center" width = "50px" rowspan=2>ค่าเสื่อมราคาประจำปี</th>
    <th align="center" width = "50px" rowspan=2>ค่าเสื่อมราคาสะสม</th>
    <th align="center" width = "100px" rowspan=2>มูลค่าสุทธิ</th>
    <th align="center" width = "100px" colspan="2">รายการเปลี่ยนแปลง การเคลื่อนย้ายสถานภาพ</th>
  </tr>

  <tr>
  <th align="center" width = "50px">รายการเปลี่ยน</th>
  <th align="center" width = "50px">เลขที่เอกสาร</th>
</tr>


    <?php
    for( $u = (7*$forcount) ; $u < ((7*$forcount)+$forin) ;  $u ++){
      echo $rowc[$u];
  }
  echo '</table>';
  echo '<pagebreak/>';
}
  

 ?>
 
 

<?php
$cun = [];
$cmin = [];
$rowc= [];
$mt = "";
$getm = "";
$C = "";
$set ="";
$min = "";
$max = "";
$mas = "";
}
    $mpdf->SetDisplayMode('fullwidth'); 
    $mpdf->AddPage('A4-L'); // ตั้งค่ากระดาษ
    $html = ob_get_contents(); // ดึงข้อมูลที่เก็บไว้ในบัฟเฟอร์
    $mpdf->WriteHTML($html); // นำตัวแปรHTMLมาแสดงผล
    $mpdf->Output("pdf/MyReport.pdf"); // ส่งไปที่ไฟล์Myreport   
    
    
?>
<center><a  href="pdf/MyReport.pdf" target="_blank"><button type="button" class="btn btn-success">ดาวโหลดเอกสาร</botton></a><center>

</body>
</html>
<?php 

header("Location:pdf/MyReport.pdf"); 

ob_end_flush();
?>