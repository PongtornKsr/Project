
<!DOCTYPE html>
<?php SESSION_START(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/management.css"> 
    <link rel="stylesheet" href="Css/BG.css"> 
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/fixedheader.css">
    <title>CS_Asset</title>
    <!--ทำให้หัวตารางไม่เลื่อน-->
   
</head>

<body>
    
<?php require 'nav.php'; ?>
<!-- action กับ method ห้ามเปลี่ยน-->
<form>
<center>

<div class="brand_logo_container">

      <img src="img/LOGOxx.png" class="brand_logo" alt="Logo">
   </div>

                                <div class="d-flex justify-content-center form_container">
                                
                   
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                                  <div class="input-group" id="adv-search">
                                  <!-- name ห้ามเปลี่ยน , textbox กับ ปุ่มกดต้องอยู่ form เดียวกัน และปุ่มทุกปุ่มต้องเป็น type submit-->
                                  
                                  <span class="input-group-text">Search</span>
                                 <input type="text" name="search_text" id="search_text" placeholder="Search Keyword" class="form-control" />
                                 
                                </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                     
                    <br><br>

    <div  id="sort_table" style="height:450px;width:90%;overflow-y:auto ">
    <table class="table bg-light text-dark table-bordered table-striped" width="100%" height="100%">
  <thead>
    <tr>
      <th scope="col"><a class= "column_sort" id="givenName" data-order="desc" href="#" >ชื่อ</a></th>
      <th scope="col"><a class= "column_sort" id="familyName" data-order="desc" href="#" >นามสกุล</a></th>
      <th scope="col"><a class= "column_sort" id="email" data-order="desc" href="#" >อีเมล</a></th>
	  <th scope="col"><a class= "column_sort" id="stat_name" data-order="desc" href="#" >สถานะ</a></th>
      <th scope="col"><a class= "column_sort" id="profile_name" data-order="desc" href="#" >ประเภทบัญชี</a></th>
      <th scope="col"><a class= "column_sort" id="last_update" data-order="desc" href="#" >แก้ไขล่าสุด</a></th>
	  <th scope="col">Edit</th> 
	  
    </tr>
  </thead>

  <tbody>
      
        
    </tbody>
</table>
</div>
</center>

<br><br>
</form>
<?php require 'footer.php'; ?>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="javascript/accmanage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>