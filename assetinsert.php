<!DOCTYPE html><? SESSION_START(); ?>
<html lang="en">

<head>
<title>CS_Asset</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/BG.css"> 
    <link rel="stylesheet" href="CSS/navbar.css">
  <script>
    $(document).ready(function(){
        $("input[type='radio']").change(function(){
        if($(this).val()=="other")
        {
        $("#otherAnswer").show();
        }
        else
        {
        $("#otherAnswer").hide(); 
        }
        });
        });       
        </script>

  </head>
  
<?php
        require 'connect.php';
?>
<body>
<?php require 'nav.php'; ?>
             
                <div class="brand_logo_container">
                       <center>
                  <img src="img/LOGOxx.png" class="brand_logo" alt="Logo">
              </div>
        <div class="alert alert-info" role="alert">
      
            <div>
    <form action="assetinsert2.php" method = "POST" Align = "center">
    
        <table Align = "center">
            <tr>
                <td>
                    รายการที่ :
                </td>
                <td>
                    <input type="text" name = "order_number" width="50">
                </td>
            </tr>
            <tr>
                <td>
                    ประเภทของครุภัณ์: 
                </td>
                <td>    
                <?php 
                echo "<input type='radio' name='atype' value='1'><select name = 'assettype'>
                <option value='0'>---ประเภทของครุภัณฑ์---</option>";
                    $sql = "SELECT * FROM assettype ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_type_ID'].">".$row['asset_type_name']."</option>";
                    }     }
               echo  "</select>";
                ?>
                </td>
            </tr>
            <tr> 
            <td></td>
                <td><input type="radio" name="atype" value="2">
                 
                    <input type="text" name = "type" width="50">
                </td>
                </tr>
                <tr>
                <td>
                    ลักษณะการติดตั้ง: 
                </td>
                <td>    
                <?php 
                echo "<input type='radio' name='dtype' value='1'><select name = 'dstat_ID'>
                <option value='0'>---ลักษณะการติดตั้ง---</option>";
                    $sql = "SELECT * FROM deploy_stat ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['dstat_ID'].">".$row['dstat']."</option>";
                    }     }
               echo  "</select>";
                ?>
                </td>
            </tr>
            <tr> 
            <td></td>
                <td><input type="radio" name="dtype" value="2">
                 
                    <input type="text" name = "detype" width="50">
                </td>
                </tr>
            <tr>
                <td>
                    รหัสครุภัณฑ์: 
                </td>
                <td>    
                    <input type="text" name="asset_ID">/<input type="text" name="asset_Set"><input type="text" name="assetid">
                </td>
            </tr>
            <tr>
                <td>
                    ชื่อครุภัณฑ์:
                </td>
                <td>
                    <input type="text" name = "asset_name" width="50">
                </td>
            </tr>
            <tr>
                <td>
                   ลักษณะ/คุณลักษณะ:
                </td>
                <td>
                    <input type="text" name = "property" width="50">
                </td>
            </tr>
            <tr>
                <td>
                   รุ่น/แบบ:
                </td>
                <td>
                    <input type="text" name = "model" width="50">
                </td>
            </tr>
            <tr>
                <td>
                   หมายเลขทะเบียน :
                </td>
                <td>
                    <input type="text" name = "asset_order" width="50">
                </td>
            </tr>
            <tr>
                <td>
                   สถานที่ตั้ง / หน่วยงานที่รับผิดชอบ:
                </td>
                <td>
                <?php 
                echo "<input type='radio' name='aslo' value='1'><select name = 'assetloca'>
                <option value='0'>---หน่วยงาน/สถานที่ตั้ง---</option>";
                    $sql = "SELECT * FROM asset_location ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_location_ID'].">".$row['asset_location']."</option>";
                    }     }
               echo  "</select>";
                ?>
                </td>
                </tr>
                <tr> 
            <td></td>
                <td><input type="radio" name="aslo" value="2">
                    <input type="text" name = "asloc" width="50">
                </td>
                </tr>
                <tr>
                <td>
                   ผู้รับผิดชอบ :
                </td>
                <td>
                <?php 
                echo "<input type='radio' name='res' value='1'><select name = 'resid'>
                <option value='0'>---ผู้รับผิดชอบ---</option>";
                    $sql = "SELECT * FROM respon_per ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['resper_ID'].">".$row['resper_firstname'].$row['resper_lastname']."</option>";
                    }     }
               echo  "</select>";
                ?>
                </td>
                </tr>
                <tr> 
            <td></td>
                <td><input type="radio" name="res" value="2">
                    ชื่อ: <input type="text" name = "resfname" width="50">
                    นามสกุล: <input type="text" name = "reslname" width="50">
                </td>
                </tr>
                <tr>
                <td>
                   ห้องที่จัดเก็บ :
                </td>
                <td>
                <?php 
                echo "<input type='radio' name='rm' value='1'><select name = 'rmid'>
                <option value='0'>---ห้องที่จัดเก็บ---</option>";
                    $sql = "SELECT * FROM room ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['room_ID'].">".$row['room']."</option>";
                    }     }
               echo  "</select>";
                ?>
                </td>
                </tr>
                <tr> 
            <td></td>
                <td><input type="radio" name="rm" value="2">
                    ห้อง: <input type="text" name = "rmname" width="50">
                </td>
                </tr>
                <tr>
                <td>
                   ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริการ:
                </td>
                <td>
                <?php 
                echo "<input type='radio' name='voption' value='1'><select name = 'asven'>
                <option value='0'>---บริษัท---</option>";
                    $sql = "SELECT * FROM vendor ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['vendor_ID'].">".$row['vendor_company']."</option>";
                    }     }
               echo  "</select>";
                ?>
                </td>
            </tr>
            <tr> 
            <td></td>
                <td><input type="radio" name="voption" value="2">
                ชื่อบริษัท :
                    <input type="text" name = "vendor_company" width="50">
                </td>
                </tr>
                <tr>
                <td></td><td>ที่อยู่บริษัท :
                    <input type="text" name = "vendor_location" width="50">
                </td></tr>
                <tr>
                <td></td><td>โทรศัพท์ :
                    <input type="text" name = "vendor_tel" width="50">
                </td></tr>
                <tr>
                <td></td><td>โทรสาร :
                    <input type="text" name = "fax" width="50">
                </td></tr>
                <tr>
                <td>วิธีการได้มา : </td><td> 
                <?php
                $sql = "SELECT * FROM getmethod ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row['getMethod_ID'] == 2){echo "<input type='radio' name='gmet' value=".$row['getMethod_ID'].">".$row['method']."รายได้ปี <input type='text' name = 'year' width='50'>";}
                        else if ($row['getMethod_ID'] == 9) {echo "<input type='radio' name='gmet' value=".$row['getMethod_ID'].">".$row['method']."<input type='text' name = 'els' width='50'>";}
                        else {
                    echo "<input type='radio' name='gmet' value=".$row['getMethod_ID'].">".$row['method'];
                    }}     } ?>
                </td></tr>
                <tr>
                <td>
                    จำนวน: 
                </td>
                <td>    
                    <input type="text" name="quantity">
                </td>
            </tr>
            <tr>
                <td>
                    ราคาต่อหน่วย: 
                </td>
                <td>    
                    <input type="text" name="price">
                </td>
            </tr>
            <tr>
                <td>
                    หมายเหตุ: 
                </td>
                <td>    
                    <input type="text" name="note">
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" class="btn btn-primary" value ="InsertNew">
    </form></div></div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>