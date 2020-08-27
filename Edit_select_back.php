<?php 
require 'connect.php';
$initop = $_POST['initop'];
$addop = $_POST['addop'];
$insertop = $_POST['insertop'];
$updateop = $_POST['updateop'];
$delop = $_POST['delop'];
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
    if(isset($addop)){
        $output .= '<tr>
            <td  class = "widea" style= "text-align:center;vertical-align:middle"></td>
            <td class = "wideb"style= "text-align:center;vertical-align:middle"><input type="text" name="stat_name" id="stat_name"></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "s_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_cancel" >X</button>
            </td>
        </tr>';

    }
    if(isset($updateop) || isset($delop)){
        $ids = $_POST['id'];
        $sql = "SELECT * FROM assetstat WHERE asset_stat_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $output .= '<tr>
            <td  class = "widea" style= "text-align:center;vertical-align:middle">'.$row['asset_stat_ID'].'</td>
            <td class = "wideb"style= "text-align:center;vertical-align:middle"><input type="text" name="stat_name" id="stat_name" value = '.$row['asset_stat_name'].'></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle">';

            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "s_update" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_del" >ลบ</button>';
            }
            
            $output .= ' <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_cancel" >X</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    

    }
    
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
            if(isset($updateop)){
                $ids = $_POST['id'];
                if($id == $ids){
                $output .= '<tr>
                <td  class = "widea" style= "text-align:center;vertical-align:middle">'.$row['asset_stat_ID'].'</td>
                <td class = "wideb"style= "text-align:center;vertical-align:middle"><input type="text" name="stat_name" id="stat_name" value = '.$row['asset_stat_name'].'></td>
                <td  class = "wideb"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "s_update" >แก้ไข</button>
                <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_cancel" >X</button>
                </td>
                </tr>';
                }
            }
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
    </thead> <tbody>';
    $sql= "";
    if(isset($addop)){
        $output .= '<tr>
        <td  class = "widec"style= "text-align:center;vertical-align:middle"></td>
        <td  class = "wideb"style= "text-align:center;vertical-align:middle"><input style= "width:200px" type="text" name="type_name" id="type_name"></td>
        <td  class = "widec"style= "text-align:center;vertical-align:middle"><input style= "width:80px"  type="text" name="noun_name" id="noun_name"></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "t_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "t_cancel" >X</button>
            </td>
        </tr>';

    }
    if(isset($updateop) || isset($delop)){
        $ids = $_POST['id'];
        $sql = "SELECT * FROM assettype WHERE asset_type_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
        <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$row['asset_type_ID'].'</td>
        <td  class = "wideb"style= "text-align:center;vertical-align:middle"><input style= "width:200px" type="text" name="type_name" id="type_name" value = '.$row['asset_type_name'].'></td>
        <td  class = "widec"style= "text-align:center;vertical-align:middle"><input style= "width:80px"  type="text" name="noun_name" id="noun_name" value = '.$row['noun'].'></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "t_update" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "t_del" >ลบ</button>';
            }
            $output .= ' <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "t_cancel" >X</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
    
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
    </thead> <tbody>';
    if(isset($addop)){
        $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="dtype_name" id="dtype_name"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "d_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "d_cancel"  >X</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = $_POST['id'];
        $sql = "SELECT * FROM deploy_stat WHERE dstat_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle">'.$row['dstat_ID'].'</td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="dtype_name" id="dtype_name" value = '.$row['dstat'].'></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "d_update" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "d_del" >ลบ</button>';
            }
             $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "d_cancel"  >X</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
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
    </thead> <tbody>';
    if(isset($addop)){
        $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="gm_name" id="gm_name"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "gm_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "gm_cancel"  >X</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = $_POST['id'];
        $sql = "SELECT * FROM getmethod WHERE getMethod_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$ids.'</td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="gm_name" id="gm_name" value = '.$row['method'].'></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "gm_update" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "gm_del" >ลบ</button>';
            }
        
            $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "gm_cancel"  >X</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
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
    </thead> <tbody>';
    if(isset($addop)){
        $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="mt_name" id="mt_name"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "mt_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "mt_cancel"  >X</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = $_POST['id'];
        $sql = "SELECT * FROM money_type WHERE mid = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle">'.$ids.'</td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="mt_name" id="mt_name" value = "'.$row['money_type'].'"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "mt_update" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-denger" id = "mt_del" >ลบ</button>';
            }
            $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "mt_cancel"  >X</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
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
    </thead><tbody>';
    if(isset($addop)){
        $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" name="rp_name" id="rp_name"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" name="rp_lname" id="rp_lname"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "rp_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rp_cancel"  >X</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = $_POST['id'];
        $sql = "SELECT * FROM respon_per WHERE resper_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle">'.$ids.'</td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" name="rp_name" id="rp_name" value = "'.$row['resper_firstname'].'"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" name="rp_lname" id="rp_lname" value = "'.$lname = $row['resper_lastname'].'"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rp_update" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rp_del" >ลบ</button>';
            }
            $output .='
             <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rp_cancel"  >X</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
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
    $output='<table style = "width: 400px;height: 300px;overflow:auto;text-align:center;vertical-align:middle" id="rm_data" class="tr2 table table-bordered table-striped table-responsive">
    <thead>
     <tr>
      <th class = "widec"style= "text-align:center;vertical-align:middle">รหัสห้องที่จัดเก็บ</th>
      <th class = "widec"style= "text-align:center;vertical-align:middle">ห้องที่จัดเก็บ</th>
      <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead> <tbody>';
    if(isset($addop)){
        $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="rm_name" id="rm_name"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "rm_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rm_cancel"  >X</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = $_POST['id'];
        $sql = "SELECT * FROM room WHERE room_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle">'.$ids.'</td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="rm_name" id="rm_name" value = "'.$row['room'].'"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rm_update" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rm_del" >ลบ</button>';
            }
            $output .= '
             <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rm_cancel"  >X</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
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
    if(isset($addop)){
        $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" name="vd_name" id="vd_name"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" name="vd_lo" id="vd_lo"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="vd_tel" id="vd_tel"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="vd_fax" id="vd_fax"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "vd_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "vd_cancel"  >X</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = $_POST['id'];
        $sql = "SELECT * FROM vendor WHERE vendor_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
            <td  class = "widec" style= "text-align:center;vertical-align:middle">'.$ids.'</td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" name="vd_name" id="vd_name" value = "'.$row['vendor_company'].'"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" name="vd_lo" id="vd_lo" value = "'.$row['vendor_location'].'"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="vd_tel" id="vd_tel" value = "'.$row['vendor_tel'].'"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="vd_fax" id="vd_fax" value = "'.$row['fax'].'"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle">';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "vd_update" >แก้ไข</button>';
            } 
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "vd_del" >ลบ</button>';
            }
             $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "vd_cancel"  >X</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
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

