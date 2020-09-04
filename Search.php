<!DOCTYPE html>
<?php include('search_backend.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/BG.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <form class="searchbox" id="sbox" action ="assetmanage.php" method= "post">
    <div class="form__group">
    <input type="text" class="form__input" name ="searchtxt"id="searchtxt" placeholder="รหัสครุภัณฑ์/ชื่อครุภัณฑ์" />
    <label style="text-align:center" for="name" class="form__label">รหัสครุภัณฑ์/ชื่อครุภัณฑ์</label>
    </div>
    <br>
    <center>
    <table  class="select_layout">
    <tr>
        <td class="tdsp">
            <div class="select">
                <select name="gm" id = "gm">
                <option placeholder="" value="">วิธีที่ได้รับมา</option>
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
            <div class="select">
                <select name="rm" id = "rm">
                <option placeholder="" value="">ห้องที่จัดเก็บครุภัณฑ์</option>
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
            <div class="select">
                <select name="tp" id ="tp">
                <option placeholder="" value="">ประเภทของครุภัณฑ์</option>
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
            <div class="select">
                <select name="stt" id ="stt">
                <option placeholder="" value="">สถานะการใช้งาน</option>
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
            <div class="select">
                <select name="dstt" id = "dstt">
                <option placeholder="" value="">ลักษณะการติดตั้ง</option>
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
            <div class="select">
                <select name="rp" id ="rp">
                <option placeholder="" value="">ผู้รับผิดชอบ</option>
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
            <th><button type="submit" class="btns first" id = "search_button">ค้นหา</button></th>
        </tr>
    </table>
    </center>
    </form>
    
    </div>
   
    
    
    </center>
 
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript/search.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>