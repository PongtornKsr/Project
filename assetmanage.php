<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html><?php SESSION_START(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/management.css"> 
    <link rel="stylesheet" href="CSS/fixedthead.css">
    <link rel="stylesheet" href="CSS/submitstyle.css">
    <link rel="stylesheet" href="Css/BG.css">
    <title>Document</title>
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
            $_SESSION['sqlx'] = $sql="SELECT * FROM asset natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room ";//Query stub
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
                    $sqlss = "SELECT * FROM room WHERE room_ID = '".$_POST['rm']."'";
                    $result = $conn->query($sqlss);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $search_word .= " [ห้องจัดเก็บครุภัณฑ์: ".$row['room']."] ";
                        }
                    }
                    
                    $r = $_POST['rm'];
                    $c = "room_ID";
                    $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                    $sortway.= $c." = ".$r;
                }
               if($_POST['tp'] != '')
                {
                    $sqlss = "SELECT * FROM assettype WHERE asset_type_ID = '".$_POST['tp']."'";
                    $result = $conn->query($sqlss);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $search_word .= " [ประเภทครุภัณฑ์: ".$row['asset_type_name']."] ";
                        }
                    }
                    $r = $_POST['tp'];
                    $c = "asset_type_ID";
                    $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                    $sortway.= $c." = ".$r;
                }
                if($_POST['stt'] != '')
                {
                    $sqlss = "SELECT * FROM assetstat WHERE asset_stat_ID = '".$_POST['stt']."'";
                    $result = $conn->query($sqlss);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $search_word .= " [สถานะครุภัณฑ์: ".$row['asset_stat_name']."] ";
                        }
                    }
                    $r = $_POST['stt'];
                    $c = "asset_stat_ID";
                    $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                    $sortway.= $c." = ".$r;
                }
                if($_POST['dstt'] != '')
                {
                    $sqlss = "SELECT * FROM deploy_stat WHERE dstat_ID = '".$_POST['dstt']."'";
                    $result = $conn->query($sqlss);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $search_word .= " [ลักษณะการติดตั้ง: ".$row['dstat']."] ";
                        }
                    }
                    $r = $_POST['dstt'];
                    $c = "dstat_ID";
                    $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                    $sortway.= $c." = ".$r;
                }
                if($_POST['rp'] != '')
                {
                    $sqlss = "SELECT * FROM respon_per WHERE resper_ID = '".$_POST['rp']."'";
                    $result = $conn->query($sqlss);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $search_word .= " [ผู้รับผิดชอบ: ".$row['resper_firstname']." ".$row['resper_lastname']."] ";
                        }
                    }
                    $r = $_POST['rp'];
                    $c = "resper_ID";
                    $_SESSION['sqlx'] = $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                    $sortway.= $c." = ".$r;
                }
                if($_POST['gm'] != '')
                {
                    $sqlss = "SELECT * FROM getmethod WHERE getMethod_ID = '".$_POST['gm']."'";
                    $result = $conn->query($sqlss);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $search_word .= " [วิธีได้รับ: ".$row['method']."] ";
                        }
                    }
                    $r = $_POST['method'];
                    $c = "get_method";
                    $_SESSION['sqlx'] = $sql .= $clause."`".$c."` LIKE '%{$r}%' ";
                    $clause = " and ";
                    $sortway.= $c." = ".$r;
                }
               
               
              
?>
<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/LOGOxx.png" class="brand_logo" alt="Logo">
					</div>
				</div>
  <form action="search.php" method="post" style ="text-align:center"><div><?php echo $search_word; ?></div><button type= "submit" >ค้นหาใหม่</button></form>
  <form action="asset_update.php" method="post">
    <div style="text-align:center">
    <table class="table table-striped table-dark">
  <thead>
    <tr>
        <th><input type='checkbox' class='checkall' onClick='toggle(this)' /></th>
        <th>รหัสครุภัณฑ์</th>
        <th>ชื่อครุภัณฑ์</th>
        <th>ชื่อเรียก</th>
        <th>ประเภทครุภัณฑ์</th>
	    <th>edit</th>
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
                        <td>".$row['asset_ID']."</td>
                        <td>".$row['asset_name']."</td>
                        <td>".$row['asset_nickname']."</td>
                        <td>".$row['asset_type_name']."</td>
                        <td><a href='assetdetail.php?asset_number=".$row['id']."&function=3'><button type='button' style='background-color:red; border-color:White; color:white'>Detail</button></a><br>";
                        echo "<a href='text_report.php?asset_number=".$an."'><button type='button' style='background-color:blue; border-color:White; color:white'>พิมพ์ทะเบียนคุมทรัพย์สิน</button></a><br>"; 
                        if($_SESSION['editop'] == 1){
                        echo "<a href='text_report.php?asset_number=".$an."'><button type='button' style='background-color:green; border-color:White; color:white'>แก้ไขทะเบียนคุมทรัพย์สิน</button></a><br>";
                        echo "<a href='edit.php?asset_number=".$an."&function=4'><button type='button' style='background-color:black; border-color:White; color:white'>EDIT</button></a><br>"; }
                         //<input type = 'button' onClick= 'deletethis(".$row['asset_number'].")' name = 'Del' value = 'Delete' >    
                
                echo "</td></tr>";
        
                echo "<script language ='javascript'> 
                    function deletethis(did){
                        if(confirm('Do you Want to delete?')){
                            window.location.href='assetdelete.php?del_id='+did+''
                            return true;
                        }

                    }
                </script>";

            }
        }
       
        ?>
    </tbody>
</table>
<div><?php echo $sortway; ?></div>
<?php if($_SESSION['editop'] == 2){ }
else if($_SESSION['editop'] == 1){ ?>
<p id = "q"style="color: red;font-size: 24px">โปรดเลือกรายการครุภัณฑ์ที่ต้องการแก้ไข</p>
<div style = "text-align: center">
<input style= "text-align: center" type="submit" id = 'x' name="stat_update" value="แก้ไขสถานะของครุภัณฑ์ที่เลือก">
<input style= "text-align: center" type="submit" id = 'y' name="room_update" value="แก้ไขห้องที่จัดเก็บของครุภัณฑ์ที่เลือก">
</div>
<?php } ?>
</div>
</form>
<?php require 'footer.php'; ?>
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