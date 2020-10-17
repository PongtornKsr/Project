<?php
require 'connect.php';
require 'Excel_v/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$NO = array();
$setname = "";
$styleArray_header = [
    'font' => [ // จัดตัวอักษร
        'bold' => true, // กำหนดเป็นตัวหนา
    ],
    'alignment' => [  // จัดตำแหน่ง
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' => [ // กำหนดเส้นขอบ
        'allBorders' => [ // กำหนดเส้นขอบทั้งหมด
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],    
];
$head = [
    'font' => [ // จัดตัวอักษร
        'bold' => true, // กำหนดเป็นตัวหนา
    ]
];

function my_money_format($money){
    if(is_numeric($money)){
        return number_format($money,2);
    }
    else{
        return $money;
    }

}

$C = "";
$min = "";
$max = "";
$mas = "";
$cun = array();
$cmin = array();
$asset_number_min = "";
$asset_number_max = "";
$asnummin = array();
$asnummax = array();
function find_my_Id($setn){

    require 'connect.php';
    $C = "";
    $min = "";
    $max = "";
    $mas = "";
    $asset_number_min = "";
    $asset_number_max = "";
    $cun = [];
    $cmin = [];
    $asnummin = [];
    $asnummax = [];
    $sqlx = "SELECT * From asset WHERE asset_Set like '".$setn."' ORDER BY CAST(asset_number AS INT) asc LIMIT 1";
    $resultx = $conn->query($sqlx);
    if ($resultx->num_rows > 0) {
    while($rowx = $resultx->fetch_assoc()) {
    $min .= $rowx['asset_ID'];
    }
    }
    $cmin = explode(" ",$min);
    $sqlx = "SELECT asset_ID From asset WHERE asset_Set like '".$setn."' ORDER BY CAST(asset_number AS INT) DESC LIMIT 1";
    $resultx = $conn->query($sqlx);
    if ($resultx->num_rows > 0) {
    while($row = $resultx->fetch_assoc()) {
    $max .= $rowx['asset_ID'];
    }
    }

   



    $sqlx = "SELECT asset_number From asset WHERE asset_Set like '".$setn."' order by id DESC LIMIT 1";
    $resultx = $conn->query($sqlx);
    if ($resultx->num_rows > 0) {
    while($rowx = $resultx->fetch_assoc()) {
    $mas .= $rowx['asset_number'];
    }
    }
    $sqlx = "SELECT asset_number From asset WHERE asset_Set like '".$setn."'";
    $resultx = $conn->query($sqlx);
    if ($resultx->num_rows > 0) {
    while($rowx = $resultx->fetch_assoc()) {
    array_push($cun,$rowx['asset_number']);
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
    return $C;
}
$spreadsheet->setActiveSheetIndex(0);

//set default font
$spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('TH SarabunPSK')
            ->setSize(12);
//set size colum
$spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('D')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('E')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('F')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('G')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('H')
            ->setAutoSize(true);

//merge heading
$spreadsheet->getActivesheet()->mergeCells("A1:H1");
$spreadsheet->getActivesheet()->mergeCells("A2:H2");
$spreadsheet->getActivesheet()->mergeCells("G4:H4");
$spreadsheet->getActivesheet()->mergeCells("A3:H3");





//set font style
$spreadsheet->getActivesheet()->getStyle('A1')->getFont()->setSize(14);
$spreadsheet->getActivesheet()->getStyle('A2')->getFont()->setSize(14);
$spreadsheet->getActivesheet()->getStyle('A3')->getFont()->setSize(14);
$spreadsheet->getActivesheet()->getStyle('G4')->getFont()->setSize(14);

$spreadsheet->getActivesheet()->getStyle('A5')->getFont()->setSize(14);
$spreadsheet->getActivesheet()->getStyle('B5')->getFont()->setSize(14);
$spreadsheet->getActivesheet()->getStyle('C5')->getFont()->setSize(14);
$spreadsheet->getActivesheet()->getStyle('D5')->getFont()->setSize(14);

$spreadsheet->getActivesheet()->getStyle('E5')->getFont()->setSize(14);
$spreadsheet->getActivesheet()->getStyle('F5')->getFont()->setSize(14);
$spreadsheet->getActivesheet()->getStyle('G5')->getFont()->setSize(14);
$spreadsheet->getActivesheet()->getStyle('H5')->getFont()->setSize(14);

//set cell alignment
$spreadsheet->getActivesheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActivesheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);




 
// header
    $active = $spreadsheet->getActiveSheet();
    $active->setCellValue('A1', 'มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ');
    $active->setCellValue('A2', 'รายละเอียดครุภัณฑ์สำนักงาน  คงเหลือ');
    $active->setCellValue('G4', 'สาขาวิชาวิทยาการคอมพิวเตอร์');
    $active->setCellValue('A5', 'ลำดับที่');
    $active->setCellValue('B5', 'หมายเลขประจำครุภัณฑ์');
    $active->setCellValue('C5', 'รายการ (ยี่ห้อ ชนิด แบบ ลักษณะ)');
    $active->setCellValue('D5', 'หมายเลข (ทะเบียน)');
    $active->setCellValue('E5', 'จำนวน (หน่วย)');
    $active->setCellValue('F5', 'ราคาต่อ (หน่วย/บาท)');
    $active->setCellValue('G5', 'จำนวนเงิน (บาท)');
    $active->setCellValue('H5', 'หมายเหตุ');

$sql = "SELECT No,asset_Setname FROM asset GROUP BY No";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    array_push($NO,$row['No']);
    //array_push($Settname,$row['asset_Setname']);
}
};
 // หาแถวข้อมูลสุดท้าย ไม่รวมแถวหัวข้อ
 $aorder = "";
 $price = "";
 $gprice = "";
 $note = "";
 $rowstart = 6; 
 for($i = 0 ; $i < count($NO); $i ++){
        $text = 'A'.($i+$rowstart).'';
        $active->setCellValue($text, $NO[$i]);
        $sql = "SELECT * FROM asset WHERE No = '".$NO[$i]."' GROUP BY No";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $setname = $row['asset_setname'];
            $aorder = $row['asset_order'];
            $price = $row['price_per_qty'];
            $gprice = $row['group_price'];
            $note = $row['note'];

        }
        $setname = str_replace(' ', '', $setname);
        $setname = str_replace('-', '', $setname);
        if($setname != "" || $setname != NULL || !empty($setname))
        {
            $active->getStyle('F'.($i+$rowstart).'')->getNumberFormat()->setFormatCode('.00');
            $active->getStyle('G'.($i+$rowstart).'')->getNumberFormat()->setFormatCode('.00');
            $active->getStyle('F'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $active->getStyle('G'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $active->getStyle('D'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $active->getStyle('H'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $active->getStyle('E'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $active->getStyle('A'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $active->getStyle('C'.($i+$rowstart).'')->applyFromArray($head);
            $active->getStyle('D'.($i+$rowstart).'')->applyFromArray($head);
            $active->getStyle('E'.($i+$rowstart).'')->applyFromArray($head);
            $active->getStyle('F'.($i+$rowstart).'')->applyFromArray($head);
            $active->getStyle('G'.($i+$rowstart).'')->applyFromArray($head);
            $active->getStyle('H'.($i+$rowstart).'')->applyFromArray($head);
            $active->setCellValue( 'C'.($i+$rowstart).'', $setname.' ประกอบด้วย');
            $active->setCellValue( 'D'.($i+$rowstart).'', $aorder);
            $active->setCellValue( 'E'.($i+$rowstart).'', '1 ชุด');
            $active->setCellValue( 'F'.($i+$rowstart).'', my_money_format($gprice));
            $active->setCellValue( 'G'.($i+$rowstart).'', my_money_format($gprice));
            $active->setCellValue( 'H'.($i+$rowstart).'', $note);
            $sql = "SELECT * , COUNT(quantity) as ct FROM asset NATURAL JOIN assettype WHERE No = '".$NO[$i]."' GROUP by asset_name";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $p = 1;
                while($row = $result->fetch_assoc()) {
                    $rowstart+=1;
                    $active->setCellValue( 'B'.($i+$rowstart).'', find_my_Id($row['asset_Set']));
                    if($row['model'] == NULL || $row['model'] == "-" || $row['model'] == ""){
                        if($row['property'] == NULL || $row['property'] == "-" || $row['property'] == ""){
                            $active->setCellValue( 'C'.($i+$rowstart).'', $p.'.'.$row['asset_name']);
                            $p+=1;
                        }else{
                            $active->setCellValue( 'C'.($i+$rowstart).'', $p.'.'.$row['asset_name'].' '.$row['property']);
                            $p+=1;
                        }
 
                    }else {
                        if($row['property'] == NULL || $row['property'] == "-" || $row['property'] == ""){
                            $active->setCellValue( 'C'.($i+$rowstart).'', $p.'.'.$row['asset_name'].' '.$row['model']);
                            $p+=1;
                        }else{
                            $active->setCellValue( 'C'.($i+$rowstart).'', $p.'.'.$row['asset_name'].' '.$row['property'].' '.$row['model']);
                            $p+=1;
                        }

                    }
                    $active->getStyle('E'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $active->getStyle('A'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $active->setCellValue( 'E'.($i+$rowstart).'', $row['ct'].' '.$row['noun']);



                }
            }
        }
        else {
            $sql = "SELECT * , COUNT(quantity) as ct , SUM(price_per_qty) as ppq FROM asset NATURAL JOIN assettype WHERE No = '".$NO[$i]."' GROUP by asset_Setname";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $p = 1;
                while($row = $result->fetch_assoc()) {
                    
                    $active->setCellValue( 'B'.($i+$rowstart).'', find_my_Id($row['asset_Set']));
                    if($row['model'] == NULL || $row['model'] == "-" || $row['model'] == ""){
                        if($row['property'] == NULL || $row['property'] == "-" || $row['property'] == ""){
                            $active->setCellValue( 'C'.($i+$rowstart).'', $row['asset_name']);
                            $p+=1;
                        }else{
                            $active->setCellValue( 'C'.($i+$rowstart).'', $row['asset_name'].' '.$row['property']);
                            $p+=1;
                        }
 
                    }else {
                        if($row['property'] == NULL || $row['property'] == "-" || $row['property'] == ""){
                            $active->setCellValue( 'C'.($i+$rowstart).'', $row['asset_name'].' '.$row['model']);
                            $p+=1;
                        }else{
                            $active->setCellValue( 'C'.($i+$rowstart).'', $row['asset_name'].' '.$row['property'].' '.$row['model']);
                            $p+=1;
                        }

                    }
                    $active->setCellValue( 'D'.($i+$rowstart).'', $row['asset_order']);
                    $active->getStyle('F'.($i+$rowstart).'')->getNumberFormat()->setFormatCode('.00');
                    $active->getStyle('G'.($i+$rowstart).'')->getNumberFormat()->setFormatCode('.00');
                    $active->getStyle('F'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                    $active->getStyle('G'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                    $active->getStyle('D'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $active->getStyle('H'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $active->getStyle('E'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $active->getStyle('A'.($i+$rowstart).'')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $active->getStyle('F'.($i+$rowstart).'')->getNumberFormat()->setFormatCode('.00');
                    $active->getStyle('G'.($i+$rowstart).'')->getNumberFormat()->setFormatCode('.00');
                    $active->setCellValue( 'E'.($i+$rowstart).'', $row['ct'].' '.$row['noun']);
                    $active->setCellValue( 'F'.($i+$rowstart).'', my_money_format($row['price_per_qty']));
                    $active->setCellValue( 'G'.($i+$rowstart).'', my_money_format($row['ppq']));
                    $active->setCellValue( 'H'.($i+$rowstart).'', $row['note']);
                    
                    
                }
            } 




        }
        
    }

    }




   


$sheet->getStyle('A5:H5')->applyFromArray($styleArray_header);
$writer = new Xlsx($spreadsheet);

// save file to server and create link
$writer->save('Excel_v/excel/ทะเบียนครุภัณฑ์.xlsx');
echo '<a href="Excel_v/excel/ทะเบียนครุภัณฑ์.xlsx">Download Excel</a>';
header('location: Excel_v/excel/ทะเบียนครุภัณฑ์.xlsx');
// save with browser
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition: attachment; filename="itoffside.xlsx"');
// $writer->save('php://output');
exit();
?>