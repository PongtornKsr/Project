
<!DOCTYPE html>
<html><?php SESSION_START(); require 'connect.php';  ?>
 <head>
 <title>Multi-insert</title>  
            
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           <link rel="stylesheet" href="CSS/formstyle.css">
 </head>
 <body> 
 <?php require 'nav.php'; ?>
  <br />
  <div class="container">
   <h3 align="center">เพิ่มครุภัณฑ์ชุด</h3>
   <br />
   <h4 align="center">Enter Item Details</h4>
   <br />
   <form class = "whitebox" action= "multi_insert.php" name="add_detail" id="add_detail" method = "POST" >  
                          <div class="table-responsive">  
                               <table class="table table-borderless"  id="dynamic_field">  
                                    <tr>  
                                         <td>
                                         <input type="hidden" name="num[]" value="A">
                                         <table Align = "center">
            <tr>
                <td>
                    รายการที่ :
                </td>
                <td>
                    <input type="text" name = "order_number[]" width="50">
                </td>
            </tr>
            <tr>
                <td>
                    วันที่:
                </td>
                <td>
                    <input type="date" name = "addin_date[]" width="50">
                </td>
            </tr>
            <tr>
                <td>
                    ประเภทของครุภัณ์: 
                </td>
                <td>    
                <?php 
                echo "<input type='radio' name='atype0' value='1'><select name = 'assettype[]'>
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
                <td><input type="radio" name="atype0" value="2">
                 
                    <input type="text" name = "type[]" width="50">
                </td>
                </tr>
                <tr>
                <td>
                    ลักษณะการติดตั้ง: 
                </td>
                <td>    
                <?php 
                echo "<input type='radio' name='dtype0' value='1'><select name = 'dstat_ID'>
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
                <td><input type="radio" name="dtype0" value="2">
                 
                    <input type="text" name = "detype[]" width="50">
                </td>
                </tr>
            <tr>
                <td>
                    รหัสครุภัณฑ์: 
                </td>
                <td>    
                    <input type="text" name="asset_ID[]">/<input type="text" name="asset_Set[]"><input type="text" name="assetid[]">
                </td>
            </tr>
            <tr>
                <td>
                    จำนวน: 
                </td>
                <td>    
                    <input type="text" name="quantity[]">
                </td>
            </tr>
            <tr>
                <td>
                    ชื่อชุดครุภัณฑ์:
                </td>
                <td>
                    <input type="text" name = "asset_setname[]" width="50">
                </td>
            </tr>
            <tr>
                <td>
                    ชื่อครุภัณฑ์:
                </td>
                <td>
                    <input type="text" name = "asset_name[]" width="50">
                </td>
            </tr>
            <tr>
                <td>
                    ชื่อเรียกครุภัณฑ์:
                </td>
                <td>
                    <input type="text" name = "asset_nickname[]" width="50">
                </td>
            </tr>
            <tr>
                <td>
                   ลักษณะ/คุณลักษณะ:
                </td>
                <td>
                    <input type="text" name = "property[]" width="50">
                </td>
            </tr>
            <tr>
                <td>
                   รุ่น/แบบ:
                </td>
                <td>
                    <input type="text" name = "model[]" width="50">
                </td>
            </tr>
            <tr>
                <td>
                   หมายเลขทะเบียน :
                </td>
                <td>
                    <input type="text" name = "asset_order[]" width="50">
                </td>
            </tr>
            <tr>
                <td>
                   สถานที่ตั้ง / หน่วยงานที่รับผิดชอบ:
                </td>
                <td>
                <?php 
                echo "<input type='radio' name='aslo0' value='1'><select name = 'assetloca[]'>
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
                <td><input type="radio" name="aslo0" value="2">
                    <input type="text" name = "asloc[]" width="50">
                </td>
                </tr>
                <tr>
                <td>
                   ผู้รับผิดชอบ :
                </td>
                <td>
                <?php 
                echo "<input type='radio' name='res0' value='1'><select name = 'resid[]'>
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
                <td><input type="radio" name="res0" value="2">
                    ชื่อ: <input type="text" name = "resfname[]" width="50">
                    นามสกุล: <input type="text" name = "reslname[]" width="50">
                </td>
                </tr>
                <tr>
                <td>
                   ห้องที่จัดเก็บ :
                </td>
                <td>
                <?php 
                echo "<input type='radio' name='rm0' value='1'><select name = 'rmid[]'>
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
                <td><input type="radio" name="rm0" value="2">
                    ห้อง: <input type="text" name = "rmname[]" width="50">
                </td>
                </tr>
                <tr>
                <td>
                   ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริการ:
                </td>
                <td>
                <?php 
                echo "<input type='radio' name='voption0' value='1'><select name = 'asven[]'>
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
                <td><input type="radio" name="voption0" value="2">
                ชื่อบริษัท :
                    <input type="text" name = "vendor_company[]" width="50">
                </td>
                </tr>
                <tr>
                <td></td><td>ที่อยู่บริษัท :
                    <input type="text" name = "vendor_location[]" width="50">
                </td></tr>
                <tr>
                <td></td><td>โทรศัพท์ :
                    <input type="text" name = "vendor_tel[]" width="50">
                </td></tr>
                <tr>
                <td></td><td>โทรสาร :
                    <input type="text" name = "fax[]" width="50">
                </td></tr>
                <tr>
                <td>วิธีการได้มา : </td><td> 
                <select name = "getmet[]"><option value="0">---วิธีได้รับ---</option> 
                <?php
                /*
                $sql = "SELECT * FROM getmethod ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row['getMethod_ID'] == 2){echo "<input type='radio' name='gmet0' value=".$row['getMethod_ID'].">".$row['method']."รายได้ปี <input type='text' name = 'year[]' width='50'>";}
                        else if ($row['getMethod_ID'] == 9) {echo "<input type='radio' name='gmet0' value=".$row['getMethod_ID'].">".$row['method']."<input type='text' name = 'els[]' width='50'>";}
                        else {
                    echo "<input type='radio' name='gmet0' value=".$row['getMethod_ID'].">".$row['method'];
                    }}     } */ 
                    $sql = "SELECT * FROM getmethod";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						echo '<option value="'.$row["getMethod_ID"].'">'.$row["method"].'</option>';
                    }     }

                    ?>
                </select>
            รายได้ปี: <input type="text" placeholder="เงินนอกงบประมาณ"> อื่นๆ: <input type="text" name="els[]" placeholder="วิธีการอื่นๆที่ได้รับมา">
                </td><td>
                
                </td></tr>
            <tr>
                <td>
                    ราคาต่อหน่วย: 
                </td>
                <td>    
                    <input type="text" name="price[]">
                </td>
            </tr>
            <tr>
                <td>
                    หมายเหตุ: 
                </td>
                <td>    
                    <input type="text" name="note[]">
                </td>
            </tr>
        </table>
                                         </td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
                                    </tr>  
                               </table>  
                               <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                     </form>  
  </div>
 </body>
