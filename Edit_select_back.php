<?php SESSION_START();
require 'connect.php';
include 'action_insert.php';
if(isset($_POST['initop'])){
    $initop = $_POST['initop'];
}
if(isset($_POST['addop'])){
    $addop = $_POST['addop'];
}
if(isset($_POST['insertop'])){
    $insertop = $_POST['insertop'];
}
if(isset($_POST['updateop'])){
    $updateop = $_POST['updateop'];
}
if(isset($_POST['delop'])){
    $delop = $_POST['delop'];
}
if(isset($_POST['update'])){
    $update = $_POST['update'];
}
if(isset($_POST['del'])){
    $del = $_POST['del'];
}
$output = "";

if($initop == 1){

    $output .= ' <table style = "width: 500px;text-align:center;vertical-align:middle" id="stat_data" class="tr1 table table-bordered table-striped">
    <thead>
     <tr>

      <th class = "wideb"style= "text-align:center;vertical-align:middle">สถาะครุภัณฑ์</th>
      <th class = "wideb"style= "text-align:center;vertical-align:middle">สีสถานะครุภัณฑ์</th>
      <th class = "wideb"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>
    <tbody>';
    if(isset($addop)){
        $output .= '<tr>
           
            <td class = "wideb"style= "text-align:center;vertical-align:middle"><input type="text" name="stat_name" class = "statin" id="stat_name"></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"><input type="color" id="favcolor" name="favcolor" value="#000000"></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "s_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_cancel" >ยกเลิก</button>
            </td>
        </tr>';

    }
    if(isset($updateop) || isset($delop)){
        $ids = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT * FROM assetstat WHERE asset_stat_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            $output .= '<tr>
            
            <td class = "wideb"style= "text-align:center;vertical-align:middle"><input type="text" name="stat_name" class = "statin" id="stat_name" value = '.$row['asset_stat_name'].'></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"><input type="color" id="favcolor" name="favcolor" value="'.$row['asset_stat_color'].'" ></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle">';

            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "s_update" value = "'.$ids.'" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_del" value = "'.$ids.'">ลบ</button>';
            }
            
            $output .= ' <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_cancel" >ยกเลิก</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    

    }
    
    if(isset($_POST['query'])){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM assetstat WHERE asset_stat_ID Like '%".$s."%' OR asset_stat_name Like '%".$s."%' AND asset_stat_ID NOT IN ('15') ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['asset_stat_ID'];
            $name = $row['asset_stat_name'];
            $output .= '<tr>
            
            <td class = "wideb"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"><input type="color" id="favcolor" name="favcolor" value="'.$row['asset_stat_color'].'" disabled></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "s_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    }
    else if(!isset($_POST['query'])&&!isset($addop)){
        $sql = "SELECT * FROM assetstat WHERE asset_stat_ID NOT IN ('15') ";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['asset_stat_ID'];
            $name = $row['asset_stat_name'];
            if(isset($updateop)){
                $ids = mysqli_real_escape_string($conn, $_POST['id']);
                if($id == $ids){
                $output .= '<tr>
                
                <td class = "wideb"style= "text-align:center;vertical-align:middle"><input type="text" name="stat_name" id="stat_name" value = '.$row['asset_stat_name'].'></td>
                <td  class = "wideb"style= "text-align:center;vertical-align:middle"><input type="color" id="favcolor" name="favcolor" value="'.$row['asset_stat_color'].'" disabled></td>
                <td  class = "wideb"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "s_update" >แก้ไข</button>
                <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "s_cancel" >ยกเลิก</button>
                </td>
                </tr>';
                }
            }
            $output .= '<tr>
            
            <td  class = "wideb"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"><input type="color" id="favcolor" name="favcolor" value="'.$row['asset_stat_color'].'" disabled></td>
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
      
      <th class = "wideb"style= "text-align:center;vertical-align:middle">ประเภทครุภัณฑ์</th>
      <th class = "widec"style= "text-align:center;vertical-align:middle">ลักษณะนาม</th>
      <th class = "wideb"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead> <tbody>';
    $sql= "";
    if(isset($addop)){
        $output .= '<tr>
        
        <td  class = "wideb"style= "text-align:center;vertical-align:middle"><input style= "width:200px" type="text" class = "typein" name="type_name" id="type_name"></td>
        <td  class = "widec"style= "text-align:center;vertical-align:middle"><input style= "width:80px"  type="text" class = "typein" name="noun_name" id="noun_name"></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "t_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "t_cancel" >ยกเลิก</button>
            </td>
        </tr>';

    }
    if(isset($updateop) || isset($delop)){
        $ids = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT * FROM assettype WHERE asset_type_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
       
        <td  class = "wideb"style= "text-align:center;vertical-align:middle"><input style= "width:200px" type="text" name="type_name" class = "typein" id="type_name" value = '.$row['asset_type_name'].'></td>
        <td  class = "widec"style= "text-align:center;vertical-align:middle"><input style= "width:80px"  type="text" name="noun_name" class = "typein" id="noun_name" value = '.$row['noun'].'></td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "t_update" value = "'.$ids.'" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "t_del" value = "'.$ids.'" >ลบ</button>';
            }
            $output .= ' <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "t_cancel" >ยกเลิก</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
    
    if(isset($_POST['query'])&&!isset($addop)){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM assettype WHERE asset_type_ID Like '%".$s."%' OR asset_type_name Like '%".$s."%' OR noun Like '%".$s."%' AND asset_type_ID NOT IN ('23')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['asset_type_ID'];
            $name = $row['asset_type_name'];
            $n = $row['noun'];
            $output .= '<tr>
           
            <td  class = "wideb"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$n.'</td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "t_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "t_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    }
    else if(!isset($_POST['query'])&&!isset($addop)){
        $sql = "SELECT * FROM assettype WHERE asset_type_ID NOT IN ('23')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['asset_type_ID'];
            $name = $row['asset_type_name'];
            $n = $row['noun'];
            $output .= '<tr>
           
            <td  class = "wideb"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$n.'</td>
            <td  class = "wideb"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "t_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "t_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
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
     
      <th class = "widec"style= "text-align:center;vertical-align:middle">ประเภทการติดตั้ง</th>
      <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead> <tbody>';
    if(isset($addop)){
        $output .= '<tr>
           
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" name="dtype_name" id="dtype_name" class = "dtypein"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "d_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "d_cancel"  >ยกเลิก</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT * FROM deploy_stat WHERE dstat_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
            
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" class = "dtypein" name="dtype_name" id="dtype_name" value = '.$row['dstat'].'></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "d_update" value = "'.$ids.'">แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "d_del" value = "'.$ids.'">ลบ</button>';
            }
             $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "d_cancel"  >ยกเลิก</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
    if(isset($_POST['query'])&&!isset($addop)){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM deploy_stat WHERE dstat_ID Like '%".$s."%' OR dstat Like '%".$s."%' AND dstat_ID NOT IN ('12')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['dstat_ID'];
            $name = $row['dstat'];
            $output .= '<tr>
           
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "d_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "d_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    }
    else if(!isset($_POST['query'])&&!isset($addop)){
        
        $sql = "SELECT * FROM deploy_stat WHERE dstat_ID NOT IN ('12')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['dstat_ID'];
            $name = $row['dstat'];
            $output .= '<tr>
           
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "d_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "d_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
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
      
      <th class = "widec"style= "text-align:center;vertical-align:middle">วิธีการได้รับ</th>
      <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead> <tbody>';
    if(isset($addop)){
        $output .= '<tr>
           
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" class = "gmin" type="text" name="gm_name" id="gm_name"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "gm_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "gm_cancel"  >ยกเลิก</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT * FROM getmethod WHERE getMethod_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
           
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" class = "gmin" type="text" name="gm_name" id="gm_name" value = '.$row['method'].'></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "gm_update" value = "'.$ids.'">แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "gm_del" value = "'.$ids.'" >ลบ</button>';
            }
        
            $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "gm_cancel"  >ยกเลิก</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
    if(isset($_POST['query'])&&!isset($addop)){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM getmethod WHERE getMethod_ID Like '%".$s."%' OR method Like '%".$s."%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['getMethod_ID'];
            $name = $row['method'];
            $output .= '<tr>
            
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "gm_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "gm_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    }
    else if(!isset($_POST['query'])&&!isset($addop)){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM getmethod";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['getMethod_ID'];
            $name = $row['method'];
            $output .= '<tr>
            
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "gm_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "gm_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
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
      
      <th class = "widec"style= "text-align:center;vertical-align:middle">ประเภทเงินงบประมาณ</th>
      <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead> <tbody>';
    if(isset($addop)){
        $output .= '<tr>
           
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" class = "mtin" type="text" name="mt_name" id="mt_name"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "mt_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "mt_cancel"  >ยกเลิก</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT * FROM money_type WHERE mid = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
           
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" class = "mtin" type="text" name="mt_name" id="mt_name" value = "'.$row['money_type'].'"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "mt_update" value = "'.$ids.'">แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-denger" id = "mt_del"  value = "'.$ids.'">ลบ</button>';
            }
            $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "mt_cancel"  >ยกเลิก</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
    if(isset($_POST['query'])&&!isset($addop)){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM money_type WHERE mid Like '%".$s."%' OR money_type Like '%".$s."%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['mid'];
            $name = $row['money_type'];
            $output .= '<tr>
            
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "mt_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "mt_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    }
    else if(!isset($_POST['query'])&&!isset($addop)){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM money_type";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['mid'];
            $name = $row['money_type'];
            $output .= '<tr>
            
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "mt_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "mt_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
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
        
        <th class = "widea"style= "text-align:center;vertical-align:middle">ชื่อผู้รับผิดชอบ</th>
        <th class = "widea"style= "text-align:center;vertical-align:middle">นามสกุลผู้รับผิดชอบ</th>
        <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead><tbody>';
    if(isset($addop)){
        $output .= '<tr>
            
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" class = "rpin" type="text" name="rp_name" id="rp_name"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" class = "rpin" type="text" name="rp_lname" id="rp_lname"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "rp_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rp_cancel"  >ยกเลิก</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT * FROM respon_per WHERE resper_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
            
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" class = "rpin" name="rp_name" id="rp_name" value = "'.$row['resper_firstname'].'"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" class = "rpin" name="rp_lname" id="rp_lname" value = "'.$lname = $row['resper_lastname'].'"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rp_update" value = "'.$ids.'" >แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rp_del" value = "'.$ids.'">ลบ</button>';
            }
            $output .='
             <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rp_cancel"  >ยกเลิก</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
    if(isset($_POST['query'])&&!isset($addop)){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM respon_per WHERE (resper_ID Like '%".$s."%' OR resper_firstname Like '%".$s."%' OR resper_lastname LIKE '%".$s."%') AND (resper_ID NOT IN ('48'))";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['resper_ID'];
            $name = $row['resper_firstname'];
            $lname = $row['resper_lastname'];
            $output .= '<tr>
           
            <td  class = "widea"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle">'.$lname.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rp_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rp_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    }
    else if(!isset($_POST['query'])&&!isset($addop)){
       
        $sql = "SELECT * FROM respon_per WHERE resper_ID NOT IN ('48')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['resper_ID'];
            $name = $row['resper_firstname'];
            $lname = $row['resper_lastname'];
            $output .= '<tr>
           
            <td  class = "widea"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle">'.$lname.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rp_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rp_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
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
     
      <th class = "widec"style= "text-align:center;vertical-align:middle">ห้องที่จัดเก็บ</th>
      <th class = "widec"style= "text-align:center;vertical-align:middle">ผู้รับผิดชอบประจำห้อง</th>
      <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead> <tbody>';
    if(isset($addop)){
        $output .= '<tr>
            
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" class = "rmin" name="rm_name" id="rm_name"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle">';
            $output .= "<select name = 'resid' id ='resid'>
            <option value='0'>---ผู้รับผิดชอบ---</option>";
                $sqlrr = "SELECT * FROM respon_per ";
                $result = $conn->query($sqlrr);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $output .= "<option value=".$row['resper_ID'].">".$row['resper_firstname']." ".$row['resper_lastname']."</option>";
                }     }
                $output .=  "</select></td>";
                $output .= '<td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "rm_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rm_cancel"  >ยกเลิก</button>
            </td>
        </tr>';

    }
    $sql= "";
    if(isset($updateop) || isset($delop)){
        $ids = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "SELECT * FROM room  WHERE room_ID = '".$ids."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '<tr>
            
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px"class = "rmin" type="text" name="rm_name" id="rm_name" value = "'.$row['room'].'"></td>
            <td style= "text-align:center;vertical-align:middle"> <select name = "resid" id ="resid">';
            if($row['resper_IDs'] != NULL || $row['resper_IDs'] != 0){
                $sqlrr = "SELECT * FROM respon_per WHERE resper_ID = '".$row['resper_IDs']."'";
                $resultr = $conn->query($sqlrr);
                if ($resultr->num_rows > 0) {
                while($rowr = $resultr->fetch_assoc()) {
                $output .= "<option value=".$rowr['resper_ID'].">".$rowr['resper_firstname']." ".$rowr['resper_lastname']."</option>";
                }
            }
                $sqlrr = "SELECT * FROM respon_per WHERE resper_ID NOT IN ('".$row['resper_IDs']."')";
                $resultr = $conn->query($sqlrr);
                if ($resultr->num_rows > 0) {
                while($rowr = $resultr->fetch_assoc()) {
                    $output .= "<option value=".$rowr['resper_ID'].">".$rowr['resper_firstname']." ".$rowr['resper_lastname']."</option>";
                    }
                }
            }
            else{

                $output.="<option value='0'>---ผู้รับผิดชอบ---</option>";
                $sqlrr = "SELECT * FROM respon_per ";
                $resultr = $conn->query($sqlrr);
                if ($resultr->num_rows > 0) {
                while($rowr = $resultr->fetch_assoc()) {
                    $output .= "<option value=".$rowr['resper_ID'].">".$rowr['resper_firstname']." ".$rowr['resper_lastname']."</option>";
                }    
             }
            }
            $output .= '</select></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> ';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rm_update" value = "'.$ids.'">แก้ไข</button>';
            }
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rm_del" value = "'.$ids.'">ลบ</button>';
            }
            $output .= '
             <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rm_cancel"  >ยกเลิก</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
    if(isset($_POST['query'])&&!isset($addop)){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM room  WHERE room_ID Like '%".$s."%' OR room Like '%".$s."%' AND room_ID NOT IN ('64') ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['room_ID'];
            $name = $row['room'];
            $rsname ="";
            $sqlrr = "SELECT * FROM respon_per WHERE resper_ID = '".$row['resper_IDs']."'";
                $resultr = $conn->query($sqlrr);
                if ($resultr->num_rows > 0) {
                while($rowr = $resultr->fetch_assoc()) {
                    if($rowr['resper_ID'] == 0){
                        $rsname = "ยังไม่มีผู้รับผิดชอบ";
                    }
                    else{
                        $rsname = $rowr['resper_firstname']." ".$rowr['resper_lastname'];
                    }
                    
                }    
             }else{ $rsname = "ยังไม่มีผู้รับผิดชอบ"; }
            
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$rsname.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rm_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rm_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
    }
    }
    else if(!isset($_POST['query'])&&!isset($addop)){
     
        $sql = "SELECT * FROM room WHERE room_ID NOT IN ('64') ORDER BY room";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['room_ID'];
            $name = $row['room'];
            $rsname ="";
            $sqlrr = "SELECT * FROM respon_per WHERE resper_ID = '".$row['resper_IDs']."'";
                $resultr = $conn->query($sqlrr);
                if ($resultr->num_rows > 0) {
                while($rowr = $resultr->fetch_assoc()) {
                    if($rowr['resper_ID'] == 0){
                        $rsname = "ยังไม่มีผู้รับผิดชอบ";
                    }
                    else{
                        $rsname = $rowr['resper_firstname']." ".$rowr['resper_lastname'];
                    }
                    
                }    
             }else{ $rsname = "ยังไม่มีผู้รับผิดชอบ"; }
            
            $output .= '<tr>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$name.'</td>
            <td  class = "widec"style= "text-align:center;vertical-align:middle">'.$rsname.'</td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> 
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "rm_edit" value ="'.$id.'">แก้ไข</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "rm_delete" value ="'.$id.'">ลบ</button>
            </td>
            </tr>';

        }
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
     
     <th class = "widea"style= "text-align:center;vertical-align:middle">บริษัทผู้ค้า</th>
     <th class = "widea"style= "text-align:center;vertical-align:middle">ที่อยู่บริษัท</th>
     <th class = "widec"style= "text-align:center;vertical-align:middle">โทรศัพท์</th>
     <th class = "widec"style= "text-align:center;vertical-align:middle">โทรสาร</th>
     <th class = "widea"style= "text-align:center;vertical-align:middle">ตัวเลือก</th>
     </tr>
    </thead>';
    if(isset($addop)){
        $output .= '<tr>
            
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" class = "vdin" type="text" name="vd_name" id="vd_name"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" class = "vdin" type="text" name="vd_lo" id="vd_lo"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" class = "vdin" type="text" name="vd_tel" id="vd_tel"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" class = "vdin" type="text" name="vd_fax" id="vd_fax"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle"> <button style = "font-size: 15px;" type="button" class="btn btn-outline-success" id = "vd_insert" >เพิ่ม</button>
            <button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "vd_cancel"  >ยกเลิก</button>
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
           
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" class = "vdin" name="vd_name" id="vd_name" value = "'.$row['vendor_company'].'"></td>
            <td class = "widea"style= "text-align:center;vertical-align:middle"><input style = "width:150px" type="text" class = "vdin" name="vd_lo" id="vd_lo" value = "'.$row['vendor_location'].'"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" class = "vdin" name="vd_tel" id="vd_tel" value = "'.$row['vendor_tel'].'"></td>
            <td class = "widec"style= "text-align:center;vertical-align:middle"><input style = "width:80px" type="text" class = "vdin" name="vd_fax" id="vd_fax" value = "'.$row['fax'].'"></td>
            <td  class = "widea"style= "text-align:center;vertical-align:middle">';
            if(isset($updateop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-warning" id = "vd_update" value = "'.$ids.'">แก้ไข</button>';
            } 
            else if(isset($delop)){
                $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "vd_del" value = "'.$ids.'">ลบ</button>';
            }
             $output .= '<button style = "font-size: 15px;" type="button" class="btn btn-outline-danger" id = "vd_cancel"  >ยกเลิก</button>
            </td>
        </tr>';
            }
        }
        
    $output .="</tbody></table>";
    echo $output;
    exit();
    
    }
    if(isset($_POST['query'])&&!isset($addop)){
        $s = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT * FROM vendor WHERE vendor_ID Like '%".$s."%' OR vendor_company Like '%".$s."%' OR vendor_location Like '%".$s."%' OR vendor_tel Like '%".$s."%' OR fax Like '%".$s."%' AND vendor_ID NOT IN ('49')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['vendor_ID'];
            $name = $row['vendor_company'];
            $lo = $row['vendor_location'];
            $tel = $row['vendor_tel'];
            $fax = $row['fax'];
            $output .= '<tr>
           
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
    }
    else if(!isset($_POST['query'])&&!isset($addop)){
     
        $sql = "SELECT * FROM vendor WHERE vendor_ID NOT IN ('49') ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['vendor_ID'];
            $name = $row['vendor_company'];
            $lo = $row['vendor_location'];
            $tel = $row['vendor_tel'];
            $fax = $row['fax'];
            $output .= '<tr>
           
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
    }
    
    $output .="</tbody></table>";
    echo $output;
    exit();

}

if(isset($insertop)){
    if($insertop == 1){
        $statname = mysqli_real_escape_string($conn, $_POST['stat_name']);
        $sql = "INSERT INTO assetstat ( asset_stat_color , asset_stat_name ) VALUE ( '".$_POST['favcolor']."','".$statname."' )";
        if ($conn->query($sql) == TRUE) {
            insert_action("เพิ่มตัวเลือก สถานะครุภัณฑืใหม่ ".$statname.$_POST['favcolor']);
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    }
    if($insertop == 2){
        $tname = mysqli_real_escape_string($conn, $_POST['type_name']);
        $nname = mysqli_real_escape_string($conn, $_POST['noun_name']);
        $sql = "INSERT INTO assettype ( asset_type_name , noun ) VALUE ( '".$tname."' , '".$nname."')";
        if ($conn->query($sql) == TRUE) {
            insert_action("เพิ่มตัวเลือก ประเภทครุภัณฑ์ใหม่ ".$tname);
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    }
    if($insertop == 3){
        $dtname = mysqli_real_escape_string($conn, $_POST['dtype_name']);
        $sql = "INSERT INTO deploy_stat (  dstat ) VALUE ( '".$dtname."' )";
        if ($conn->query($sql) == TRUE) {
            insert_action("เพิ่มตัวเลือก ลักษณะการติดตั้งใหม่ ".$dtname);
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    }
    if($insertop == 4){
        $gmname = mysqli_real_escape_string($conn, $_POST['gm_name']);
        $sql = "INSERT INTO getmethod (  method ) VALUE ( '".$gmname."' )";
        if ($conn->query($sql) == TRUE) {
            insert_action("เพิ่มตัวเลือก วิธีการได้รับครุภัณฑ์ใหม่ ".$gmname);
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       
    }
    if($insertop == 5){
        $mtname = mysqli_real_escape_string($conn, $_POST['mt_name']);
        $sql = "INSERT INTO money_type ( money_type ) VALUE ('".$mtname."')";
        if($conn->query($sql) == TRUE){
            insert_action("เพิ่มตัวเลือก ประเภทเงินงบประมาณใหม่ ".$mtname);
            exit();

        }
        else{

            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    if($insertop == 6){
        $rpname = mysqli_real_escape_string($conn, $_POST['rp_name']);
        $rplname = mysqli_real_escape_string($conn, $_POST['rp_lname']);
        $sql = "INSERT INTO respon_per ( resper_firstname , resper_lastname ) VALUE ('".$rpname."' , '".$rplname."')";
        if($conn->query($sql) == TRUE){
            insert_action("เพิ่มตัวเลือก ผู้รับผิดชอบครุภัณฑ์ใหม่ ".$rpname." ".$rplname);
            exit();
        }
        else{

            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    if($insertop == 7){
        $rmname = mysqli_real_escape_string($conn, $_POST['rm_name']);
        $resid = $_POST['resid'];
        if($resid == 0){
            $resid = 48;
        }
        $sql = "INSERT INTO room (room,resper_IDs) VALUE ('".$rmname."',".$resid.")";
        if($conn->query($sql) == TRUE){
            insert_action("เพิ่มตัวเลือก ห้องที่จัดเก็บครุภัณฑ์ใหม่ ".$rmname);
            exit();


        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    if($insertop == 8){
        $vdname = mysqli_real_escape_string($conn, $_POST['vd_name']);
        $vdlo = mysqli_real_escape_string($conn, $_POST['vd_lo']);
        $vdtel = mysqli_real_escape_string($conn, $_POST['vd_tel']);
        $vdfax = mysqli_real_escape_string($conn, $_POST['vd_fax']);
        $sql = "INSERT INTO vendor (vendor_company , vendor_location , vendor_tel , fax) value ('".$vdname."' , '".$vdlo."' , '".$vdtel."' , '".$vdfax."')";
        if($conn->query($sql) == TRUE){
            insert_action("เพิ่มตัวเลือก บริษัทคู่ค้าใหม่ ".$vdname);
            exit();

        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;

        }
    }


   

}


if(isset($update)){
    $sql = "";
    if($update == 1){
        $sql = "UPDATE assetstat SET asset_stat_color = '".$_POST['favcolor']."' , asset_stat_name = '".$_POST['stat_name']."' WHERE asset_stat_ID = '".$_POST['id']."' ";
        $sqls = "SELECT * FROM assetstat WHERE asset_stat_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("แก้ไขตัวเลือก สถานะครุภัณฑ์ ".$row['asset_stat_name']." เป็น ".$_POST['stat_name']);
        }
        }
        
    }
    else if($update == 2){
        $sql = "UPDATE assettype SET asset_type_name = '".$_POST['type_name']."' , noun = '".$_POST['noun_name']."' WHERE asset_type_ID = '".$_POST['id']."'";
        $sqls = "SELECT * FROM assettype WHERE asset_type_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("แก้ไขตัวเลือก ประเภทครุภัณฑ์ ".$row['asset_type_name']." เป็น ".$_POST['type_name']);
        }
        }
    }
    else if($update == 3){
        $sql = "UPDATE deploy_stat SET  dstat  = '".$_POST['dtype_name']."' WHERE dstat_ID = '".$_POST['id']."'";
        $sqls = "SELECT * FROM deploy_stat WHERE dstat_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("แก้ไขตัวเลือก ลักษณะการติดตั้งครุภัณฑ์ ".$row['dstat']." เป็น ".$_POST['dtype_name']);
        }
        }
    }
    else if($update == 4){
        $sql = "UPDATE getmethod SET  method  = '".$_POST['gm_name']."' WHERE getMethod_ID = '".$_POST['id']."'";
        
    }
    else if($update == 5){
        $sql = "UPDATE money_type SET money_type = '".$_POST['mt_name']."' WHERE mid = '".$_POST['id']."' ";
    }
    else if($update == 6){
        $sql = "UPDATE respon_per SET resper_firstname = '".$_POST['rp_name']."' , resper_lastname  = '".$_POST['rp_lname']."' WHERE resper_ID = '".$_POST['id']."'";
        $sqls = "SELECT * FROM respon_per WHERE resper_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("แก้ไขตัวเลือก ผู้รับผิดชอบ ".$row['resper_firstname']." ".$row['resper_lastname']." เป็น ".$_POST['rp_name']." ".$_POST['rp_lname']);
        }
        }
    }
    else if($update == 7){
        $sql = "UPDATE room SET room = '".$_POST['rm_name']."' , resper_IDs = '".$_POST['resid']."' WHERE room_ID = '".$_POST['id']."'";
        $sqls = "SELECT * FROM room WHERE room_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("แก้ไขตัวเลือก ห้องที่จัดเก็บ ".$row['room']." เป็น ".$_POST['rm_name']);
        }
        }
        
    }
    else if($update == 8){
        $sql = "UPDATE vendor SET vendor_company  = '".$_POST['vd_name']."', vendor_location = '".$_POST['vd_lo']."' , vendor_tel  = '".$_POST['vd_tel']."', fax = '".$_POST['vd_fax']."'  WHERE vendor_ID = '".$_POST['id']."'";
        $sqls = "SELECT * FROM vendor WHERE vendor_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("แก้ไขตัวเลือก คู่ค้า ".$row['vd_name']);
        }
        }
    }

    if($conn->query($sql) == TRUE){
        exit();
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}


if(isset($del)){
    $sql = "";
    $sqlq = "";
    if($del == 1){
        $sql = "DELETE FROM assetstat WHERE asset_stat_ID = '".$_POST['id']."'";
        $sqls = "SELECT * FROM assetstat WHERE asset_stat_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("ลบตัวเลือก สถานะครุภัณฑ์ ".$row['asset_stat_name']);
        }
        }
        $sqlq = "UPDATE asset_stat_overview SET asset_stat_ID = '15' WHERE asset_stat_ID = '".$_POST['id']."'";
    }
    else if($del == 2){
        $sqlq = "UPDATE asset SET asset_type_ID = '23' WHERE asset_type_ID = '".$_POST['id']."'";
        $sqls = "SELECT * FROM assettype WHERE asset_type_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("ลบตัวเลือก ประเภทครุภัณฑ์ ".$row['asset_type_name']);
        }
        }
        $sql = "DELETE FROM assettype WHERE asset_type_ID = '".$_POST['id']."'";
    }
    else if($del == 3){
        $sqlq = "UPDATE asset SET dstat_ID = '12' WHERE dstat_ID = '".$_POST['id']."' ";
        $sqls = "SELECT * FROM deploy_stat WHERE dstat_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("ลบตัวเลือก ลักษณะการติดตั้งครุภัณฑ์ ".$row['dstat']);
        }
        }
        $sql = "DELETE FROM deploy_stat WHERE dstat_ID = '".$_POST['id']."'";
    }
    else if($del == 4){
        
        $sql = "DELETE FROM getmethod WHERE getMethod_ID = '".$_POST['id']."'";
    }
    else if($del == 5){

        $sql = "DELETE FROM money_type WHERE mid = '".$_POST['id']."'";
    }
    else if($del == 6){
        $sqlq = "UPDATE asset SET resper_ID = '48' WHERE resper_ID = '".$_POST['id']."' ";
        $sqls = "SELECT * FROM respon_per WHERE resper_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("ลบตัวเลือก ผู้รับผิดชอบ ".$row['resper_firstname']." ".$row['resper_lastname']);
        }
        }
        $sql = "DELETE FROM respon_per WHERE resper_ID = '".$_POST['id']."'";
    }
    else if($del == 7){
        $sqlq = "UPDATE asset SET room_ID = '64' WHERE room_ID = '".$_POST['id']."' ";
        $sqls = "SELECT * FROM room WHERE room_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("ลบตัวเลือก ห้องที่จัดเก็บ ".$row['room']);
        }
        }
        $sql = "DELETE FROM room WHERE room_ID = '".$_POST['id']."'";
    }
    else if($del == 8){
        $sqlq = "UPDATE asset SET vendor_ID = '49' WHERE vendor_ID = '".$_POST['id']."'";
        $sqls = "SELECT * FROM vendor WHERE vendor_ID = '".$_POST['id']."'";
        $result = $conn->query($sqls);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            insert_action("ลบตัวเลือก คู่ค้า ".$row['vd_name']);
        }
        }
        $sql = "DELETE FROM vendor WHERE vendor_ID = '".$_POST['id']."'";
    }
    if(!empty($sqlq)){
            if($conn->query($sqlq) == TRUE){
           
        }
        else{
            echo "Error: " . $sqlq . "<br>" . $conn->error;
        }
    }
    if($conn->query($sql) == TRUE){
        exit();
        
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>