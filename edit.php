<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="CSS/input.css">
    <title>Document</title>
</head>

<?php
      require 'connect.php';
       ?>
<body>
<form action='assetmanage.php'>
<button type="submit">BACK</button>
</form><br>
<?php 
$asnum = $_GET['asset_number'];
$sql = "SELECT * FROM asset  natural join assetstat natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room natural join vendor WHERE asset_number = '".$_GET['asset_number']."'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
    $set = $row['asset_Set'];
    $O_N = $row['order_number'];
    $asid = $row['asset_ID'];
    $asname = $row['asset_name'];
    $mod = $row['model'];
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
<form action="edit2.php" method="POST">
<input type="hidden" name="asnum" value = "<?php echo $asnum; ?>">
<input id= "tx "type="text" value = "<?php echo $O_N; ?>" disabled> <br>
<input id= "tx "type="text" value = "<?php echo $asid; ?>" disabled> <br>
<input id= "tx "type="text" value = "<?php echo $asname; ?>" disabled> <br>
<input id = "tx"type="text" value = "<?php echo $mod; ?>" disabled> <br>
<input id= "tx" type="text" value = "<?php echo $aslo; ?>" disabled> <br>
<select name="lo" id="">
    <?php $sql = "SELECT * FROM asset_location WHERE asset_location_ID = '".$asloid."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_location_ID']." >".$row['asset_location']."</option>";
                    }     }
                    $sql = "SELECT * FROM asset_location WHERE asset_location_ID NOT IN ('".$asloid."')";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_location_ID']." >".$row['asset_location']."</option>";
                    }     }  ?>
    </select><br>
<select name="rm" id="">
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
    </select><br>
<select name="rsid" id="">
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
    </select><br>
<input id= "tx" type="text" value = "<?php echo $dstat; ?>"disabled> <br>
<select name="utype" id="">
    <?php $sql = "SELECT * FROM assetstat WHERE asset_stat_ID = '".$statid."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_stat_ID'].">".$row['asset_stat_name']."</option>";
                    }     } 
                    $sql = "SELECT * FROM assetstat WHERE asset_stat_ID NOT IN ('".$statid."')";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_stat_ID'].">".$row['asset_stat_name']."</option>";
                    }     }?>   
    </select><br>
<input id = "tx"type="text" value = "<?php echo $astype; ?>" disabled> <br>
<input id = "tx" type="text" value = "<?php echo $get_met; ?>"disabled> <br>
<input id = "tx" type="text" value = "<?php echo $vcom; ?>" disabled> <br>
<input id = "tx" type="text" value = "<?php echo $vtel; ?>"disabled> <br>
<input type="text " id ="tx" value = "<?php echo $vfax; ?>"disabled> <br>
<button type="submit" name = "action" value = "Single" class="btn btn-success">แก้ไขรายการเดียว</button>
<!-- <a href="edit2.php?asnum=<?php # echo $asnum; ?>"><button type="button">แก้ไขรายการเดียว</button></a> -->
<br>
<!-- <a href="edit2.php"><button type="button">แก้ไขหลายรายการ</button></a> -->
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
    </select><button type="submit" name = "action" value = "Multi" class="btn btn-danger">แก้ไขหลายรายการ</button>
</form>

</body>
<script>
function resizable (el, factor) {
    var int = Number(factor) || 7.7;
    function resize() {el.style.width = ((el.value.length+2) * int) + 'px'}
    var e = 'keyup,keypress,focus,blur,change'.split(',');
    for (var i in e) el.addEventListener(e[i],resize,false);
    resize();
  }
  resizable(document.getElementById('tx'),7);
</script>

</html>