if(isset($insertop)){
    if($insertop == 1){
        $statname = $_POST['stat_name'];
        $sql = "INSERT INTO assetstat ( asset_stat_name ) VALUE ( '".$statname."' )";
        if ($conn->query($sql) == TRUE) {
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    }
    if($insertop == 2){
        $tname = $_POST['type_name'];
        $nname = $_POST['noun_name'];
        $sql = "INSERT INTO assettype ( asset_type_name , noun ) VALUE ( '".$tname."' , '".$nname."')";
        if ($conn->query($sql) == TRUE) {
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    }
    if($insertop == 3){
        $dtname = $_POST['dtype_name'];
        $sql = "INSERT INTO deploy_stat (  dstat ) VALUE ( '".$dtname."' )";
        if ($conn->query($sql) == TRUE) {
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    }
    if($insertop == 4){
        $gmname = $_POST['gm_name'];
        $sql = "INSERT INTO getmethod (  method ) VALUE ( '".$gmname."' )";
        if ($conn->query($sql) == TRUE) {
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    }
    if($insertop == 5){
        $mtname = $_POST['mt_name'];
        $sql = "INSERT INTO money_type ( money_type ) VALUE ('".$mtname."')";
        if($conn->query($sql) == TRUE){
            exit();

        }
        else{

            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    if($insertop == 6){
        $rpname = $_POST['rp_name'];
        $rplname = $_POST['rp_lname'];
        $sql = "INSERT INTO respon_per ( resper_firstname , resper_lastname ) VALUE ('".$rpname."' , '".$rplname."')";
        if($conn->query($sql) == TRUE){

            exit();
        }
        else{

            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    if($insertop == 7){
        $rmname = $_POST['rm_name'];
        $sql = "INSERT INTO room (room) VALUE ('".$rmname."')";
        if($conn->query($sql) == TRUE){
            exit();

        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    if($insertop == 8){
        $vdname = $_POST['vd_name'];
        $vdlo = $_POST['vd_lo'];
        $vdtel =$_POST['vd_tel'];
        $vdfax = $_POST['vd_fax'];
        $sql = "INSERT INTO vendor (vendor_company , vendor_location , vendor_tel , fax) value ('".$vdname."' , '".$vdlo."' , '".$vdtel."' , '".$vdfax."')";
        if($conn->query($sql) == TRUE){
            exit();

        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;

        }
    }


   

}



?>