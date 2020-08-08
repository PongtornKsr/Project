<?php

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
    <title>MPDF</title>
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

$Dot = "...............";
$A = "25/8";
$B = "หน่วยครุภัณฑ์คอมพิวเตอร์";
$C = "7440-010-0001-04-58/8.1-8.2วท";
$D = "";
$E = "";

$F = "คณะวิทยาศาสตร์และเทคโนโลยี";
$G = "บริษัทเจนแมเนจเม้น กรุ๊ป จำกัด";

$H = "432/42 ถนนทรงวาด แขวงจักรวรรดิ เขตสัมพันธวงศ์ กรุงเทพมหานคร 10100";
$I = "086-5110204";
$J = "-";

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
  <table class='table borderless'>

   <col width="250"> 
   <col width="250"> 
   <col width="250"> 
   <col width="250"> 
   <tr>
   <td></td>
   <td><input type="RADIO" name="chkColor1" value="1" align = "center">&nbsp; &nbsp;  เงินงบประมาณ(งปม.) </td>
   <td><input type="RADIO" name="chkColor1" value="Blue"> &nbsp; &nbsp; เงินนอกงบประมาณ </td>
   <td><input type="RADIO" name="chkColor1" value="Green"&nbsp; &nbsp; >&nbsp; &nbsp; เงินบริจาคช่วยเหลือ   </td>
   <td><input type="RADIO" name="chkColor1" value="Green"> &nbsp; &nbsp; อื่นๆ  <br></td>
   </tr>
    <tr>
    <td> <p>วิธีที่ได้รับมา </p></td>
    <td><input type="RADIO" name="chkColor1" value="Blue"> &nbsp; &nbsp; ตกลงราคา  </td>
    <td> <input type="RADIO" name="chkColor1" value="Green">&nbsp; &nbsp; สอบราคา  </td>
    <td> <input type="RADIO" name="chkColor1" value="Green">&nbsp; &nbsp; ประกวดราคา E-auction  </td>
    <td><input type="RADIO" name="chkColor1" value="Green">&nbsp; &nbsp; วิธีพิเศษ  </td>
    <td> <input type="RADIO" name="chkColor1" value="Green">&nbsp; &nbsp; รับบริจาค  </td>
   </tr>
   </table>
   <label><Input class="radio" type = 'Radio' checked Name ='target' value= 'r1'>Enable </label>
   <label><Input class="radio" type = 'Radio' Name ='target' value= 'r2'>Disable </label><br /><br />
  <table class="table table-bordered"> 
  <tr>
    <th rowspan=2>วัน/เดือน/ปี</th>
    <th rowspan=2>เลขที่เอกสาร</th> 
    <th align="center" rowspan=2>รายการ</th>
    <th rowspan=2>จำนวน/หน่วย</th>
    <th align="center" rowspan=2>ราคาต่อ หน่วย/ชุด/กลุ่ม</th>
    <th rowspan=2>มูลค่ารวม</th>
    <th rowspan=2>อายุใช้งาน</th>
    <th rowspan=2>ค่าเสื่อมราคาประจำปี</th>
    <th rowspan=2>ค่าเสื่อมราคาสะสม</th>
    <th rowspan=2>มูลค่าสุทธิ</th>
    <th align="center" colspan="2">รายการเปลี่ยนแปลง การเคลื่อนย้ายสถานภาพ</th>
  </tr>

  <tr>
  <th align="center">รายการเปลี่ยน</th>
  <th align="center">เลขที่เอกสาร</th>
