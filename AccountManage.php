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
    <title>Document</title>
   
</head>

<body>
    
<?php require 'nav.php'; ?>
<!-- action กับ method ห้ามเปลี่ยน-->
<form action="AccountManage.php?sch=search" method="GET">
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
                                      <input type="text" class="form-control" placeholder="search" name = "search">
                                      <div class="input-group-btn">
                                          <div class="btn-group" role="group">
                                              
                                              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                    
                    <br><br>
</form>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
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

  <tbody>
        <?php
        // ดึงค่าจากดาต้าเบส มาวนลูปแสดงใน table ไปทีละ row
        if(isset($_GET['search']) || !empty($_GET['search']) ){
            require 'connect.php';
            $sch = $_GET['search'];
        $fname = $_SESSION['userData']['givenName'];
        $sql = "SELECT * FROM userdata natural join userstat natural join userprofile WHERE (givenName NOT IN ('$fname')) AND  (givenName LIKE '%$sch%' or familyName  LIKE '%$sch%' or email  LIKE '%$sch%')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                echo
                    "<tr>
                        <td>".$row['givenName']."</td>
                        <td>".$row['familyName']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['stat']."</td>
                        <td>".$row['profile_name']."</td>
                        <td>".$row['last_update']."</td>
                        <td><a href='usermanage.php?ID=".$row['ID']."&function=3'><button type='button' style='background-color:red; border-color:White; color:white'>Delete</button></a>";
                        if($row['ID_stat']==1){ echo "<a href='usermanage.php?ID=".$row['ID']."&function=4'><button type='button' style='background-color:black; border-color:White; color:white'>Block</button></a>";}                       
                        else {echo "<a href='usermanage.php?ID=".$row['ID']."&function=1'><button type='button' style='background-color:black; border-color:White; color:white'>Active</button></a>";}
                        
                        if($row['profile_ID']==2){ echo "<a href='usermanage.php?ID=".$row['ID']."&function=5'><button type='button' style='background-color:blue; border-color:White; color:white'>Roleup</button></a>";}                       
                        else {echo "<a href='usermanage.php?ID=".$row['ID']."&function=6'><button type='button' style='background-color:blue; border-color:White; color:white'>Roledown</button></a>";}
                
                echo "</td></tr>";
        


            }
        }
        else { echo "<tr><td colspan='7' align ='center'>ไม่พบผลลัพท์การค้นหา</td></tr>"; }
       
        
         }
        else if(!isset($_GET['search']) || empty($_GET['search']) ){ 
            require 'connect.php';
        $fname = $_SESSION['userData']['givenName'];
        $ffname = $_SESSION['Uname'];
        $sql = "SELECT * FROM userdata natural join userstat natural join userprofile  WHERE givenName NOT IN ('$fname') and givenName NOT IN ('$ffname') ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                echo
                    "<tr>
                        <td>".$row['givenName']."</td>
                        <td>".$row['familyName']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['stat_name']."</td>
                        <td>".$row['profile_name']."</td>
                        <td>".$row['last_update']."</td>
                        <td>";
                        if($row['ID_stat']==1){ echo "<a href='usermanage.php?ID=".$row['ID']."&function=4'><button type='button' style='background-color:red; border-color:White; color:white'>DELETE</button></a>";}                       
                        else {echo "<a href='usermanage.php?ID=".$row['ID']."&function=1'><button type='button' style='background-color:green; border-color:White; color:white'>Active</button></a>";}
                        
                        if($row['profile_ID']==2){ echo "<a href='usermanage.php?ID=".$row['ID']."&function=5'><button type='button' style='background-color:blue; border-color:White; color:white'>SET TO ADMIN</button></a>";}                       
                        else {echo "<a href='usermanage.php?ID=".$row['ID']."&function=6'><button type='button' style='background-color:black; border-color:White; color:white'>SET TO GUEST</button></a>";}
                
                echo "</td></tr>";
        


            }
        }
        else { echo "<tr><td colspan='7' align ='center'>ไม่พบผลลัพท์การค้นหา</td></tr>"; }
       
        }

        
        ?>
        
    </tbody>
</table>
</div>
<br><br>

<?php require 'footer.php'; ?>
</html>
