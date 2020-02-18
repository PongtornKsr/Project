<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .center {
  position: fixed;
  top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
}
    </style>
</head>
<?php
      require 'connect.php';

 ?>
<body background="img/BG.png">

    <?php require 'nav.php'; ?>
    <br>
    <br>
    <center>
    <div class="center">
    <form action="assetmanage.php" method="post"><input type="search" name="search" id="">
    <input type="submit" name = "submit" value="ค้นหา">
    <br>
    <input type="checkbox" value = 'asset_ID' name="soption[]" id="">รหัสครุภัณฑ์ หรือ ชื่อครุภัณฑ์
    <input type="checkbox" value = 'asset_location_ID' name="soption[]" id="">สถานที่ตั้ง<select name="loc" id="">
    <option value="">---สถานที่ตั้ง---</option>
    <?php $sql = "SELECT * FROM asset_location ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_location_ID']." >".$row['asset_location']."</option>";
                    }     } ?>
    </select>
    <input type="checkbox" value = 'room_ID' name="soption[]" id="">ห้องที่จัดเก็บ <select name="rm" id="">
    <option value="" >---ห้องที่จัดเก็บ---</option>
    <?php $sql = "SELECT * FROM room ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['room_ID']." >".$row['room']."</option>";
                    }     } ?>
    </select><br>
    <input type="checkbox" value = 'asset_type_ID' name="soption[]" id="">ประเภทครุภัณฑ์ <select name="atype" id=""><option value="">---ประเภทครุภัณฑ์---</option>
    <?php $sql = "SELECT * FROM assettype ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_type_ID'].">".$row['asset_type_name']."</option>";
                    }     } ?>

    </select>
    <input type="checkbox" value = 'asset_stat_ID' name="soption[]" id="">สถานะการใช้งาน <select name="utype" id=""><option value="">---สถานะการใช้งาน---</option>
    <?php $sql = "SELECT * FROM assetstat ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_stat_ID'].">".$row['asset_stat_name']."</option>";
                    }     } ?>
    
    </select>
    <input type="checkbox" value = 'dstat_ID' name="soption[]" id="">ลักษณะการติดตั้ง <select name="dtype" id=""><option value="">---ลักษณะการติดตั้ง---</option>
    <?php 
        $sql = "SELECT * FROM deploy_stat ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "<option value=".$row['dstat_ID'].">".$row['dstat']."</option>";
        }     }
    ?>
    </select><br>
    <input type="checkbox" value = 'resper_ID' name="soption[]" id="">ผู้รับผิดชอบ<select name="resper_ID" id=""><option value="">---ผู้รับผิดชอบ---</option>
    <?php 
        $sql = "SELECT * FROM respon_per ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "<option value=".$row['resper_ID'].">".$row['resper_firstname']." ".$row['resper_lastname']."</option>";
        }     }
    ?>
    <input type="checkbox" value = 'get_method' name="soption[]" id="">วิธีที่ได้รับ <select name="method" id=""><option value="">---วิธีที่ได้รับ---</option>
    <?php 
        $sql = "SELECT * FROM getmethod ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "<option value=".$row['method'].">".$row['method']."</option>";
        }     }
    ?>
    </select>                    
    </form>
    </div>
    </center>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>