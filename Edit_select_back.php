<?php 
require 'connect.php';
$initop = $_POST['initop'];
$output = "";
if($initop == 1){

    $output .= ' <table style = "width: 500px;text-align:center;vertical-align:middle" id="stat_data" class="tr1 table table-bordered table-striped">
    <thead>
     <tr>
      <th class = "widea"style= "text-align:center;vertical-align:middle">รหัสสถานะครุภัณฑ์</th>
      <th class = "wideb"style= "text-align:center;vertical-align:middle">สถาะครุภัณฑ์</th>
      <th class = "wideb"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>
    <tbody>';

    if(isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM assetstat WHERE asset_stat_ID Like '%".$s."%' OR asset_stat_name Like '%".$s."%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['asset_stat_ID'];
            $name = $row['asset_stat_name'];
            $output .= '<tr>
            <td  class = "widea" style= "text-align:center;vertical-align:middle">'.$id.'</td>
            <td class = "wideb"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "s_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    }
    else if(!isset($_POST['query'])){
        $sql = "SELECT * FROM assetstat ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['asset_stat_ID'];
            $name = $row['asset_stat_name'];
            $output .= '<tr>
            <td  class = "widea"style= "text-align:center;vertical-align:middle">'.$id.'</td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "s_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }

    }

    }
    $output .="</tbody></table>";
    echo $output;
    exit();
    

}
else if($initop == 2){
    $output = '<table style = "width: 500px;text-align:center;vertical-align:middle" id="type_data" class="tr2 table table-bordered table-striped">
    <thead>
     <tr>
      <th class = "widec" style= "text-align:center;vertical-align:middle">รหัสประเภทครุภัณฑ์</th>
      <th class = "wideb"style= "text-align:center;vertical-align:middle">ประเภทครุภัณฑ์</th>
      <th class = "widec"style= "text-align:center;vertical-align:middle">ลักษณะนาม</th>
      <th class = "wideb"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>';
    $sql= "";
    if(isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM assettype WHERE asset_type_ID Like '%".$s."%' OR asset_type_name Like '%".$s."%' OR noun Like '%".$s."%'";
    }
    else if(!isset($_POST['query'])){
        $sql = "SELECT * FROM assettype ";
    }
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['asset_type_ID'];
            $name = $row['asset_type_name'];
            $n = $row['noun'];
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$id.'</td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$n.'</td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "t_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "t_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    $output .="</tbody></table>";
    echo $output;
    exit();


}
else if($initop == 3){
    $output='<table style = "width: 400px;text-align:center;vertical-align:middle" id="dtype_data" class="tr2 table table-bordered table-striped">
    <thead>
     <tr>
      <th class = "widec"style= "text-align:center;vertical-align:middle">รหัสประเภทการติดตั้ง</th>
      <th class = "widec"style= "text-align:center;vertical-align:middle">ประเภทการติดตั้ง</th>
      <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>';
    $sql= "";

    if(isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM deploy_stat WHERE dstat_ID Like '%".$s."%' OR dstat Like '%".$s."%'";

    }
    else if(!isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM deploy_stat";

    }
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['dstat_ID'];
            $name = $row['dstat'];
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$id.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "d_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "d_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    $output .="</tbody></table>";
    echo $output;
    exit();

}

else if($initop == 4){
    $output='<table style = "width: 400px;text-align:center;vertical-align:middle" id="gm_data" class="tr2 table table-bordered table-striped">
    <thead>
     <tr>
      <th class = "widec"style= "text-align:center;vertical-align:middle">รหัสวิธีการได้รับ</th>
      <th class = "widec"style= "text-align:center;vertical-align:middle">วิธีการได้รับ</th>
      <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>';
    $sql= "";

    if(isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM getmethod WHERE getMethod_ID Like '%".$s."%' OR method Like '%".$s."%'";

    }
    else if(!isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM getmethod";

    }
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['getMethod_ID'];
            $name = $row['method'];
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$id.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "gm_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "gm_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    $output .="</tbody></table>";
    echo $output;
    exit();

}

