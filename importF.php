<!DOCTYPE html><?php SESSION_START(); require 'connect.php';?>
<html>
   <head>
     <title>CS_Asset </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />  
     <link rel="stylesheet" href="CSS/navbar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="stylesheet" href="CSS/fixedheader.css">
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="shortcut icon" href="img/computer.png">
    <style>
    b {
      color:blue;
    }
    </style>
   </head>
   <body>
   <?php include 'nav.php'; ?>
   <br>
   <br>
   <br>
     <div class="container">
     
      <br />
      <div class= "whitebox">
      <h2 align="center">นำเข้าข้อมูลครุภัณฑ์</h3>
      <br />
        <div class="panel panel-default">
          <div class="panel-heading">นำเข้าข้อมูลครุภัณฑ์ จากไฟล์ Excel หรือ CSV</div>
          <div class="panel-body">
          <div class="table-responsive">
           <span id="message"></span>
              <form method="post" id="import_excel_form" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td width="25%" align="right">เลือกไฟล์ที่ต้องการนำเข้าข้อมูล</td>
                    <td width="50%"><input type="file" name="import_excel" /></td>
                    <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary" value="นำเข้า" /></td>
                  </tr>
                </table>
              </form>
           <br />
              
          </div>
          </div>
        </div>
        <a style = "float:right" href="Excel_v/upload_ex/ตัวอย่างอัพโหลด.xlsx" target="_blank"><button type="button" class='btn btn-outline-success'>ดาวน์โหลดตัวอย่างไฟล์นำเข้าข้อมูล</button></a><button type="button" id ="singleex" class='btn btn-success'>ขั้นตอนการนำเข้าข้อมูลด้วยExcel</button>
        <br>
        <div>
        <br>
        
        <!-- <button type="button" id ="nonsingleex" class='btn btn-success'>ตัวอย่างการนำเข้าข้อมูลแบบชุด</button> -->
        <div id= "see"><div  style ="font-size:20px">ขั้นตอนการนำเข้าข้อมูลด้วยExcel</div> 
        <p>การนำเข้าครุภัณฑ์จากไฟล์Excelจะใช้ข้อมูลในคอลัมน์ A จนถึง U กรณีเป็น<b>ครุภัณฑ์เดี่ยวไม่ได้มาเป็นชุดหรือระบบ</b> ให้ใส่ช่อง <b>ชื่อชุดครุภัณฑ์เป็น ค่าว่าง หรือ -</b> แต่ถ้า<b>หากเป็นครุภัณฑ์ชุดหรือระบบให้ใส่ชื่อชุดให้ตรงกัน และ ราคารวมชุดให้เหมือนกัน </b></p>
        <img src="img/ex1.png"  alt="Logoex1" >
        <p>1. ครุภัณฑ์ชนิดหรือแบบเดียวกันที่ <b>มีการไล่ลำดับเลขครุภัณฑ์</b> สามารถ <b>ใส่ขีดระหว่างกลางของลำดับหมายเลขครุภัณฑ์</b>ได้ แต่จะต้องใช้<b>หมายเลขครุภัณฑ์เริ่มต้นเดียวกัน</b></p>
        <p>2. ครุภัณฑ์ชนิดหรือแบบเดียวกันที่ <b>มีหมายเลขครุภัณฑ์และหมายเลขครุภัณฑ์เริ่มต้นที่แตกต่างกัน</b> สามารถ <b>ใส่ขีดระหว่างกลางของลำดับเลข</b>ได้</p>
        <img src="img/ex2.png" alt="Logoex2" >
        <p>3. วันที่ ให้ใส่เป็นรูปแบบ <b>วัน/เดือน/ปี ค.ศ.</b> โดยการแสดงผลรายละเอียดครุภัณฑ์บนระบบจะแสดงเป็นปี พ.ศ.หากใส่ - ระบบจะเพิ่มเป็นวันที่ปัจุบัน</p>
        <p>4. ห้องที่จัดเก็บ หากยัง<b>ไม่ระบุห้องที่จัดเก็บ</b>ให้ใส่ เป็น - หรือใส่ข้อมูลเป็น ไม่กำหนดห้อง</p>
        <p>5. ประเภทครุภัณฑ์ หากยัง <b>ไม่ระบุประเภท</b>ให้ใส่เป็น <b>- หรือ ไม่กำหนดประเภท</b>  หากเป็น<b>ประเภทครุภัณฑ์ใหม่</b>ในระบบ <b>ระบบจะเพิ่มให้อัตโนมัติ</b>  ตามที่ใส่ข้อมูลมาในช่องนั้นๆ  สามารถ<b>แก้ภายหลังได้ในหน้าจัดการตัวเลือก</b> </p>
        <img src="img/ex4.png" alt="Logoex4" >
        <p>6. ประเภทเงินงบประมาณ และ วิธีการได้รับ หากไม่ระบุให้ใส่เป็น <b>- หรือ ไม่กำหนด</b> สามารถแก้ได้ภายหลังในระบบ </p>
        <p>7. ลักษณะการติดตั้ง และ สถานะครุภัณฑ์ หากยังไม่ระบุสามารถใส่เป็น <b>- หรือ ไม่กำหนด</b> ได้  และถ้าหากเป็น<b>ลักษณะการติดตั้งหรือสถานะใหม่</b> <b>ระบบจะเพิ่มให้อัตโนมัติ</b> ตามที่ใส่ข้อมูลมาในช่องนั้นๆ  สามารถ<b>แก้ภายหลังได้ในหน้าจัดการตัวเลือก</b></p>
        
        <img src="img/ex3.png" alt="Logoex3" height="85px">
        <p>8. ทุกครุภัณฑ์ที่เป็นประเภทหรือแบบเดียวกันจะต้องมีข้อมูลทะเบียนทรัพย์สินตอนนำเข้าข้อมูลในระบบ <b style ="color:red">อย่างน้อย 1 แถวต่อครุภัณฑ์ 1 แบบที่เป็นแบบเดียวกัน</b> และหากเป็นแต่ใช้<b style ="color:red">ครุภัณฑ์แบบเดียวกันชนิดเดียวกันแต่มีเลขครุภัณฑ์ที่ต่างกัน</b> ทะเบียนคุมทรัพย์สินร่วมกัน ให้ใส่ <b style ="color:red">- หรือ ,</b> ระหว่างหมายเลขครุภัณฑ์เริ่มต้น ที่ใส่ใน แถวของ<b style ="color:red">ข้อมูลทะบียนคุมทรัพย์สิน ตั้งแต่ คอลัมน์ W จนถึง AJ</b></p>
        
        <p><b style ="color:red">หากหมายเลขครุภัณฑ์เริ่มต้นซ้ำกับข้อมูลที่มีอยู่ในระบบ ระบบจะไม่เพิ่มข้อมูลให้ในช่องที่เป็นข้อมูลซ้ำ</b></p>
        
        </div>
        <div id= "nonsee"><div  style ="font-size:20px">ตัวอย่างขั้นตอนการนำเข้าข้อมูลแบบชุด</div> 
        
        </div>
        </div>
        </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
<script>
$(document).ready(function(){
  var tog =false;
  $('#see').hide();
  $('#nonsee').hide();
  $('#singleex').on('click',function(){
    if(tog == false){
      tog = true;
      $('#see').show();
    }else {
      tog = false;
      $('#see').hide();
    }
    
  });
  $('#nonsingleex').on('click',function(){
    $('#see').hide();
    $('#nonsee').show();
  });
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"importP.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
});
</script>