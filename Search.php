<!DOCTYPE html>
<?php //include('search_backend.php'); 

SESSION_START();

require 'connect.php';
require 'connect_b.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="stylesheet" href="CSS/search.css">
   <link rel="stylesheet" href="CSS/navbar.css">
   <link rel="shortcut icon" href="img/computer.png">
   <link rel="stylesheet" href="CSS/fonts/thsarabunnew.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
   
   
    <title>CS_Asset</title>

    <style>
       
    </style>
</head>
<?php
      require 'connect.php';

 ?>
<body background="img/BG.png">

    <?php require 'nav.php'; ?>
   
    <center>
    <div id= "bodytext">
    <form class="searchbox" id="sbox" action ="assetmanage.php" method= "POST">
    <br>
    <div><h1><?php if($_SESSION['OPs'] == 1){ echo "ค้นหาและแก้ไขข้อมูลครุภัณฑ์"; }else if($_SESSION['OPs'] == 2){ echo "ค้นหาและตรวจสอบข้อมูลครุภัณฑ์"; } ?></h1></div>
    <br>
    <div class="form__group">
    <input type="text" class="form__input" name ="searchtxt"id="searchtxt" placeholder="รหัสครุภัณฑ์/ชื่อครุภัณฑ์" />
    <label style="text-align:center" for="name" class="form__label">รหัสครุภัณฑ์/ชื่อครุภัณฑ์</label>
    </div>
    <br>
    <center>
    <table  class="select_layout">
    <tr>
        <td class="tdsp">
            <div >
            
                <select name="gm[]" id = "gm" multiple="true">
                <option placeholder="" value="0">วิธีที่ได้รับมา</option>
                    <?php 
                        $sql = "SELECT * FROM getmethod ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo "<option value=".$row['getMethod_ID'].">".$row['method']."</option>";
                        }     }
                    ?>
                </select>
            </div>
        </td>
        <td class="tdsp">
            <div >
                <select name="rm[]" id = "rm" multiple="true">
                <option placeholder="" value="0">ห้องที่จัดเก็บครุภัณฑ์</option>
                    <?php $sql = "SELECT * FROM room ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['room_ID']." >".$row['room']."</option>";
                    }     } ?>

                </select>
            </div>
        </td>
        <td class="tdsp">
            <div >
                <select name="tp[]" id ="tp" multiple="true">
                <option placeholder="" value="0" >ประเภทของครุภัณฑ์</option>
                    <?php $sql = "SELECT * FROM assettype ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_type_ID'].">".$row['asset_type_name']."</option>";
                    }     } ?>
                </select>
            </div>
        </td>
    </tr>
    <tr>
        <td class="tdsp">
            <div >
                <select name="stt[]" id ="stt" multiple="true">
                <option placeholder="" value="0">สถานะการใช้งาน</option>
                    <?php $sql = "SELECT * FROM assetstat ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_stat_ID'].">".$row['asset_stat_name']."</option>";
                    }     } ?>           
                </select>
            </div>
        </td>
        <td class="tdsp">
            <div >
                <select name="dstt[]" id = "dstt" multiple="true">
                <option placeholder="" value="0">ลักษณะการติดตั้ง</option>
                        <?php 
                            $sql = "SELECT * FROM deploy_stat ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row['dstat_ID'].">".$row['dstat']."</option>";
                            }     }
                        ?>
                </select>
            </div>
        </td>
        <td class="tdsp">
            <div >
                <select name="rp[]" id ="rp"multiple="true">
                <option placeholder="" value="0">ผู้รับผิดชอบ</option>
                    <?php 
                        $sql = "SELECT * FROM respon_per ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        echo "<option value=".$row['resper_ID'].">".$row['resper_firstname']." ".$row['resper_lastname']."</option>";
                        }     }
                    ?>
                </select>
            </div>
        </td>
    </tr>
    </table>
    <table style="text-align:center">
        <tr>
            <th><button type="submit" class="btns first"  style = "font-size:12px" id = "search_button">ค้นหา</button></th>
        </tr>
    </table>
    </center>
    </form>
    
    </div>
   
    
    
    </center>
 
</body>
</html>

    <script src="javascript/search.js"></script>
    