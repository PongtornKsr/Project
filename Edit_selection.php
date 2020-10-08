<!DOCTYPE html><?php SESSION_START(); require 'connect.php'; error_reporting(~E_NOTICE );  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/navbar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="javascript/Edit_select.js"></script>
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="stylesheet" href="CSS/fixedheader.css">
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="stylesheet" href="CSS/tab.css">
    <link rel="shortcut icon" href="img/computer.png">
    <title>CS_Asset</title>
</head>
<body>
    <?php require 'nav.php'; ?>
   
    <br><br><br><br><br>
<div class = "container">
<div class="tab"style="text-align: center;">
  <button class="tablinks" id = "tabstat">สถานะครุภัณฑ์</button>
  <button class="tablinks" id = "tabtype">ประเภทครุภัณฑ์</button>
  <button class="tablinks" id = "tabdtype">ประเภทการติดตั้ง</button>
  <!--<button class="tablinks" id = "tabgm">วิธีการได้รับ</button>-->
  <!--<button class="tablinks" id = "tabmt">ประเภทเงินงบประมาณ</button>-->
  <button class="tablinks" id = "tabrp">ผู้รับผิดชอบ</button>
  <button class="tablinks" id = "tabrm">ห้องที่จัดเก็บ</button>
  <button class="tablinks" id = "tabvd">บริษัทผู้ค้า</button>
</div>

<div id="stat" class="tabcontent">
  <form class = "whitebox" action= "" name="add_detail" id="add_detail" method = "POST" >  
  <div align="center">
  <div align= "center" style = "width:80%" >
  <br><br>
  
  <h2 id = "stat_da">สถานะครุภัณฑ์</h2><br>
<input type="text" placeholder= "ค้นหาสถานะ"style = "float:right" id = "stat_search" value= ""> <button style = "float:left" type="button" name="add" id="addstat" class="btn btn-info">เพิ่มสถานะครุภัณฑ์</button>
<br>
    <br>
    <div id="alert_message_stat"></div>
    <div style = "height:350px;overflow-y:auto;">
    <table style = "width:100%;height:100%;text-align:center;vertical-align:middle" id="stat_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>สถานะครุภัณฑ์</th>
       <th>สีสถานะครุภัณฑ์</th>
       <th>ตัวเลือก</th>
      </tr>
     </thead>
    
    </table>
    </div>
  </div>
  </div>
</form>
</div>

<div id="type" class="tabcontent">
  <form class = "whitebox" action= "" name="add_detail" id="add_detail" method = "POST" >  
  <div align= "center" >
  <br><br>
  <div align= "center"style ="width:80%">
  <h2 id = "type_da">ประเภทครุภัณฑ์</h2><br>
     <input type="text" placeholder= "ค้นหาประเภท"style = "float:right" id = "type_search"> <button style = "float:left" type="button" name="add" id="addtype" class="btn btn-info">เพิ่มประเภทครุภัณฑ์</button>
     <br>
    
    <br>
    <div id="alert_message_type"></div>
    <div style = "height:350px;overflow-y:auto;">
    <table style = "width:100%;height:100%;text-align:center;vertical-align:middle" id="type_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>รหัสประเภทครุภัณฑ์</th>
       <th>ประเภทครุภัณฑ์</th>
       <th>ลักษณะนาม</th>
       <th>ตัวเลือก</th>
      </tr>
     </thead>
    
    </table>
    </div>
  </div>
  </div>
</form>
</div>

<div id="dtype" class="tabcontent">
  <form class = "whitebox" action= "" name="add_detail" id="add_detail" method = "POST" >  
  <div align = "center">
  <br><br>
  <div align= "center"style ="width:60%">

  <h2 id = "dtype_da">ลักษณะการติดตั้งครุภัณฑ์</h2><br>
     <input type="text" placeholder= "ค้นหาลักษณะการติดตั้ง"style = "float:right" id = "dtype_search"> <button style = "float:left" type="button" name="add" id="adddtype" class="btn btn-info">เพิ่มลักษณะการติดตั้ง</button>
     <br>
   
    <br>
    <div id="alert_message_dtype"></div>
    <div style = "height:350px;overflow-y:auto;">
    <table style = "width:100%;height:100%;text-align:center;vertical-align:middle" id="dtype_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>รหัสประเภทการติดตั้ง</th>
       <th>ประเภทการติดตั้ง</th>
       <th>ตัวเลือก</th>
      </tr>
     </thead>
    
    </table>
    </div>
  </div>
 </div>
</form>
</div>

