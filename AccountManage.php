<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<?php SESSION_START(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/management.css"> 
    <link rel="stylesheet" href="Css/BG.css"> 
    <title>Document</title>
    <!--ทำให้หัวตารางไม่เลื่อน-->
    <style>
    body{
    align-items: center;
    
}
table tbody, table thead
{
    display: block;
}
table tbody 
{
    align-items: center;
   overflow: auto;
   height: 450px;
   width: 100%;
}
th
{
    width: 72px;
    
}
td
{
    width: 72px;
}
table th:nth-child(1), td:nth-child(1) { min-width: 150px;  max-width: 150px; text-align: center;}
table th:nth-child(2), td:nth-child(2) { min-width: 300px;  max-width: 300px; text-align: center;}
table th:nth-child(3), td:nth-child(3) { min-width: 500px;  max-width: 500px; text-align: center;}
table th:nth-child(4), td:nth-child(4) { min-width: 200px;  max-width: 200px; text-align: center;}
table th:nth-child(5), td:nth-child(5) { min-width: 200px;  max-width: 200px; text-align: center;}
table th:nth-child(6), td:nth-child(6) { min-width: 200px;  max-width: 200px; text-align: center;}
table th:nth-child(7), td:nth-child(7) { min-width: 350px;  max-width: 350px; text-align: center;}
    </style>
</head>

<body>
    
<?php require 'nav.php'; ?>
<!-- action กับ method ห้ามเปลี่ยน-->
<form>
<center>
<div class="brand_logo_container">
         
      <img src="img/LOGOxx.png" class="brand_logo" alt="Logo"></center>
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

    <div >
    <table class="table table-striped table-dark" width="100%">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
	  <th scope="col">Start</th>
      <th scope="col">Profile</th>
      <th scope="col">Lastupdate</th>
	  <th scope="col">Edit</th> 
	  
    </tr>
  </thead>

  <tbody id = "result">
      
        
    </tbody>
</table>
</div>
<br><br>
</form>
<?php require 'footer.php'; ?>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="javascript/accmanage.js"></script>
