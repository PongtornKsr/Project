
<!DOCTYPE html>
<?php SESSION_START(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="Css/management.css"> 
    <link rel="stylesheet" href="Css/BG.css"> 
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/fixedheader.css">
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="shortcut icon" href="img/computer.png">
    <title>CS_Asset</title>
    <style>
    table a:visited {
      color: #403f3f;
    }
    table a {
      color: #403f3f;
    }
    </style>
   
</head>

<body>
    
<?php require 'nav.php'; ?>
<!-- action กับ method ห้ามเปลี่ยน-->
<form>
<center>

<div class="brand_logo_container">

      <img src="img/LOGOxx.png" class="brand_logo" alt="Logo" height= "230px">
   </div>
<br>
                             <div class = "whitebox" style="width:80%">  
                                
                                
                   
                      
                        
                          

                               
                                
                                  
                                  <div style ="font-size: 35px">จัดการผู้ใช้งาน</div>
                                 <div><label style ="float:left"><img src="img/magnifying-glass.png" class="brand_logo" alt="Logo" height= "35px"> ค้นหาผู้ใช้งาน : </label><span style = "display:block;overflow:hidden;">  <input type="text" style ="width:20%;float:left" name="search_text" id="search_text" placeholder="ค้นหา" class="form-control" /></span></div>
                                 
                          
                                
                                
                             
                        
                      
                     
                    <br>

    <div  id="sort_table" style="height:450px;width:100%;overflow-y:auto ">
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
</div>
</center>


</form>
<?php require 'footer.php'; ?>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="javascript/accmanage.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>