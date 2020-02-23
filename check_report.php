<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/css_report.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .center {
  position: fixed;
  top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
}
    </style>
    
</head>
<body>
<?php require 'nav.php'; ?>
<div class="testbox">
      <form action="/">
        <h1>พิมพ์เอกสารตรวจสอบครุภัณฑ์</h1>
        <div class="item">
          <p>สาขา/แผนก</p>
          <div>
            <input type="text" name="major" />
          </div>
        </div>
        <div class="item">
          <p>วันที่</p>
          <input type="date" name="name" required/>
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <p>เครื่องยี่ห้อ</p>
          <div>
            <input type="text" name="major" />
          </div>
        </div>
        <div class="item">
          <p>รุ่น</p>
          <div>
            <input type="text" name="major" />
          </div>
        </div>
        <div class="item">
          <p>รหัส</p>
          <div>
            <input type="text" name="major" />
          </div>
        </div>
       <!-- <div class="item">
          <p>เหตุผล</p>
          <textarea rows="5"></textarea>
        </div>
         <div class="item">
          <p>Your department</p>
          <select>
            <option value="">*Please select*</option>
            <option value="A">Department A</option>
            <option value="B">Department B</option>
            <option value="C">Department C</option>
            <option value="D">Department D</option>
            <option value="E">Department E</option>
          </select>
        </div> -->
        <div class="item">
          <p>ประธานกรรมการ</p>
          <input type="text" name="name"/>
        </div>
        <div class="item">
          <p>กรรมการ</p>
          <input type="text" name="name"/>
        </div>
        <div class="item">
          <p>กรรมการและเลขานุการ</p>
          <input type="text" name="name"/>
        </div>
       
        <div class="btn-block">
          <button type="submit" href="/">Send</button>
        </div>
      </form>
    </div>
</body>
</html>
<?php require 'footer.php'; ?>
<?php
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
    $thai_date_return.= "ที่ ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
    $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}
$eng_date=strtotime("2020-02-12"); 
echo thai_date($eng_date);
?>