<!--<div id="gm" class="tabcontent">
  <form class = "whitebox" action= "" name="add_detail" id="add_detail" method = "POST" >  
  <div align= "center" >
  <br><br>
  <div align= "center"style ="width:60%">
  
  <h2 id = "gm_da">วิธีการได้รับ</h2><br>
     <input type="text" placeholder= "ค้นหาวิธีได้รับ"style = "float:right" id = "gm_search"> <button style = "float:left" type="button" name="add" id="addgm" class="btn btn-info">เพิ่มวิธีการได้รับ</button>
     <br>
   
    <br>
    <div id="alert_message_gm"></div>
    <div style = "height:350px;overflow-y:auto;">
    <table style = "width:100%;height:100%;text-align:center;vertical-align:middle" id="gm_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>รหัสวิธีการได้รับ</th>
       <th>วิธีการได้รับ</th>
       <th>ตัวเลือก</th>
      </tr>
     </thead>
    
    </table>
    </div>
  </div>
  </div>
</form>
</div>

<div id="mt" class="tabcontent">
<form class = "whitebox" action= "" name="add_detail" id="add_detail" method = "POST" >  
  <div align= "center" >
  <br><br>
  <div align= "center"style ="width:80%">
  
  <h2 id = "mt_da">ประเภทเงินงบประมาณ</h2><br>
     <input type="text" placeholder= "ค้นหาประเภทเงินงบประมาณ"style = "float:right" id = "mt_search"> <button style = "float:left" type="button" name="add" id="addmt" class="btn btn-info">เพิ่มประเภทเงินงบประมาณ</button>
     <br>
  
    <br>
    <div id="alert_message_mt"></div>
    <div style = "height:350px;overflow-y:auto;">
    <table style = "width:100%;height:100%;text-align:center;vertical-align:middle" id="mt_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>รหัสประเภทเงินงบประมาณ</th>
       <th>ประเภทเงินงบประมาณ</th>
       <th>ตัวเลือก</th>
      </tr>
     </thead>
    
    </table>
    </div>
  </div>
  </div>
</form>
</div> -->

<div id="rp" class="tabcontent">
<form class = "whitebox" action= "" name="add_detail" id="add_detail" method = "POST" >  
  <div align= "center" >
  <br><br>
  <div align= "center"style ="width:80%">
  
  <h2 id = "rp_da">ผู้รับผิดชอบ</h2><br>
     <input type="text" placeholder= "ค้นหาผู้รับผิดชอบ"style = "float:right" id = "rp_search"> <button style = "float:left" type="button" name="add" id="addrp" class="btn btn-info">เพิ่มผู้รับผิดชอบ</button>
     <br>

    <br>
    <div id="alert_message_rp"></div>
    <div style = "height:350px;overflow-y:auto;">
    <table style = "width:100%;height:100%;text-align:center;vertical-align:middle" id="rp_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>รหัสผู้รับผิดชอบ</th>
       <th>ชื่อผู้รับผิดชอบ</th>
       <th>นามสกุลผู้รับผิดชอบ</th>
       <th>ตัวเลือก</th>
      </tr>
     </thead>
    
    </table>
    </div>
  </div>
  </div>
</form>
</div>

<div id="rm" class="tabcontent">
<form class = "whitebox" action= "" name="add_detail" id="add_detail" method = "POST" >  
  <div align= "center" >
  <br><br>
  <div align= "center"style ="width:60%">
  <h2 id = "rm_da">ห้องที่จัดเก็บครุภัณฑ์</h2><br>
     <input type="text" placeholder= "ค้นหาห้องที่จัดเก็บ"style = "float:right" id = "rm_search"> <button style = "float:left" type="button" name="add" id="addrm" class="btn btn-info">เพิ่มห้องที่จัดเก็บ</button>
     <br>
  
    <br>
    <div id="alert_message_rm"></div>
    <div style = "height:350px;overflow-y:auto;">
    <table style = "width:100%;height:100%;text-align:center;vertical-align:middle" id="rm_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>รหัสห้องจัดเก็บ</th>
       <th>ห้องจัดเก็บ</th>
       <th>ตัวเลือก</th>
      </tr>
     </thead>
    
    </table>
    </div>
  </div>
  </div>
</form>
</div>

<div id="vd" class="tabcontent">
<form class = "whitebox" action= "" name="add_detail" id="add_detail" method = "POST" >  
  <div align= "center" >
  <br><br>
  <div align= "center"style ="width:90%">
  <h2 id = "vd_da">ข้อมูลผู้ค้า</h2><br>
     <input type="text" placeholder= "ค้นหาผู้ค้า"style = "float:right" id = "vd_search"> <button style = "float:left" type="button" name="add" id="addvd" class="btn btn-info">เพิ่มผู้ค้า</button>
     <br>
  
    <br>
    <div id="alert_message_vd"></div>
    <div style = "height:350px;overflow-y:auto;">
    <table style = "width:100%;height:100%;text-align:center;vertical-align:middle" id="vd_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>รหัสผู้ค้า</th>
       <th>บริษัทผู้ค้า</th>
       <th>ที่อยู่บริษัท</th>
       <th>โทรศัพท์</th>
       <th>โทรสาร</th>
       <th>ตัวเลือก</th>
      </tr>
     </thead>
    
    </table>
    </div>
  </div>
  </div>
</form>
</div>

</div>
<?php require 'footer.php'; ?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>