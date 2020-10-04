<?php
require 'Excel_v/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

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


$spreadsheet->setActiveSheetIndex(0);

//set default font
$spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
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

$spreadsheet->getActivesheet()->mergeCells("A5:A6");
$spreadsheet->getActivesheet()->mergeCells("B5:B6");
$spreadsheet->getActivesheet()->mergeCells("C5:C6");
$spreadsheet->getActivesheet()->mergeCells("D5:D6");
$spreadsheet->getActivesheet()->mergeCells("E5:E6");
$spreadsheet->getActivesheet()->mergeCells("F5:F6");
$spreadsheet->getActivesheet()->mergeCells("G5:G6");
$spreadsheet->getActivesheet()->mergeCells("H5:H6");



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
$spreadsheet
->getActiveSheet()
    ->setCellValue('A1', 'มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ')
    ->setCellValue('A2', 'รายละเอียดครุภัณฑ์สำนักงาน  คงเหลือ')
    ->setCellValue('G4', 'สาขาวิชาวิทยาการคอมพิวเตอร์')

    ->setCellValue('A5', 'ลำดับที่')
    
    
    ->setCellValue('B5', 'หมายเลขประจำครุภัณฑ์')

    ->setCellValue('C5', 'รายการ (ยี่ห้อ ชนิด แบบ ลักษณะ)')
    

    ->setCellValue('D5', 'หมายเลข (ทะเบียน)')
    

    ->setCellValue('E5', 'จำนวน (หน่วย)')
   

    ->setCellValue('F5', 'ราคาต่อ (หน่วย/บาท)')
    

    ->setCellValue('G5', 'จำนวนเงิน (บาท)')
    
    
    ->setCellValue('H5', 'หมายเหตุ');

 // หาแถวข้อมูลสุดท้าย ไม่รวมแถวหัวข้อ

$sheet->getStyle('A5:H6')->applyFromArray($styleArray_header);

$spreadsheet->getActiveSheet()->setTitle('สำนักงานFinal');


$spreadsheet->createSheet();
$spreadsheet->setActiveSheetIndex(1);
$spreadsheet->getActiveSheet()->setTitle('อื่นๆFinal');
$sheet = $spreadsheet->getActiveSheet();
//set default font
$spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
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

$spreadsheet->getActivesheet()->mergeCells("A5:A6");
$spreadsheet->getActivesheet()->mergeCells("B5:B6");
$spreadsheet->getActivesheet()->mergeCells("C5:C6");
$spreadsheet->getActivesheet()->mergeCells("D5:D6");
$spreadsheet->getActivesheet()->mergeCells("E5:E6");
$spreadsheet->getActivesheet()->mergeCells("F5:F6");
$spreadsheet->getActivesheet()->mergeCells("G5:G6");
$spreadsheet->getActivesheet()->mergeCells("H5:H6");



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
$spreadsheet
->getActiveSheet()
    ->setCellValue('A1', 'มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ')
    ->setCellValue('A2', 'รายละเอียดครุภัณฑ์สำนักงาน  คงเหลือ')
    ->setCellValue('G4', 'สาขาวิชาวิทยาการคอมพิวเตอร์')

    ->setCellValue('A5', 'ลำดับที่')
    
    
    ->setCellValue('B5', 'หมายเลขประจำครุภัณฑ์')

    ->setCellValue('C5', 'รายการ (ยี่ห้อ ชนิด แบบ ลักษณะ)')
    

    ->setCellValue('D5', 'หมายเลข (ทะเบียน)')
    

    ->setCellValue('E5', 'จำนวน (หน่วย)')
   

    ->setCellValue('F5', 'ราคาต่อ (หน่วย/บาท)')
    

    ->setCellValue('G5', 'จำนวนเงิน (บาท)')
    
    
    ->setCellValue('H5', 'หมายเหตุ');

 // หาแถวข้อมูลสุดท้าย ไม่รวมแถวหัวข้อ


$sheet->getStyle('A5:H6')->applyFromArray($styleArray_header);




$spreadsheet->createSheet();
$spreadsheet->setActiveSheetIndex(2);
$spreadsheet->getActiveSheet()->setTitle('วัสดุ(ชำรุด)');
$sheet = $spreadsheet->getActiveSheet();
//set default font
$spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
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


//merge heading
$spreadsheet->getActivesheet()->mergeCells("A1:F1");
$spreadsheet->getActivesheet()->mergeCells("A2:F2");
$spreadsheet->getActivesheet()->mergeCells("A3:F3");
$spreadsheet->getActivesheet()->mergeCells("E4:F4");

$spreadsheet->getActivesheet()->mergeCells("A5:A6");
$spreadsheet->getActivesheet()->mergeCells("B5:B6");
$spreadsheet->getActivesheet()->mergeCells("C5:C6");
$spreadsheet->getActivesheet()->mergeCells("D5:D6");
$spreadsheet->getActivesheet()->mergeCells("E5:E6");
$spreadsheet->getActivesheet()->mergeCells("F5:F6");




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
$spreadsheet
->getActiveSheet()
    ->setCellValue('A1', 'มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ')
    ->setCellValue('A2', 'รายละเอียดครุภัณฑ์สำนักงาน  คงเหลือ')
    ->setCellValue('E4', 'สาขาวิชาวิทยาการคอมพิวเตอร์')

    ->setCellValue('A5', 'ลำดับที่')
    
    
    ->setCellValue('B5', 'รายการ')

    ->setCellValue('C5', 'จำนวนหน่วย')
    

    ->setCellValue('D5', 'ราคาหน่วยต่อบาท')
    

    ->setCellValue('E5', 'จำนวนเงินบาท')
   

    ->setCellValue('F5', 'หมายเหตุ');

$sheet->getStyle('A5:F6')->applyFromArray($styleArray_header);





$writer = new Xlsx($spreadsheet);

// save file to server and create link
$writer->save('Excel_v/excel/ทะเบียนครุภัณฑ์.xlsx');
echo '<a href="Excel_v/excel/ทะเบียนครุภัณฑ์.xlsx">Download Excel</a>';

// save with browser
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition: attachment; filename="itoffside.xlsx"');
// $writer->save('php://output');
