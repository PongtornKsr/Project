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
        <a  href="Excel_v/upload_ex/ตัวอย่างอัพโหลด.xlsx" target="_blank"><button type="button" class='btn btn-outline-success'>ดาวน์โหลดตัวอย่างไฟล์นำเข้าข้อมูล</button></a>
        </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
<script>
$(document).ready(function(){
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