</html>
<?php
//index.php

function select_atype()
{ 
	require 'connect.php';
 $output = '';
 $query = "SELECT * FROM assettype ";
 $sql = "SELECT * FROM assettype ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$output .= '<option value="'.$row["asset_type_ID"].'">'.$row["asset_type_name"].'</option>';
                    }     }

 return $output;
}

function select_dtype()
{ 
	require 'connect.php';
 $output = '';
 $sql = "SELECT * FROM deploy_stat ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$output .= '<option value="'.$row["dstat_ID"].'">'.$row["dstat"].'</option>';
                    }     }

 return $output;
}

function select_location()
{ 
	require 'connect.php';
 $output = '';
 $sql = "SELECT * FROM asset_location";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$output .= '<option value="'.$row["asset_location_ID"].'">'.$row["asset_location"].'</option>';
                    }     }

 return $output;
}

function select_responper()
{ 
	require 'connect.php';
 $output = '';
 $sql = "SELECT * FROM respon_per";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$output .= '<option value="'.$row["resper_ID"].'">'.$row["resper_firstname"].$row["resper_lastname"].'</option>';
                    }     }

 return $output;
}

function select_room()
{ 
	require 'connect.php';
 $output = '';
 $sql = "SELECT * FROM room";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$output .= '<option value="'.$row["room_ID"].'">'.$row["room"].'</option>';
                    }     }

 return $output;
}
function select_vendor()
{ 
	require 'connect.php';
 $output = '';
 $sql = "SELECT * FROM vendor";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$output .= '<option value="'.$row["vendor_ID"].'">'.$row["vendor_company"].'</option>';
                    }     }

 return $output;
}

function select_getmethod()
{ 
    require 'connect.php';
 $output = '';
 
/* $sql = "SELECT * FROM getmethod";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $u = $i;
						if($row['getMethod_ID'] == 2){ $output .= '<input type="radio" name="gmet'.$u.'" value"'.$row["getMethod_ID"].'">'.$row["method"].'รายได้ปี <input type="text" name = "year[]" width="50">';}
                        else if($row['getMethod_ID'] == 9){ $output .= '<input type="radio" name="gmet'.$u.'" value"'.$row["getMethod_ID"].'">'.$row["method"].'รายได้ปี <input type="text" name = "els[]" width="50">'; }
                        else{ $output .=''; }
                        $output .= '<input type="radio" name="gmet'.$u.'" value="'.$row["getMethod_ID"].'">'.$row["method"];
                    }     }
                    $i+=1;
                    */
                
                    $sql = "SELECT * FROM getmethod";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$output .= '<option value="'.$row["getMethod_ID"].'">'.$row["method"].'</option>';
                    }     }
 return $output;
}


