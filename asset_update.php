<!DOCTYPE html><?php SESSION_START(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="stylesheet" href="CSS/fonts/thsarabunnew.css" />
    <link rel="stylesheet" href="CSS/submitstyle.css">
    <title>Document</title>
</head>

<body>
    <?php require 'nav.php'; ?>
    <?php if(isset($_POST['stat_update'])){ ?>
        
    <form class="box" action="" method="post">
    <div class="head">แก้ไขสถานะครุภัณฑ์</div>
    </form>
    <?php } ?>





    <?php if(isset($_POST['room_update'])){ 
        require 'connect.php';
        $_SESSION['rm'] = $_POST['id'];
       

        ?>
    <form class="box" action="rm_update_back.php" method="post">
    <div class="head">แก้ไขที่จัดเก็บครุภัณฑ์</div>
    <br><br><br>
        <div class="thsarabunnew" style="font-size:24px">จำนวนครุภัณฑ์ที่เลือกคือ <?php echo count($_POST['id']); ?> รายการ</div>
        <div class="thsarabunnew"style="font-size:24px">เปลี่ยนสถานที่จัดเก็บใหม่เป็น 
        <?php  
        echo "<select id = 'select' onchange='checkselecttion()' name = 'rmid'>
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
     <input id= "a"style = "width:100px;height: 50px;"type="submit" onclick="chackselecttion()"value="update">
     <p id="hint1" style="font-color: red;">กรุณาเลือกห้องที่ต้องการเปลี่ยนเพื่อจัดเก็บครุภัณฑ์</p>
    </form>
    <?php } ?>
    <?php require 'footer.php'; ?>
</body>
</html>
<script type="text/javascript"> 

window.onload = function(){
    document.getElementById('hint1').style.display='none';
    var x = document.getElementById('select').value;
    if (x == 0){
        document.getElementById('a').disabled = true;
        document.getElementById('hint1').style.display='none';
    }
}
function checkselecttion(){ 
    var x = document.getElementById('select').value;
    if (x == 0){
        document.getElementById('a').disabled = true;
        document.getElementById('hint1').style.display='block';
    }
    else if(x>0){
        document.getElementById('a').disabled = false;
        document.getElementById('hint1').style.display='none';
    }
}

</script>