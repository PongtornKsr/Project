<?php
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
<h2 align="center">ทะเบียนคุมทรัพย์สิน</h2>

    

<div class="a">

<p>ส่วนราชการ สถาบันเทคโนโลยีราชมงคล <Br>
หน่วยงานวิทยาเขตเทคนิคกรุงเทพฯ </p>
</div>

<?php


$as = $_GET['asset_number'];
$mt = "";
$getm = "";
$C = "";
$set ="";
$sql = "SELECT asset_Set FROM asset WHERE asset_number = '".$as."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$set = $row['asset_Set'];
}
}

$sql = "SELECT MIN(asset_ID) From asset WHERE asset_Set like '".$set."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$C .= $row['MIN(asset_ID)'];
}
}
$sql = "SELECT MAX(asset_number) From asset WHERE asset_Set like '".$set."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$C .= "-".$row['MAX(asset_number)'];
}
}
$sql = "SELECT * FROM asset natural join asset_location natural join vendor natural join assettype natural join money_type natural join getmethod where asset_number = '".$as."'";
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
}
}
?>
  <table class='table borderless'>

   <col width="250"> 
   <col width="250"> 
   <col width="250"> 
   <col width="250"> 
   <tr>
   <td></td>
   <td><input type="RADIO" name="chkColor1" value="1" align = "center" <?php if($mt == 1){ echo "checked='checked'"; } ?> >&nbsp; &nbsp;  เงินงบประมาณ(งปม.) </td>
   <td><input type="RADIO" name="chkColor1" value="Blue" <?php if($mt == 2){ echo "checked='checked'"; } ?> > &nbsp; &nbsp; เงินนอกงบประมาณ </td>
   <td><input type="RADIO" name="chkColor1" value="Green" <?php if($mt == 3){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; เงินบริจาคช่วยเหลือ   </td>
   <td><input type="RADIO" name="chkColor1" value="Green" <?php if($mt == 4){ echo "checked='checked'"; } ?> > &nbsp; &nbsp; อื่นๆ  <br></td>
   </tr>
    <tr>
    <td> <p>วิธีที่ได้รับมา </p></td>
    <td><input type="RADIO" name="chkColor2" value="Blue" <?php if($getm == 4){ echo "checked='checked'"; } ?> > &nbsp; &nbsp; ตกลงราคา  </td>
    <td> <input type="RADIO" name="chkColor2" value="Green" <?php if($getm == 5){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; สอบราคา  </td>
    <td> <input type="RADIO" name="chkColor2" value="Green" <?php if($getm == 6){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; ประกวดราคา E-auction  </td>
    <td><input type="RADIO" name="chkColor2" value="Green" <?php if($getm == 7){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; วิธีพิเศษ  </td>
    <td> <input type="RADIO" name="chkColor2" value="Green" <?php if($getm == 8){ echo "checked='checked'"; } ?> >&nbsp; &nbsp; รับบริจาค  </td>
   </tr>
   </table>
   
  <br>
  <br>
   
  <table class="table table-bordered"> 
  <tr>
    <th rowspan=2>วัน/เดือน/ปี</th>
    <th rowspan=2>เลขที่เอกสาร</th> 
    <th align="center" rowspan=2>รายการ</th>
    <th rowspan=2>จำนวน/หน่วย</th>
    <th align="center" rowspan=2>ราคาต่อ หน่วย/ชุด/กลุ่ม</th>
    <th rowspan=2>มูลค่ารวม</th>
    <th rowspan=2>อายุใช้งาน</th>
    <th rowspan=2>อัตราค่าเสื่อมราคา(%)</th>
    <th rowspan=2>ค่าเสื่อมราคาประจำปี</th>
    <th rowspan=2>ค่าเสื่อมราคาสะสม</th>
    <th rowspan=2>มูลค่าสุทธิ</th>
    <th align="center" colspan="2">รายการเปลี่ยนแปลง การเคลื่อนย้ายสถานภาพ</th>
  </tr>

  <tr>
  <th align="center">รายการเปลี่ยน</th>
  <th align="center">เลขที่เอกสาร</th>
</tr>
<?php 
                                    
  $sql = "SELECT * FROM asset natural join asset_report_text natural join asset_report where asset_number = '".$as."' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
 echo '
<tr>
    <td align="center">'.$row['date'].'</td> <!--วันที่-->
    <td align="center">'.$row['report_NO'].'</td> <!--เลขเอกสาร-->
    <td align="center">'.$row['report_order'].'</td> <!--รายการ-->
    <td align="center">'.$row['unit'].'</td>  <!--จำนวนชุด-->
    <td align="center">'.$row['price_per_unit'].'</td>  <!--ราคาต่อหน่วย-->
    <td align="center">'.$row['summary'].'</td>  <!--ราคารวม-->
    <td align="center">'.$row['life_time'].'</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">'.$row['Depreciation_rate'].'</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">'.$row['year_Depreciation'].'</td> <!--ค่าเสื่อมสะสม-->
    <td align="center">'.$row['sum_Depreciation'].'</td> <!--มูลค่าสุทธื-->
    <td align="center">'.$row['net_value'].'</td> <!--มูลค่าสุทธื-->
    <td align="center">'.$row['Change_order'].'</td>  <!--รายการเปลี่ยนแปลง-->
    <td align="center">'.$row['report_number'].'</td>  <!--เลขที่เอกสาร-->   

  </tr>';}      }
 ?>
 
 </table>

<?php


    $mpdf->SetDisplayMode('fullwidth'); 
    $mpdf->AddPage('A4-L'); // ตั้งค่ากระดาษ
    $html = ob_get_contents(); // ดึงข้อมูลที่เก็บไว้ในบัฟเฟอร์
    $mpdf->WriteHTML($html); // นำตัวแปรHTMLมาแสดงผล
    $mpdf->Output("MyReport.pdf"); // ส่งไปที่ไฟล์Myreport   
    ob_end_flush();
    header("Location:MyReport.pdf");
?>
<center><a  href="MyReport.pdf" target="_blank"><button type="button" class="btn btn-success">ดาวโหลดเอกสาร</botton></a><center>

</body>
</html>