?>
<script>
$(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           var html = '';
  html += '<input type="hidden" name="num[]" value="">';
  html += '<table Align = "center">';
  html += '<tr><td> รายการที่ :</td><td><input type="text" name = "order_number[]" width="50"> </td></tr> <tr><td>วันที่:</td><td><input type="date" name = "addin_date[]" width="50"></td></tr> <tr> <td>ประเภทของครุภัณ์: </td><td> <input type="radio" name="atype'+i+'" value="1"><select name = "assettype[]"><option value="0">---ประเภทของครุภัณฑ์---</option> <?php echo select_atype(); ?> </select>'; 
  html += '</td></tr><tr> <td></td><td><input type="radio" name="atype'+i+'" value="2"><input type="text" name = "type[]" width="50"> </td></tr><tr><td>ลักษณะการติดตั้ง: </td><td> <input type="radio" name="dtype'+i+'" value="1"><select name = "dstat_ID[]"><option value="0">---ลักษณะการติดตั้ง---</option><?php echo select_dtype();  ?> </select>'; 
  html += '</td></tr><tr><td></td><td><input type="radio" name="dtype'+i+'" value="2"><input type="text" name = "detype[]" width="50"></td></tr><tr><td>รหัสครุภัณฑ์: </td><td><input type="text" name="asset_ID[]">/<input type="text" name="asset_Set[]"><input type="text" name="assetid[]"></td></tr><tr><td>จำนวน: </td><td> <input type="text" name="quantity[]"></td></tr><tr><td>ชื่อชุดครุภัณฑ์:</td><td><input type="text" name = "asset_setname[]" width="50"></td></tr>';
  html += '<tr><td>ชื่อครุภัณฑ์:</td><td><input type="text" name = "asset_name[]" width="50"></td></tr><tr><td>ชื่อเรียกครุภัณฑ์:</td><td><input type="text" name = "asset_nickname[]" width="50"></td></tr><tr><td>ลักษณะ/คุณลักษณะ:</td><td><input type="text" name = "property[]" width="50"></td></tr><tr><td>รุ่น/แบบ:</td><td><input type="text" name = "model[]" width="50"></td></tr>';
  html += '<tr><td>หมายเลขทะเบียน :</td><td><input type="text" name = "asset_order[]" width="50"></td></tr><tr><td>สถานที่ตั้ง / หน่วยงานที่รับผิดชอบ:</td><td><input type="radio" name="aslo'+i+'" value="1"><select name = "assetloca[]"><option value="0">---หน่วยงาน/สถานที่ตั้ง---</option><?php echo select_location(); ?></select>';
  html += '</td></tr><tr> <td></td><td><input type="radio" name="aslo'+i+'" value="2"><input type="text" name = "asloc[]" width="50"></td></tr><tr><td>ผู้รับผิดชอบ :</td><td><input type="radio" name="res'+i+'" value="1"><select name = "resid[]"><option value="0">---ผู้รับผิดชอบ---</option><?php echo select_responper(); ?></select>';
  html += '</td></tr><tr> <td></td><td><input type="radio" name="res'+i+'" value="2">ชื่อ: <input type="text" name = "resfname[]" width="50">นามสกุล: <input type="text" name = "reslname[]" width="50"></td></tr><tr><td>ห้องที่จัดเก็บ :</td><td><input type="radio" name="rm'+i+'" value="1"><select name = "rmid[]"><option value="0">---ห้องที่จัดเก็บ---</option><?php echo select_room(); ?></select>';
  html += '</td></tr><tr> <td></td><td><input type="radio" name="rm'+i+'" value="2">ห้อง: <input type="text" name = "rmname[]" width="50"></td></tr><tr><td>ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริการ:</td><td><input type="radio" name="voption'+i+'" value="1"><select name = "asven[]"><option value="0">---บริษัท---</option><?php echo select_vendor(); ?></select>';
  html += '</td></tr><tr> <td></td><td><input type="radio" name="voption'+i+'" value="2">ชื่อบริษัท :<input type="text" name = "vendor_company[]" width="50"></td></tr><tr><td></td><td>ที่อยู่บริษัท :<input type="text" name = "vendor_location[]" width="50"></td></tr>';
  html += '<tr><td></td><td>โทรศัพท์ :<input type="text" name = "vendor_tel[]" width="50"></td></tr><tr><td></td><td>โทรสาร :<input type="text" name = "fax[]" width="50"></td></tr>';
  html += '<tr><td>วิธีการได้มา : </td><td><select name = "getmet[]"><option value="0">---วิธีได้รับ---</option> <?php echo select_getmethod();  ?></select>รายได้ปี: <input type="text" placeholder="เงินนอกงบประมาณ"> อื่นๆ: <input type="text" name="els[]" placeholder="วิธีการอื่นๆที่ได้รับมา"></td></tr><tr><td>ราคาต่อหน่วย: </td><td>    <input type="text" name="price[]"></td></tr>';
  html += '<tr><td>หมายเหตุ: </td><td><input type="text" name="note[]"></td></tr></table>';
  //html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
           $('#dynamic_field').append('<tr id="row'+i+'"><td>'+html+'</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();
      });

 


 
});

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>