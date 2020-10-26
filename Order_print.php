<!DOCTYPE html>
<?php SESSION_START(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="stylesheet" href="CSS/Checckbox.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/fonts/thsarabunnew.css" />
    <link rel="shortcut icon" href="img/computer.png">
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
    <form class="searchbox" id="sbox" action ="Order_print_back.php" method= "post" target= "_bank">
    <div><h1>พิมพ์รายการครุภัณฑ์</h1></div>
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
    <br>
    <br>
    <table>
    <tr>
        <td>
        <input type="checkbox" class="hidden-box" id="all"  name="all" value = "qd" />
    <label for="all" class="check--label">
      <span class="check--label-box"></span>
      <span >เลือกทั้งหมด</span>
    </label>
        </td>
    </tr>
    <tr>
    <td><input type="checkbox" class="hidden-box" id="a" name="asid" value = "qqq" />
    <label for="a" class="check--label">
      <span class="check--label-box"></span>
      <span >รหัสครุภัณฑ์</span>
    </label></td>
    <td><input type="checkbox" class="hidden-box" id="b" name ="nkn"/>
    <label for="b" class="check--label">
      <span class="check--label-box"></span>
      <span >ชื่อเรียก</span>
    </label></td>
    <td><input type="checkbox" class="hidden-box" id="s" name = "ustat" />
    <label for="s" class="check--label">
      <span class="check--label-box"></span>
      <span >สถานะการใช้งาน</span>
    </label></td>
    </tr>
    <tr>
    <td><input type="checkbox" class="hidden-box" id="q" name = "astyp" />
    <label for="q" class="check--label">
      <span class="check--label-box"></span>
      <span>ประเภทของครุภัณฑ์</span>
    </label></td>
    <td><input type="checkbox" class="hidden-box" id="w" name = "asroom"/>
    <label for="w" class="check--label">
      <span class="check--label-box"></span>
      <span>ห้องที่จัดเก็บครุภัณฑ์</span>
    </label></td>
    <td><input type="checkbox" class="hidden-box" id="e" name = "respers"/>
    <label for="e" class="check--label">
      <span class="check--label-box"></span>
      <span >ชื่อผู้รับผิดชอบ</span>
    </label></td>
    </tr>
    <tr>
    <td><input type="checkbox" class="hidden-box" id="f" name = "asname"/>
    <label for="f" class="check--label">
      <span class="check--label-box"></span>
      <span >ชื่อครุภัณฑ์</span>
    </label></td>
    </tr>
    </table>
    <br>
    
    <table width="50%" >
    
        <tr>
        <td><div ><select class="form-control form-control-lg" name="axis" id="axis">
        <option value='P'>แนวตั้ง</option>
        <option value='A4-L'>แนวนอน</option>
    </select></div></td>
            <td><button type="submit" name = "checkway" class="btns first" value = "order" style = "font-size:12px" id = "search_button">พิมพ์รายการครุภัณฑ์</button></td>
            <td><button type="submit" name = "checkway" class="btns first" value = "exorder" style = "font-size:12px" id = "search_button">ดาวน์โหลด Excel</button></td>
        </tr>
        
    </table>
    <br>
    
    </center>
    </form>
    
    </div>
   
    
    
    </center>
    
</body>
</html>

   
    <script>
$(document).ready(function(){

    $(document).on('change','#all',function(){
        if(this.checked) {
            $('#a').prop( "checked", true );
            $('#b').prop( "checked", true );
            $('#s').prop( "checked", true );
            $('#q').prop( "checked", true );
            $('#w').prop( "checked", true );
            $('#e').prop( "checked", true );
            $('#f').prop( "checked", true );
        }
        else{
            $('#a').prop( "checked", false );
            $('#b').prop( "checked", false );
            $('#s').prop( "checked", false );
            $('#q').prop( "checked", false );
            $('#w').prop( "checked", false );
            $('#e').prop( "checked", false );
            $('#f').prop( "checked", false );
        }
    })
 $('#gm').multiselect({
  nonSelectedText: 'เลือกวิธีการได้รับ',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#rm').multiselect({
  nonSelectedText: 'เลือกห้องที่จัดเก็บ',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#tp').multiselect({
  nonSelectedText: 'เลือกประเภทครุภัณฑ์',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#stt').multiselect({
  nonSelectedText: 'เลือกสถานะการใช้งาน',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#dstt').multiselect({
  nonSelectedText: 'เลือกสถานะการติดตั้ง',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });
 $('#rp').multiselect({
  nonSelectedText: 'เลือกผู้รับผิดชอบ',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true
 
 });



 
});
</script>