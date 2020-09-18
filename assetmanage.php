
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!DOCTYPE html><?php SESSION_START(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="stylesheet" href="CSS/fixedheader.css">
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <style>
       /* table th:nth-child(1), td:nth-child(1) { min-width: 50px;  max-width: 50px; text-align: center;}
table th:nth-child(2), td:nth-child(2) { min-width: 200px;  max-width: 200px; text-align: center;}
table th:nth-child(3), td:nth-child(3) { min-width: 200px;  max-width: 200px; text-align: center;}
table th:nth-child(4), td:nth-child(4) { min-width: 150px;  max-width: 150px; text-align: center;}
table th:nth-child(5), td:nth-child(5) { min-width: 150px;  max-width: 150px; text-align: center;}
table th:nth-child(6), td:nth-child(6) { min-width: 350px;  max-width: 350px; }*/
    </style>
    <title>CS_Asset</title>
</head>
<body background="img/BG.png">
    
<?php  require 'connect.php';
       $sqla = "SELECT * FROM userdata WHERE name = '".$_SESSION['Account']."'";
       $result = $conn->query($sqla);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           if($row['profile_ID']==2){ $_SESSION['editop'] = 2; }
           elseif($row['profile_ID']==1){ $_SESSION['editop'] = 1;}
            }
        }
        require 'nav.php';
