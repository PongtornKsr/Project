<!DOCTYPE html><?php SESSION_START(); include 'connect.php';
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>ภาพรวมครุภัณฑ์</h1>
<?php 
if(!empty($_POST['img1'])){
    echo $_POST['img1'].'<br>';
}
if(!empty($_POST['img2'])){
    echo $_POST['img2'].'<br>';
}
if(!empty($_POST['img3'])){
    echo $_POST['img3'].'<br>';
}
if(!empty($_POST['img4'])){
    echo $_POST['img4'].'<br>';
}
if(!empty($_POST['img5'])){
    echo $_POST['img5'].'<br>';
}

?>
</body>
</html>

</tbody>
</table>


<?php  
    $paperaxis = $_SESSION['axis'];
    $mpdf->SetDisplayMode('fullwidth'); 
    
        $mpdf->AddPage('P');
    
    // ตั้งค่ากระดาษ
    $html = ob_get_contents(); // ดึงข้อมูลที่เก็บไว้ในบัฟเฟอร์
    $mpdf->WriteHTML($html); // นำตัวแปรHTMLมาแสดงผล
    $mpdf->Output("pdf/Asset_Overview.pdf"); // ส่งไปที่ไฟล์Myreport   
    
   
    ?>
    <center><a  href="pdf/Asset_Overview.pdf" target="_blank"><button type="button" class="btn btn-success">ดาวโหลดเอกสาร</botton></a><center>
</body>
</html>
<?php 

header("Location: pdf/Asset_Overview.pdf"); 

ob_end_flush();
?>