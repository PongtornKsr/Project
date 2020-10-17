<!DOCTYPE html><?php SESSION_START(); 
$_SESSION['sql_st'] = $_SESSION['sqlx'];
$_SESSION['word_st'] = $_SESSION['searchword'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/fonts/thsarabunnew.css" />
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="shortcut icon" href="img/computer.png">
    
    <title>CS_Assert</title>
</head>

<body class = "thsarabunnew">
    <?php require 'nav.php'; ?>
    <?php if(isset($_POST['stat_update'])){ 
        require 'connect.php';
        $_SESSION['id'] = $_POST['id'];
        ?>
        <div class = "box">
        <a href="assetmanage.php" style ="float:left" ><button class = "btn btn-danger">ย้อนกลับ</button></a>
    <form id = "myform"action="rm_update_back.php" method="post">
    <div class="head">แก้ไขสถานะครุภัณฑ์</div>
    <br>
    <br><br>
        <div class="thsarabunnew" style="font-size:24px">จำนวนครุภัณฑ์ที่เลือกคือ <?php echo count($_POST['id']); ?> รายการ</div>
        <div class="thsarabunnew"style="font-size:24px">เปลี่ยนสถานะเป็น <?php  
        echo "<select id = 'selectst' onchange='checkselecttion()' class = 'form-control'name = 'stid'>
        <option value='0'>---สถานะครุภัณฑ์---</option>";
            $sql = "SELECT * FROM assetstat ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<option value=".$row['asset_stat_ID'].">".$row['asset_stat_name']."</option>";
            }     }
       echo  "</select>";
        ?></div>
     <br><br><br>
     <input id= "a"type="button" name = "StatUpdate" class="btn btn-success" value="แก้ไขสถานะครุภัณฑ์">
     
    <!-- <p id="hint1" style="color: red;font-size: 24px">กรุณาเลือกสถานะใหม่ของครุภัณฑ์ที่ต้องการเปลี่ยน</p> -->
    </form></div>
    <?php } ?>





    <?php if(isset($_POST['room_update'])){ 
        require 'connect.php';
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['sql_rm'] = $_SESSION['sqlx'];
        $_SESSION['word_rm'] = $_SESSION['searchword'];

        ?>
    <div class="box">
    <a href="assetmanage.php" style ="float:left"><button class = "btn btn-danger">ย้อนกลับ</button></a>
    <form  id ="myform"action="rm_update_back.php" method="post">
    <div class="head">แก้ไขที่จัดเก็บครุภัณฑ์</div>
    <br><br><br>
        <div class="thsarabunnew" style="font-size:24px">จำนวนครุภัณฑ์ที่เลือกคือ <?php echo count($_POST['id']); ?> รายการ</div>
        <div class="thsarabunnew"style="font-size:24px">เปลี่ยนสถานที่จัดเก็บใหม่เป็น 
        <?php  
        echo "<select id = 'selectrm' onchange='checkselecttion()' class = 'form-control' name = 'rmid'>
        <option value='0'>---ห้องที่จัดเก็บ---</option>";
            $sql = "SELECT * FROM room ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<option value=".$row['room_ID'].">".$row['room']."</option>";
            }     }
       echo  "</select>";
        ?></div>
        
     <!-- <input type="button" value="Cancel" onclick="window.location.href = '<?php //echo $_SERVER['HTTP_REFERER'] ?>';"> -->
     <br><br><br>
     <input id= "a"type="button" name = "RoomUpdate" class="btn btn-success" value="แก้ไขห้องที่จัดเก็บ">
     <!-- <p id="hint1" style="color: red;font-size: 24px">กรุณาเลือกห้องที่ต้องการเปลี่ยนเพื่อจัดเก็บครุภัณฑ์</p> -->
    </form></div>
    <?php } ?>
    <?php require 'footer.php'; ?>
</body>
</html>
<script type="text/javascript"> 




</script>
<script>
$(document).ready(function(){
    var ru = $('#a').attr('name');
        if(ru == "RoomUpdate"){
            checkselect($('#selectrm').val());
        }
        else if(ru == "StatUpdate"){
            checkselect($('#selectst').val());
        }
    function checkselect(x) {
       
        if(x == 0){
            $('#a').prop('disabled', true);
        }else{
            $('#a').prop('disabled', false);
        }
    }
    $('select').on('change',function(){
        var s = $(this).val();
        checkselect(s);
    })
    $('#a').click(function(){
        var ru = $('#a').attr('name');
        if(ru == "RoomUpdate"){
            var rmid = $('#selectrm option:selected').val();
            $.ajax({
        url: "rm_update_back.php",
        method: "POST",
        data: { 'RoomUpdate' : ru,
        'rmid' : rmid },
        success:function(){
            Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'ดำเนินการสำเร็จ',
          showConfirmButton: false,
          timer: 1500
        });
        
        setTimeout(function() {
          window.location.href="assetmanage.php";
        }, 2000);
        }
    })
}else if(ru == "StatUpdate"){
    var stid = $('#selectst option:selected').val();
    $.ajax({
        url: "rm_update_back.php",
        method: "POST",
        data: { 'StatUpdate' : ru ,
        'stid' : stid },
        success:function(){
            Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'ดำเนินการสำเร็จ',
          showConfirmButton: false,
          timer: 1500
        });
      
        setTimeout(function() {
          window.location.href="assetmanage.php";
        }, 2000);
        }
    })

    }
        
    })
        
    })
    

</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>