?>
<?php
       // var_dump($_SESSION['Account']);
       require 'connect.php';
 $search_word ="ค้นหารายการจาก: ";
     $sortway = "";
     $s = $_POST['searchtxt'];
     $clause = " WHERE ";
     $_SESSION['sqlx'] = $sql="SELECT * FROM asset natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room NATURAL JOIN getmethod NATURAL JOIN asset_stat_overview NATURAL JOIN assetstat";//Query stub
     if($_POST['searchtxt'] != ''){
         $search_word .= " [รหัสหรือชื่อครุภัณฑ์: ".$_POST['searchtxt']."] ";
            $c = "asset_ID";
            $_SESSION['sqlx'] = $sql .= $clause."`".$c."` LIKE '%{$s}%' OR asset_name LIKE '%{$s}%'";
         $clause = " and ";//Change  to OR after 1st WHERE
         $sortway.= $c." = ".$s;
        }
        if($_POST['searchtxt'] == '')
        {
         $search_word .= " รายการทั้งหมด ";
        }
        
         if($_POST['rm'] !=  '')
         {
            $numItems = count($_POST['rm']);
            $i = 0;
            $search_word .= " [ห้องจัดเก็บครุภัณฑ์: ";
            foreach($_POST['rm'] as $w){
                 $sqlss = "SELECT * FROM room WHERE room_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['room']." ";
                    }
                    else{
                        $search_word .= $row['room'].",";
                    }
                 }
             }
             
             $r = $w;
             $c = "room_ID";
             $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .=" ] ";
            $clause = " and ";
            
         }
        if($_POST['tp'] != '')
         {
            $numItems = count($_POST['tp']);
            $i = 0;
            $search_word .= " [ประเภทครุภัณฑ์: ";
            foreach($_POST['tp'] as $w){
             $sqlss = "SELECT * FROM assettype WHERE asset_type_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                        $search_word .= $row['asset_type_name']." ";
                      }
                      else{
                          $search_word .= $row['asset_type_name'].",";
                      }
                     
                 }
             }
             $r = $w;
             $c = "asset_type_ID";
             $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
           
            }
            $search_word .= "] ";
            $clause = " and ";

         }
         if($_POST['stt'] != '')
         {
            $numItems = count($_POST['stt']);
            $i = 0;
            $search_word .= " [สถานะครุภัณฑ์: ";
            foreach($_POST['stt'] as $w){
             $sqlss = "SELECT * FROM assetstat WHERE asset_stat_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['asset_stat_name']." ";
                    }else{
                        $search_word .= $row['asset_stat_name'].",";
                    }
                 }
             }
             $r = $w;
             $c = "asset_stat_ID";
             $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .= " ] "; 
            $clause = " and ";
         }
         if($_POST['dstt'] != '')
         {
            $numItems = count($_POST['dstt']);
            $i = 0;
            $search_word .= " [ลักษณะการติดตั้ง: ";
            foreach($_POST['dstt'] as $w){
             $sqlss = "SELECT * FROM deploy_stat WHERE dstat_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['dstat']." ";
                    }else{
                        $search_word .= $row['dstat'].",";
                    }
                 }
             }
             $r = $w;
             $c = "dstat_ID";
             $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .= " ] ";
            $clause = " and ";
         }
         if($_POST['rp'] != '')
         {
            $numItems = count($_POST['rp']);
            $i = 0;
            $search_word .= " [ผู้รับผิดชอบ: ";
            foreach($_POST['rp'] as $w){
             $sqlss = "SELECT * FROM respon_per WHERE resper_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['resper_firstname']." ".$row['resper_lastname']." ";
                    }else{
                        $search_word .= $row['resper_firstname']." ".$row['resper_lastname'].",";
                    }
                 }
             }
             $r = $w;
             $c = "resper_ID";
             $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .= " ] ";
            $clause = " and ";
         }
         if($_POST['gm'] != '')
         {
            $numItems = count($_POST['gm']);
            $i = 0;
            $search_word .= " [วิธีได้รับ: ";
            foreach($_POST['gm'] as $w){
             $sqlss = "SELECT * FROM getmethod WHERE getMethod_ID = '".$w."'";
             $result = $conn->query($sqlss);
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    if(++$i === $numItems) {
                     $search_word .= $row['method']." ";
                    }else{
                        $search_word .= $row['method'].",";
                    }
                 }
             }
             $r = $w;
             $c = "getMethod_ID";
             $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
             $clause = " or ";
             $sortway.= $c." = ".$r;
            }
            $search_word .= " ] ";
            $clause = " and ";
         }
                $_SESSION['searchword'] = $search_word;
                $search_word = $_SESSION['searchword'];
                if(isset($_SESSION['sql_detail']) || $_SESSION['sql_detail'] != ""){
                    $_SESSION['sqlx'] = $sql = $_SESSION['sql_detail'];
                    $_SESSION['searchword'] = $search_word = $_SESSION['word_detail'];
                    unset($_SESSION['sql_detail']);
                    unset($_SESSION['word_detail']);
                    
                }
                if(isset($_SESSION['sql_edi']) || $_SESSION['sql_edi'] != ""){
                    $_SESSION['sqlx'] = $sql = $_SESSION['sql_edi'];
                    $_SESSION['searchword'] = $search_word = $_SESSION['word_edi'];
                    unset($_SESSION['sql_edi']);
                    unset($_SESSION['word_edi']);
                }
                if(isset($_SESSION['sql_text']) || $_SESSION['sql_text'] != ""){
                    $_SESSION['sqlx'] = $sql = $_SESSION['sql_text'];
                    $_SESSION['searchword'] = $search_word = $_SESSION['word_text'];
                    unset($_SESSION['sql_text']);
                    unset($_SESSION['word_text']);
                }
               
              
?>
<center>
<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/LOGOxx.png" class="brand_logo" alt="Logo">
					</div>
				</div>
                <br>
                <br>
