
<?php require 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/input.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <link rel="stylesheet" href="CSS/formstyle.css"> 
     <link rel="stylesheet" href="CSS/fonts/thsarabunnew.css" />
    <link rel="stylesheet" href="CSS/submitstyle.css">
    <link rel="stylesheet" href="Css/BG.css">
    <title>CS_Asset</title>
</head>
<?php require 'nav.php'; ?>
<div>
<br><br>
<?php 
$asnum = $_GET['asset_number'];
$sql = "SELECT * FROM asset  natural join assetstat natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room natural join vendor WHERE asset_number = '".$_GET['asset_number']."'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
    $set = $row['asset_Set'];
    $O_N = $row['order_number'];
    $asid = $row['asset_ID'];
    $a_sn = $row['asset_setname'];
    $a_nn = $row['asset_nickname'];
    $asname = $row['asset_name'];
    $date = $row['addin_date'];
    $mod = $row['model'];
    $a_or = $row['asset_order'];
    $a_pp =$row['property'];
    $aslo = $row['asset_location'];
    $asloid = $row['asset_location_ID'];
    $rmid = $row['room_ID'];
    $rm = $row['room'];
    $respid = $row['resper_ID'];
    $resper =  $row['resper_firstname']." ".$row['resper_lastname'];
    $dstat =  $row['dstat'];
    $statid = $row['asset_stat_ID'];
    $stat = $row['asset_stat_name'];
    $astype = $row['asset_type_name'];
    $get_met = $row['get_method'];
    $vcom =  $row['vendor_company'];
    $vlo =  $row['vendor_location'];
    $vtel =  $row['vendor_tel'];
    $vfax = $row['fax'];
}
}
?>
<br>
<form class="box" style="height: 800px;" action="edit2.php" method="POST">
<div class="head">แก้ไขรายละเอียดครุภัณฑ์</div>
<br>
<div align = "center">
<table>
<tr><td>รายการที่ : </td><td><input id= "tx "type="text" value = "<?php echo $O_N; ?>" disabled></td></tr>
<tr><td>วันที่</td><td><input type="date" name="dte" id="" value = "<?php echo $date; ?>"></td></tr>
<tr><td>รหัสครุภัณฑ์ :</td><td><input id= "tx "type="text" value = "<?php echo $asid; ?>" disabled> </td></tr>
<tr><td>ชื่อชุดครุภัณฑ์ :</td><td><input type="text" name="a_snf" value ="<?php echo $a_sn; ?>" id="" ></td></tr>
<tr><td>ชื่อเรียกครุภัณฑ์ :</td><td><input type="text" name="a_nnf" value="<?php echo $a_nn; ?>"  ></td></tr>
<tr><td>ชื่อครุภัณฑ์ :</td><td><input id= "tx "type="text" name = "a_nf" value = "<?php echo $asname; ?>" ></td></tr>
<tr><td>รุ่น/แบบ : </td><td><input name = "mod" type="text" value = "<?php echo $mod; ?>" ></td></tr>
<tr><td>หมายเลขทะเบียน :</td><td><input type="text" name = "a_orf" value ="<?php echo $a_or; ?>" ></td></tr>
<tr><td>คุณลักษณะ :</td><td><input type="text" name ="a_ppf" value = "<?php echo $a_pp?>" > </td></tr>
<tr><td>สถานที่ :</td><td><input id= "tx" type="text" value = "<?php echo $aslo; ?>" ></td></tr>
<tr><td>ห้องที่จัดเก็บ :</td><td><select name="rm" id="">
    <?php $sql = "SELECT * FROM room WHERE room_ID = '".$rmid."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['room_ID']." >".$row['room']."</option>";
                    }     }
                    $sql = "SELECT * FROM room WHERE room_ID NOT IN ('".$rmid."')";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['room_ID']." >".$row['room']."</option>";
                    }     }  ?>
    </select></td></tr>
<tr><td>ผู้รับผิดชอบ :</td><td><select name="rsid" id="">
    <?php $sql = "SELECT * FROM respon_per WHERE resper_ID = '".$respid."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['resper_ID']." >".$row['resper_firstname']." ".$row['resper_lastname']."</option>";
                    }     }
                    $sql = "SELECT * FROM respon_per WHERE resper_ID NOT IN ('".$respid."')";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['resper_ID']." >".$row['resper_firstname']." ".$row['resper_lastname']."</option>";
                    }     }  ?>
    </select></td></tr>
<tr><td>สถานะการติดตั้ง :</td><td><input id= "tx" type="text" value = "<?php echo $dstat; ?>"disabled></td></tr>
<tr><td>ประเภทครุภัณฑ์ :</td><td><input id = "tx"type="text" value = "<?php echo $astype; ?>" disabled > </td></tr>
<tr><td>วิธีการได้รับ :</td><td><input id = "tx" type="text" value = "<?php echo $get_met; ?>"disabled></td></tr>
<tr><td>บริษัทผู้ขาย :</td><td><input  type="text" value = "<?php echo $vcom; ?>" disabled></td></tr>
<tr><td>เบอร์โทรศัพท์ติดต่อ :</td><td><input id = "tx" type="text" value = "<?php echo $vtel; ?>"disabled></td></tr>
<tr><td>โทรสาร :</td><td><input type="text " id ="tx" value = "<?php echo $vfax; ?>"disabled></td></tr>
</table>
</div><br>
<input type="hidden" name="asnum" value = "<?php echo $asnum; ?>">

<button type="submit" name = "action" value = "Single" class="btn btn-success">แก้ไขรายการเดียว</button>

<br>

<select name="num1" id="">
    <?php $sql = "SELECT asset_number FROM asset WHERE asset_number = '".$asnum."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_number'].">".$row['asset_number']."</option>";
                    }     } 
                    $sql = "SELECT asset_number FROM asset WHERE (asset_number NOT IN ('".$asnum."') and asset_Set IN ('".$set."')) ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_number'].">".$row['asset_number']."</option>";
                    }     }?>   
    </select>ถึง<select name="num2" id="">
    <?php $sql = "SELECT asset_number FROM asset WHERE asset_number = '".$asnum."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_number'].">".$row['asset_number']."</option>";
                    }     } 
                    $sql = "SELECT asset_number FROM asset WHERE (asset_number NOT IN ('".$asnum."') and asset_Set IN ('".$set."')) ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_number'].">".$row['asset_number']."</option>";
                    }     }?>   
    </select>
    <button type="submit" name = "action" value = "Multi" class="btn btn-danger">แก้ไขหลายรายการ</button>
</form>
</div>


</body>
</html>
<?php require 'footer.php'; ?>