</tr>

  <tr>
    <td align="center">21 มค 58</td> <!--วันที่-->
    <td align="center">วท.2/2558</td> <!--เลขเอกสาร-->
    <td align="center">เครื่องคอมพิวเตอร์สำหรับการสอน</td> <!--รายการ-->
    <td align="center">2 ชุด</td>  <!--จำนวนชุด-->
    <td align="center"> 80,000</td>  <!--ราคาต่อหน่วย-->
    <td align="center">160,000</td>  <!--ราคารวม-->
    <td align="center">3 ปี</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">16.7</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">10,000</td> <!--ค่าเสื่อมสะสม-->
    <td align="center">120,000</td> <!--มูลค่าสุทธื-->
    <td align="center">2</td>  <!--รายการเปลี่ยนแปลง-->
    <td align="center">2/59</td>  <!--เลขที่เอกสาร-->   

  </tr>

  <tr>
    <td align="center">21 มค 58</td> <!--วันที่-->
    <td align="center">วท.2/2558</td> <!--เลขเอกสาร-->
    <td align="center">เครื่องคอมพิวเตอร์สำหรับการสอน</td> <!--รายการ-->
    <td align="center">2 ชุด</td>  <!--จำนวนชุด-->
    <td align="center"> 80,000</td>  <!--ราคาต่อหน่วย-->
    <td align="center">160,000</td>  <!--ราคารวม-->
    <td align="center">3 ปี</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">16.7</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">10,000</td> <!--ค่าเสื่อมสะสม-->
    <td align="center">120,000</td> <!--มูลค่าสุทธื-->
    <td align="center">2</td>  <!--รายการเปลี่ยนแปลง-->
    <td align="center">2/59</td>  <!--เลขที่เอกสาร-->
    
    
  </tr>
  <tr>
    <td align="center">21 มค 58</td> <!--วันที่-->
    <td align="center">วท.2/2558</td> <!--เลขเอกสาร-->
    <td align="center">เครื่องคอมพิวเตอร์สำหรับการสอน</td> <!--รายการ-->
    <td align="center">2 ชุด</td>  <!--จำนวนชุด-->
    <td align="center"> 80,000</td>  <!--ราคาต่อหน่วย-->
    <td align="center">160,000</td>  <!--ราคารวม-->
    <td align="center">3 ปี</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">16.7</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">10,000</td> <!--ค่าเสื่อมสะสม-->
    <td align="center">120,000</td> <!--มูลค่าสุทธื-->
    <td align="center">2</td>  <!--รายการเปลี่ยนแปลง-->
    <td align="center">2/59</td>  <!--เลขที่เอกสาร-->   

  </tr>

  <tr>
    <td align="center">21 มค 58</td> <!--วันที่-->
    <td align="center">วท.2/2558</td> <!--เลขเอกสาร-->
    <td align="center">เครื่องคอมพิวเตอร์สำหรับการสอน</td> <!--รายการ-->
    <td align="center">2 ชุด</td>  <!--จำนวนชุด-->
    <td align="center"> 80,000</td>  <!--ราคาต่อหน่วย-->
    <td align="center">160,000</td>  <!--ราคารวม-->
    <td align="center">3 ปี</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">16.7</td>  <!--ค่าเสื่อมประจำปี-->
    <td align="center">10,000</td> <!--ค่าเสื่อมสะสม-->
    <td align="center">120,000</td> <!--มูลค่าสุทธื-->
    <td align="center">2</td>  <!--รายการเปลี่ยนแปลง-->
    <td align="center">2/59</td>  <!--เลขที่เอกสาร-->
    
    
  </tr>
 </table>

<?php

    $mpdf->SetDisplayMode('fullwidth'); 
    $mpdf->AddPage('A4-L'); // ตั้งค่ากระดาษ
    $html = ob_get_contents(); // ดึงข้อมูลที่เก็บไว้ในบัฟเฟอร์
    $mpdf->WriteHTML($html); // นำตัวแปรHTMLมาแสดงผล
    $mpdf->Output("MyReport.pdf"); // ส่งไปที่ไฟล์Myreport   
    ob_end_flush();
   
?>
<center><a href="MyReport.pdf"><button type="button" class="btn btn-success">ดาวโหลดเอกสาร</botton></a><center>