<div class="containter" style="width:90%;" align = "center">
 <div class = "whitebox" style = "width:90%" align = "center">
  <form action="search.php"  method="post" style ="text-align:center;"><div style ="float:left"><?php echo $search_word; ?></div><button style ="float:right"type= "submit" >ค้นหาใหม่</button></form>
  <br>
  <form  align = "center" action="asset_update.php" method="post">
    <div  align = "center" style="height:400px;overflow-y:auto" >
    <table style ="width:100%height:100%;overflow:auto"align = "center" class="c table bg-light text-dark table-bordered table-striped ">
  <thead>
  <tr>
        <th scope="col"><input type='checkbox' class='checkall' onClick='toggle(this)' /></th>
        <th scope="col">รหัสครุภัณฑ์</th>
        <th scope="col">ชื่อครุภัณฑ์</th>
        <th scope="col">ชื่อเรียก</th>
        <th scope="col">ประเภทครุภัณฑ์</th>
        <th scope="col">edit</th>
  </tr>
  </thead>
  <tbody>
       <?php
       

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $an = $row['asset_number'];
                echo
                    "<tr>
                        <td><input type='checkbox' name='id[]' id= 'cbx' onClick='checkboxes()' value = '".$row['id']."'></td>
                        <td align='left'>".$row['asset_ID']."</td>
                        <td align='left'>".$row['asset_name']."</td>
                        <td align='left'>".$row['asset_nickname']."</td>
                        <td align='left'>".$row['asset_type_name']."</td>
                        <td><a href='assetdetail.php?asset_number=".$row['id']."&function=3'><button type='button' class='btn btn-outline-danger' border-color:White; color:white'>รายละเอียด</button></a> ";
                        echo "<a target='_blank' href='test.php?asset_number=".$an."'><button type='button' class='btn btn-outline-info' border-color:White; color:white'>พิมพ์ทะเบียนคุมทรัพย์สิน</button></a> "; 
                        if($_SESSION['editop'] == 1){
                        echo "<a href='text_report.php?asset_number=".$an."'><button type='button'  class='btn btn-outline-success' border-color:White; color:white'>แก้ไขทะเบียนคุมทรัพย์สิน</button></a> ";
                        echo "<a href='edit.php?asset_number=".$an."&function=4'><button type='button' class='btn btn-outline-warning' border-color:White; color:white'>แก้ไข</button></a> "; }
                         //<input type = 'button' onClick= 'deletethis(".$row['asset_number'].")' name = 'Del' value = 'Delete' >    
                
                echo "</td></tr>";
        
               

            }
        }
       
        ?>
    </tbody>
    </table>
</div>
<br>
<div><?php  //echo $sql; ?></div>
<?php if($_SESSION['editop'] == 2){ }
else if($_SESSION['editop'] == 1){ ?>
<p id = "q"style="color: red;font-size: 24px">โปรดเลือกรายการครุภัณฑ์ที่ต้องการแก้ไข</p>
<div style = "text-align: center">
<input style= "text-align: center" class='btn btn-outline-success' type="submit" id = 'x' name="stat_update" value="แก้ไขสถานะของครุภัณฑ์ที่เลือก">
<input style= "text-align: center"  class='btn btn-outline-success' type="submit" id = 'y' name="room_update" value="แก้ไขห้องที่จัดเก็บของครุภัณฑ์ที่เลือก">
</div>
<?php } ?>

</form>

</div>
</center>
<?php require 'footer.php'; ?>
</body>
</html>

<script type="text/javascript"> 

window.onload = function(){
    document.getElementById('x').disabled = true;
    document.getElementById('y').disabled = true;
    checkboxes();
}
function checkboxes()
      {
          
       var inputElems = document.getElementsByTagName("input"),
        count = 0;

        for (var i=0; i<inputElems.length; i++) {       
           if (inputElems[i].type == "checkbox" && inputElems[i].checked == true){
                count++;
                
           }

        }
        if(count > 0){
                  
                document.getElementById('x').disabled = false;
                document.getElementById('y').disabled = false;
                document.getElementById('q').style.display = 'none';
                }
                else if(count <= 0){
                    document.getElementById('x').disabled = true;
                    document.getElementById('y').disabled = true;
                    document.getElementById('q').style.display = 'block';
                }
       
     }
     function toggle(oInput) {
    var aInputs = document.getElementsByTagName('input');
    for (var i=0;i<aInputs.length;i++) {
        if (aInputs[i] != oInput) {
            aInputs[i].checked = oInput.checked;
        }
    }
    checkboxes();
}
</script>