else if($initop == 5){
    $output='<table style = "width: 400px;text-align:center;vertical-align:middle" id="mt_data" class="tr2 table table-bordered table-striped">
    <thead>
     <tr>
      <th class = "widec"style= "text-align:center;vertical-align:middle">รหัสประเภทเงินงบประมาณ</th>
      <th class = "widec"style= "text-align:center;vertical-align:middle">ประเภทเงินงบประมาณ</th>
      <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>';
    $sql= "";

    if(isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM money_type WHERE mid Like '%".$s."%' OR money_type Like '%".$s."%'";

    }
    else if(!isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM money_type";

    }
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['mid'];
            $name = $row['money_type'];
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$id.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "mt_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "mt_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    $output .="</tbody></table>";
    echo $output;
    exit();

}

else if($initop == 6){
    $output='<table style = "width: 700px;text-align:center;vertical-align:middle" id="rp_data" class="tr2 table table-bordered table-striped">
    <thead>
     <tr>
        <th class = "widec"style= "text-align:center;vertical-align:middle">รหัสผู้รับผิดชอบ</th>
        <th class = "widea"style= "text-align:center;vertical-align:middle">ชื่อผู้รับผิดชอบ</th>
        <th class = "widea"style= "text-align:center;vertical-align:middle">นามสกุลผู้รับผิดชอบ</th>
        <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>';
    $sql= "";

    if(isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM respon_per WHERE resper_ID Like '%".$s."%' OR resper_firstname Like '%".$s."%' OR resper_lastname LIKE '%".$s."%'";

    }
    else if(!isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM respon_per";

    }
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['resper_ID'];
            $name = $row['resper_firstname'];
            $lname = $row['resper_lastname'];
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$id.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle">'.$lname.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rp_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rp_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    $output .="</tbody></table>";
    echo $output;
    exit();

}

else if($initop == 7){
    $output='<table style = "width: 400px;text-align:center;vertical-align:middle" id="rm_data" class="tr2 table table-bordered table-striped">
    <thead>
     <tr>
      <th class = "widec"style= "text-align:center;vertical-align:middle">รหัสห้องที่จัดเก็บ</th>
      <th class = "widec"style= "text-align:center;vertical-align:middle">ห้องที่จัดเก็บ</th>
      <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>';
    $sql= "";

    if(isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM room WHERE room_ID Like '%".$s."%' OR room Like '%".$s."%'";

    }
    else if(!isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM room";

    }
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['room_ID'];
            $name = $row['room'];
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$id.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rm_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rm_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    $output .="</tbody></table>";
    echo $output;
    exit();

}

else if($initop == 8){
    $output='<table style = "width: 900px;text-align:center;vertical-align:middle" id="vd_data" class="tr2 table table-bordered table-striped">
    <thead>
     <tr>
     <th class = "widec"style= "text-align:center;vertical-align:middle">รหัสผู้ค้า</th>
     <th class = "widea"style= "text-align:center;vertical-align:middle">บริษัทผู้ค้า</th>
     <th class = "widea"style= "text-align:center;vertical-align:middle">ที่อยู่บริษัท</th>
     <th class = "widec"style= "text-align:center;vertical-align:middle">โทรศัพท์</th>
     <th class = "widec"style= "text-align:center;vertical-align:middle">โทรสาร</th>
     <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>';
    $sql= "";

    if(isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM vendor WHERE vendor_ID Like '%".$s."%' OR vendor_company Like '%".$s."%' OR vendor_location Like '%".$s."%' OR vendor_tel Like '%".$s."%' OR fax Like '%".$s."%'";

    }
    else if(!isset($_POST['query'])){
        $s = $_POST['query'];
        $sql = "SELECT * FROM vendor";

    }
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['vendor_ID'];
            $name = $row['vendor_company'];
            $lo = $row['vendor_location'];
            $tel = $row['vendor_tel'];
            $fax = $row['fax'];
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$id.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle">'.$lo.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$tel.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$fax.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "vd_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "vd_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    $output .="</tbody></table>";
    echo $output;
    exit();

}
?>