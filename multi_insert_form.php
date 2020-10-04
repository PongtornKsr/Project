
<!DOCTYPE html>
<html><?php SESSION_START(); require 'connect.php';  ?>
 <head>
 <title>CS_Asset</title> 
            
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           <link rel="stylesheet" href="CSS/formstyle.css">
           <link rel="stylesheet" href="CSS/BG.css">
           <link rel="stylesheet" href="CSS/navbar.css">
           
    <style>
    
    #treport_td{ border: 1px solid black;}
    #treport_tds{ 
        border: 1px solid black;
       
                    border-top: none;
    }
    
    input[type=text]{
        width: 100%
    }
    select{
        width:50%;
        text-align-last: center;
    }
    
    </style>

 </head>
 <body> 
 <?php require 'nav.php'; ?>
  <br />
  <div class="container-fluid" style="width:65%">
   <h3 align="center">เพิ่มครุภัณฑ์ชุด</h3>
   <br />
   <h4 align="center">Enter Item Details</h4>
   <br />
   <form class = "whitebox" action= "multi_insert.php" name="add_detail" id="add_detail" method = "POST" style="width:100%" >
   <br>
   <br>  
                          <div class="table-responsive"style="width:100%">  
                               <table class="table table-borderless"  id="dynamic_field" style="width:100%;">  
                                    <tr id = "0t">  
                                         <td style="width:90%">
                                         
                                         <input type="hidden" name="num[]">
<table Align = "center" style="width:80%">
            <tr>
                <td>
                    รายการที่ :
                </td>
                <td>
                    <input type="text" name = "on[]" width="50" required>
                </td>
            </tr>
            <tr>
                <td>
                    วันที่:
                </td>
                <td>
                    <input type="date" style ="width: 100%" id= "datepick" class = "datepick" name = "addin_date[]" width="50" required>
                </td>
            </tr>
            <tr>
                <td>
                    ประเภทของครุภัณฑ์: 
                </td>
                <td id = "kk">    
                <?php 
                echo "<select id = '1' name = 'assettype[]'>
                <option value='0'>---ประเภทของครุภัณฑ์---</option>";
                    $sql = "SELECT * FROM assettype ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['asset_type_ID'].">".$row['asset_type_name']."</option>";
                    }     }
               echo  "</select>";

                ?><br>
                  เพิ่มประเภทครุภัณฑ์ใหม่: <input type="text" id = "2"width="50" name = "type[]" required>
                </td>
            </tr>
           
                <tr>
                <td>
                    ลักษณะการติดตั้ง: 
                </td>
                <td id = "kk">    
                <?php 
                echo "<select name = 'dstat_ID[]' id = '3'>
                <option value='0'>---ลักษณะการติดตั้ง---</option>";
                    $sql = "SELECT * FROM deploy_stat ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['dstat_ID'].">".$row['dstat']."</option>";
                    }     }
               echo  "</select>";
                ?><br>
                เพิ่มลักษณะการติดตั้งใหม่: <input type="text" id ="4" name = "dtype[]"required width="50">
                </td>
            </tr>
            <tr>
                <td>
                    ครุภัณฑ์
                </td>
                <td>
                    <select name="setof[]" id="so">
                        <option value="more">ครุภัณฑ์แบบชุด</option>
                        <option value="one">ครุภัณฑ์แบบเดี่ยว</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    การรันเลขรหัสครุภัณฑ์
                </td>
                <td>
                    <select readonly name="runnumber[]" id="rn">
                        <option value="defaultex">ไล่ลำดับหมายเลขครุภัณฑ์</option>
                        <option value="notdefaultex">ไม่ไล่ลำดับหมายเลขครุภัณฑ์</option>
                    </select>
                </td>
            </tr>
             <tr>
                <td>
                    จำนวน:
                </td>
                <td>    
                    <input type="text" name="quantity[]"required id= "idq" ><span style="float:right;"  class = "idx"></span>
                </td>
            </tr>
            <tr>
                <td>
                    รหัสครุภัณฑ์เริ่มต้น: <input type="hidden" name="iforc" id = "iforc" value = "1">
                </td>
                <td id ="keyy">    
                    <input type="text" style ="width:40%"name="asset_ID[]"required id = "ida" class = "">/<input style="width:10%" type="text" name="asset_Set[]"required id = "idb" class = ""><input style="width:10%" type="text" name="assetid[]" id= "idc" class = "">
                    
                </td>
            </tr>
           
            <tr>
                <td>
                    ชื่อชุดครุภัณฑ์:
                </td>
                <td>
                    <input type="text" name = "asset_setname[]"required width="50">
                </td>
            </tr>
            <tr>
                <td>
                    ชื่อครุภัณฑ์:
                </td>
                <td>
                    <input type="text" name = "asset_name[]"required width="50">
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
                
                    <input type="text" value="คณะวิทยาศาสตร์และเทคโนโลยี" name = "assetloca[]" disabled>
                </td>
                </tr>
               
                <tr>
                <td>
                   ผู้รับผิดชอบ :
                </td>
                <td id = "kk">
                <?php 
                echo "<select name = 'resid[]' id ='5'>
                <option value='0'>---ผู้รับผิดชอบ---</option>";
                    $sql = "SELECT * FROM respon_per ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['resper_ID'].">".$row['resper_firstname'].$row['resper_lastname']."</option>";
                    }     }
               echo  "</select>";
                ?> <br> ชื่อ:<input type="text" name = "resfname[]"required id ="6" width="50">
                นามสกุล:<input type="text" name = "reslname[]"required id = "6" width="50">
                </td>
                </tr>
               
                <tr>
                <td>
                   ห้องที่จัดเก็บ :
                </td>
                <td id = "kk">
                <?php 
                echo "<select name = 'rmid[]' id='7'>
                <option value='0'>---ห้องที่จัดเก็บ---</option>";
                    $sql = "SELECT * FROM room ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['room_ID'].">".$row['room']."</option>";
                    }     }
               echo  "</select>";
                ?><br>
                ห้อง: <input type="text" name = "rmname[]"required id="8" width="50">
                </td>
                </tr>
                <tr>
                <td>
                   ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริการ:
                </td>
                <td id = "kk">
                <?php 
                echo "<select name = 'asven[]' id = '9'>
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
                <td  id = "kk">
                ชื่อบริษัท :
                    <input type="text" name = "vendor_company[]" id ="10" width="50">
                </td>
                </tr>
                <tr>
                <td></td><td  id = "kk">ที่อยู่บริษัท :
                    <input type="text" name = "vendor_location[]" id ="10" width="50">
                </td></tr>
                <tr>
                <td></td><td  id = "kk">โทรศัพท์ :
                    <input type="text" name = "vendor_tel[]" id ="10" width="50">
                </td></tr>
                <tr>
                <td></td><td  id = "kk">โทรสาร :
                    <input type="text" name = "fax[]" id ="10" width="50">
                </td></tr>
                <tr>
                <td>วิธีการได้มา : </td>
                <td> 
                <select name="get[]" id = "gmt">
                <option value="0">---ประเภทเงิน---</option> 
                <?php 
                $sql = "SELECT * FROM money_type";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row["mid"].'">'.$row["money_type"].'</option>';
                }     }

                ?>
                </select>
                <!--
                <input type="radio" id="ft" name="get[]" value="1">
                <label>เงินงบประมาณ(งปม.)</label>
                <input type="radio" id="sd" name="get[]" value="2">
                <label>เงินนอกงบประมาณ</label>
                <input type="radio" id="trd" name="get[]" value="3">
                <label>เงินบริจาค/เงินช่วยเหลือ</label>
                <input type="radio" id="frt" name="get[]" value="4">
                <label>อื่นๆ</label> -->
                <br>

                <select name = "getmet[]" ><option value="0">---วิธีได้รับ---</option> 
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
                    $sql = "SELECT * FROM getmethod WHERE getMethod_ID NOT IN ('1', '2', '3','9');";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						echo '<option value="'.$row["getMethod_ID"].'">'.$row["method"].'</option>';
                    }     }

                    ?>
                </select>
                <br>รายได้ปี: <input type="text" id = "incomeyrd" name = "incomeyrd[]"placeholder="เงินนอกงบประมาณ" disabled> อื่นๆ: <input type="text" id = "els" name="els[]" placeholder="default:อื่นๆ" disabled>
                </td><td>
                
                </td></tr>
            <tr>
                <td>
                    ราคาต่อหน่วย: 
                </td>
                <td>    
                    <input type="text" name="price[]"required >
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
                    <td Align="center"><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                    </tr>
                    <tr id = "0t" > 
                        <td class = "container-fluid" colspan="2">
                        <div height = "200px">
                                    <table height = "200px" >
                               <thead height = "200px">
                               <tr  id ="treport_tr" style ="height:50px">
                                    <td id = "treport_td" rowspan="2">
                                        <div>วัน/เดือน/ปี</div>
                                    </td>
                                    <td id ="treport_td" rowspan="2">
                                        <div>ที่เอกสาร</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>รายการ</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>จำนวนหน่วย</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>ราคาต่อ หน่วย/ชุด/กลุ่ม</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>มูลค่ารวม</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>อายุการใช้งาน</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>อัตรค่าเสื่อมราคา(%)</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>ค่าเสื่อมราคาประจำปี</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>ค่าเสื่อมราคาสะสม</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>มูลค่าสุทธิ</div>
                                    </td>
                                    <td id = "treport_td" colspan="2">
                                        <div>รายการเปลี่ยนแปลงการเคลื่อนย้ายสถานภาพ</div>
                                    </td>
                               </tr>
                               <tr style ="height:50px">
                                 <td id = "treport_td" style ="height:50px"><div>รายการเปลี่ยน</div> </td>
                                 <td id = "treport_td" style ="height:50px"><div>รายการเลขที่เอกสาร</div> </td>
                               </tr>
                               </thead>
                               <tbody id = "tbody1">
                                <tr id = "report_ta">
                                  <td id = "treport_td" ><input name = "report_date1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "report_NO1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "report_order1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "unit1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "price_per_unit1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "summary1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "life_time1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "Depreciation_rate1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "year_Depreciation1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "sum_Depreciation1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "net_value1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "Change_order1[]" style ="width:100%;" type = "text"></td>
                                  <td id = "treport_td" ><input name = "report_number1[]"style ="width:100%;" type = "text"></td>
                                 </tr>
                               </tbody>
                               </table>
                               <div id ="bam1"style = "float:right;"><input type = "hidden" value = "1" id = "asita" name ="asita"><button style = "width:50%"  type="button" id = "minus" class="btn btn-danger">-</button><button style = "width:50%" type="button" id = "plus" class="btn btn-success">+</button>
                               <input type = "hidden" id = "count_re1" name ="count_re1"></div>
                                </div>
                                </td>
                                
                                </tr>
                            
                        </table> 
                                    
                               
                                    
                                
                               
                               
                               
                               <br>
                               
                               <center><input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit"/> </center> 
                          </div>  
                     </form>  
  </div>
 </body><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
<script>

$(document).ready(function(){  
    
    var array = [1,2,3,4,5,6,7,8,9,10];
    var keystone = [0];
    var num = 0;
      var i=1;  
      var asi = 1;
      function checknum() {
        return num;
        }

        function check() {
        if(array.find(checknum) >= 0){
            return 1;
        }
        else{ return 0; }
        
        }
      $('#add').click(function(){  
             asi +=1;
           for(var di = 1 ; di <= 10 ; di ++){
     	var q = false;
        var w = false;
		var numa = 0;
        var numb = 0;
        do {
  		numa = Math.round(Math.random() * 1000);
        numb =numa + 1;
        num = numa;
        if(check() == 0){
        	q = true;
            num = numb;
            if(check() == 0){
            w = true;
            
            }else{w = false;
            numa = Math.round(Math.random() * 1000);
        	numb =numa + 1;
            }
        }else{ q = false; 
        numa = Math.round(Math.random() * 1000);
        numb =numa + 1;}
        }while(q == false && w == false)
        array.push(numa);
        array.push(numb);
            }
           keystone.push(0);
           var html = '';
  html += '<input type="hidden" name="num[]" >';
  html += '<hr width=80% size=3 style="color:black">';
  html += '<table Align = "center" style="width:80%">';
  html += '<tr><td> รายการที่ :</td><td><input type="text" name = "on[]" width="50" required> </td></tr> <tr><td>วันที่:</td><td><input type="date" id = "datepick" class ="datepick" name = "addin_date[]" width="50" required></td></tr> <tr> <td>ประเภทของครุภัณ์: </td><td id ="kk"> <select name = "assettype[]" id = "'+array[array.length - 10]+'"><option value="0">---ประเภทของครุภัณฑ์---</option> <?php echo select_atype(); ?> </select> <br>เพิ่มประเภทครุภัณฑ์ใหม่: <input type="text" id = "'+array[array.length - 9]+'" name = "type[]"required width="50">'; 
  html += '</td></tr><tr><td>ลักษณะการติดตั้ง: </td><td id ="kk"> <select name = "dstat_ID[]" id ="'+array[array.length - 8]+'"><option value="0">---ลักษณะการติดตั้ง---</option><?php echo select_dtype();  ?> </select> <br>เพิ่มลักษณะการติดตั้งใหม่: <input type="text" id ="'+array[array.length - 7]+'" name = "dtype[]"required width="50">'; 
  html += '<tr><td>ครุภัณฑ์</td><td><select name="setof[]" id="so"><option value="more">ครุภัณฑ์แบบชุด</option><option value="one">ครุภัณฑ์แบบเดี่ยว</option></select></td></tr><tr><td>การรันเลขรหัสครุภัณฑ์:</td><td><select readonly name="runnumber[]" id="rn"><option value="defaultex">ไล่ลำดับหมายเลขครุภัณฑ์</option><option value="notdefaultex">ไม่ไล่ลำดับหมายเลขครุภัณฑ์</option></select></td></tr><tr><td>จำนวน: </td><td>    <input type="text" name="quantity[]"required id= "idq" ><span style="float:right;"  class = "idx"></span></td></tr><tr><td>รหัสครุภัณฑ์เริ่มต้น: <input type="hidden" name="iforc" id = "iforc" value = "'+(i+1)+'"></td><td id ="keyy"><input type="text" name="asset_ID[]"required style ="width:40%" id = "ida" class = "">/<input style ="width:10%" type="text" name="asset_Set[]"required id = "idb" class = ""><input style ="width:10%" type="text" name="assetid[]" id= "idc" class = ""></td></tr><tr><td>ชื่อชุดครุภัณฑ์:</td><td><input type="text" name = "asset_setname[]"required width="50"></td></tr>';
  html += '<tr><td>ชื่อครุภัณฑ์:</td><td><input type="text" name = "asset_name[]"required width="50"></td></tr><tr><td>ชื่อเรียกครุภัณฑ์:</td><td><input type="text" name = "asset_nickname[]" width="50"></td></tr><tr><td>ลักษณะ/คุณลักษณะ:</td><td><input type="text" name = "property[]" width="50"></td></tr><tr><td>รุ่น/แบบ:</td><td><input type="text" name = "model[]" width="50"></td></tr>';
  html += '<tr><td>หมายเลขทะเบียน :</td><td><input type="text" name = "asset_order[]" width="50"></td></tr><tr><td>สถานที่ตั้ง / หน่วยงานที่รับผิดชอบ:</td><td><input type="text" value="คณะวิทยาศาสตร์และเทคโนโลยี" name = "assetloca[]" disabled>';
  html += '</td></tr><tr><td>ผู้รับผิดชอบ :</td><td id ="kk"><select name = "resid[]" id="'+array[array.length - 6]+'"><option value="0">---ผู้รับผิดชอบ---</option><?php echo select_responper(); ?></select> <br>ชื่อ: <input type="text" name = "resfname[]"required id="'+array[array.length - 5]+'" width="50">นามสกุล: <input type="text" name = "reslname[]"required id ="'+array[array.length - 5]+'" width="50">';
  html += '</td></tr><tr><td>ห้องที่จัดเก็บ :</td><td id ="kk"><select name = "rmid[]" id ="'+array[array.length - 4]+'"><option value="0">---ห้องที่จัดเก็บ---</option><?php echo select_room(); ?></select> <br>ห้อง: <input type="text" name = "rmname[]"required id ="'+array[array.length -3]+'" width="50">';
  html += '</td></tr><tr><td>ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริการ:</td><td id ="kk"><select name = "asven[]" id = "'+array[array.length - 2]+'"><option value="0">---บริษัท---</option><?php echo select_vendor(); ?></select>';
  html += '</td></tr><tr> <td></td><td id ="kk">ชื่อบริษัท :<input type="text" name = "vendor_company[]" id = "'+array[array.length - 1]+'"width="50"></td></tr><tr><td></td><td id ="kk">ที่อยู่บริษัท :<input type="text" name = "vendor_location[]" id = "'+array[array.length - 1]+'" width="50"></td></tr>';
  html += '<tr><td></td><td id ="kk">โทรศัพท์ :<input type="text" name = "vendor_tel[]" id = "'+array[array.length - 1]+'" width="50"></td></tr><tr><td></td><td id ="kk">โทรสาร :<input type="text" name = "fax[]" id = "'+array[array.length - 1]+'" width="50"></td></tr>';
  html += '<tr><td>วิธีการได้มา : </td><td> <select name="get[]" id = "gmt"><option value="0">---ประเภทเงิน---</option><?php echo get_money_type(); ?></select><br><select name = "getmet[]"><option value="0">---วิธีได้รับ---</option> <?php echo select_getmethod();  ?></select><br>รายได้ปี: <input type="text" id = "incomeyrd" name = "incomeyrd[]"placeholder="เงินนอกงบประมาณ" disabled> อื่นๆ: <input type="text" id = "els" name="els[]" placeholder="default:อื่นๆ" disabled></td></tr><tr><td>ราคาต่อหน่วย: </td><td>    <input type="text" name="price[]"required ></td></tr>';
  html += '<tr><td>หมายเหตุ: </td><td><input type="text" name="note[]"></td></tr></table>';
  
  //html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
          
           var html2 = "";
           html2 += '<table id = "'+asi+'"><thead><tr id ="treport_tr"><td id = "treport_td" rowspan="2"><div>วัน/เดือน/ปี</div></td><td id ="treport_td" rowspan="2"><div>ที่เอกสาร</div></td><td id = "treport_td" rowspan="2"><div>รายการ</div></td>';
  html2 += '<td id = "treport_td" rowspan="2"> <div>จำนวนหน่วย</div></td><td id = "treport_td" rowspan="2"><div>ราคาต่อ หน่วย/ชุด/กลุ่ม</div></td><td id = "treport_td" rowspan="2"><div>มูลค่ารวม</div></td><td id = "treport_td" rowspan="2"><div>อายุการใช้งาน</div></td><td id = "treport_td" rowspan="2">';
  html2 += '<div>อัตรค่าเสื่อมราคา(%)</div></td><td id = "treport_td" rowspan="2"><div>ค่าเสื่อมราคาประจำปี</div></td><td id = "treport_td" rowspan="2"><div>ค่าเสื่อมราคาสะสม</div></td><td id = "treport_td" rowspan="2"><div>มูลค่าสุทธิ</div></td><td id = "treport_td" colspan="2"><div>รายการเปลี่ยนแปลงการเคลื่อนย้ายสถานภาพ</div>';
  html2 += '</td></tr><tr><td id = "treport_td"><div>รายการเปลี่ยน</div> </td><td id = "treport_td"><div>รายการเลขที่เอกสาร</div> </td></tr></thead>';
  html2 += '<tbody id = "tbody'+asi+'"><tr id = "report_ta"><td id = "treport_td" ><input name = "report_date'+asi+'[]" style ="width:100%;" type = "text"></td><td id = "treport_td" ><input name = "report_NO'+asi+'[]" style ="width:100%;" type = "text"></td><td id = "treport_td" ><input name = "report_order'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "unit'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "price_per_unit'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "summary'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "life_time'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "Depreciation_rate'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "year_Depreciation'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "sum_Depreciation'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "net_value'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "Change_order'+asi+'[]" style ="width:100%;" type = "text"></td>';
  html2 += '<td id = "treport_td" ><input name = "report_number'+asi+'[]"style ="width:100%;" type = "text"></td>';
  html2 += '</tr>';                             
  html2 += '</tbody>';
  html2 += '</table>';
  html2 += '<div id ="bam1" style = "float:right;"><input type = "hidden" value = "'+asi+'" id = "asita" name ="asita"><button style = "width:50%"  type="button" id = "minus" class="btn btn-danger">-</button><button style = "width:50%" type="button" id = "plus" class="btn btn-success">+</button><input type = "hidden" id = "count_re'+asi+'" name ="count_re'+asi+'"></div>';
  //$('#asi_report').append(html2);
  $('#dynamic_field').append('<tr id="'+i+'t"><td style="width:90%">'+html+'</td><td><button type="button" name="remove" id="'+i+'t" class="btn btn-danger btn_remove">X</button></td></tr><tr id="'+i+'tt" ><td class = "container-fluid" colspan="2"><div height = "200px">'+html2+'</div></td></tr>');  
           i++;
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");
           keystone.splice(button_id-1, 1);   
           $('#'+button_id+'').remove();
           $('#'+button_id+'t').remove();
           i--;
           asi--;
           
      });
      $(document).on('keyup','input[id=ida]' , function(){
        var asd =  $(this).parents().parents().siblings().children().children('select[id=so]').val();
        if(asd == "one"){


        }
        else if( asd == "more"){
            var run =  $(this).parents().parents().siblings().children().children('select[id=rn]').val();
            if(run == "defaultex"){ 
                
                var q = $(this).parents().parents().parents().parents().parents().parents().attr('id').replace(/t/, '');
        var ele = document.getElementsByClassName("idx");
        var a = $(this).val();
        var b = $(this).siblings('input[id=idb]').val();
        var c = $(this).siblings('input[id=idc]').val();
        var d = $(this).parents().parents().siblings().children().children('input[id=idq]').val();
        
        if(d == 1){
        	ele[q].innerHTML= a+"/"+b+".1 "+c;
        }
        else if(d > 1){
        	ele[q].innerHTML= a+"/"+b+".1 "+c+" - "+a+"/"+b+"."+d+" "+c;
        }
        else { ele[q].innerHTML= a+"/"+b+".1 "+c; }

        if(a == "" && b == "" && c == "" && d =="")
        {
        	ele[q].innerHTML= ""; 
        }
                
            }
            else if(run == "notdefaultex"){ }
        }
    	
        
        
       
        
    });
    $(document).on('keyup','input[id=idb]' , function(){
        var asd =  $(this).parents().parents().siblings().children().children('select[id=so]').val();
        if(asd == "one"){


        }
        else if( asd == "more"){
            var run =  $(this).parents().parents().siblings().children().children('select[id=rn]').val();
            if(run == "defaultex"){ 
               
                    var q = $(this).parents().parents().parents().parents().parents().parents().attr('id').replace(/t/, '');
        var ele = document.getElementsByClassName("idx");
        var a = $(this).siblings('input[id=ida]').val();
        var b = $(this).val();
        var c = $(this).siblings('input[id=idc]').val();
        var d = $(this).parents().parents().siblings().children().children('input[id=idq]').val();
        
        if(d == 1){
        	ele[q].innerHTML= a+"/"+b+".1 "+c;
        }
        else if(d > 1){
        	ele[q].innerHTML= a+"/"+b+".1 "+c+" - "+a+"/"+b+"."+d+" "+c;
        }
        else { ele[q].innerHTML= a+"/"+b+".1 "+c; }

        if(a == "" && b == "" && c == "" && d =="")
        {
        	ele[q].innerHTML= ""; 
        }
                

            }
            else if(run == "notdefault"){ }
        }
    	
        
    });
    $(document).on('keyup','input[id=idc]' , function(){
        var asd =  $(this).parents().parents().siblings().children().children('select[id=so]').val();
        if(asd == "one"){


        }
        else if( asd == "more"){
            var run =  $(this).parents().parents().siblings().children().children('select[id=rn]').val();
            if(run == "defaultex"){ 
               
        var q = $(this).parents().parents().parents().parents().parents().parents().attr('id').replace(/t/, '');
        var ele = document.getElementsByClassName("idx");
        var a = $(this).siblings('input[id=ida]').val();
        var b = $(this).siblings('input[id=idb]').val();
        var c = $(this).val();
        var d = $(this).parents().parents().siblings().children().children('input[id=idq]').val();
        
        if(d == 1){
        	ele[q].innerHTML= a+"/"+b+".1 "+c;
        }
        else if(d > 1){
        	ele[q].innerHTML= a+"/"+b+".1 "+c+" - "+a+"/"+b+"."+d+" "+c;
        }
        else { ele[q].innerHTML= a+"/"+b+".1 "+c; }

        if(a == "" && b == "" && c == "" && d =="")
        {
        	ele[q].innerHTML= ""; 
        }
            } 
        
            else if(run == "notdefaultex"){ }
        }
    	
        
    });
    $(document).on('keyup','input[id=idq]' , function(){
        var asd =  $(this).parents().parents().siblings().children().children('select[id=so]').val();
        var o = $(this).parents().parents().siblings().children().children('input[id=iforc]').val();
        if(asd == "one"){
            $(this).parents().parents().siblings().children('td[id=keyy]').html('');
            var idq = parseInt($(this).val());
            var htmlq = "";
            if(idq > 0){for(var ci = 0;ci<=idq-1;ci++){
                htmlq+='<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:10%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
            }
            
              $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);}
              else{ htmlq+= '<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:10%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = "">';
              $(this).parents().parents().siblings().children('td[id=keyy]').html('');
              $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);
            }
            

        }
        else if( asd == "more"){
            var run =  $(this).parents().parents().siblings().children().children('select[id=rn]').val();
            if(run == "defaultex"){ 
                
                var q = $(this).parents().parents().parents().parents().parents().parents().attr('id').replace(/t/, '');
        var ele = document.getElementsByClassName("idx");
        var a = $(this).parents().parents().siblings().children().children('input[id=ida]').val();
        var b = $(this).parents().parents().siblings().children().children('input[id=idb]').val();
        var c = $(this).parents().parents().siblings().children().children('input[id=idc]').val();
        var d = $(this).val();
        
            if(d == 1){
                if(a != "" && b!=""){
        	ele[q].innerHTML= a+"/"+b+".1 "+c;}
        }
        else if(d > 1){
            if(a != "" && b!=""){
        	ele[q].innerHTML= a+"/"+b+".1 "+c+" - "+a+"/"+b+"."+d+" "+c;}
        }
        else { if(a != "" && b!=""){ele[q].innerHTML= a+"/"+b+".1 "+c;} }

        if(a == "" && b == "" && c == "" && d =="")
        {
        	ele[q].innerHTML= ""; 
        }
    
         }
            else if(run == "notdefaultex"){ 
                var idq = parseInt($(this).val());
                var htmlq = "";
                $(this).parents().parents().siblings().children('td[id=keyy]').html('');
                if(idq > 0){
                    $(this).parents().parents().siblings().children('td[id=keyy]').html('');
                for(var ci = 0;ci<=idq-1;ci++){
                    if(ci == 0){
                         htmlq+='<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:20%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""> . <input style ="width:10%" type ="text" name= "asset_n'+o+'[]"required ><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
                    }else{
                        htmlq+='<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida" disabled class = "">/<input style ="width:20%" type="text" name="asset_Set'+o+'[]" id = "idb"disabled class = ""> . <input style ="width:10%" type ="text" name= "asset_n'+o+'[]"required ><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
                    }
                   
                }
                $(this).parents().parents().siblings().children('td[id=keyy]').html('');
                  $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);}
                  else{ htmlq+= '<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:20%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""> . <input style ="width:10%" type ="text" name= "asset_n'+o+'[]"required ><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = "">';
                  $(this).parents().parents().siblings().children('td[id=keyy]').html('');
                  $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);
                }
            }
        }
    	
        
    });
    var tra = [0];
    $(document).on('click','#plus',function(){
       var asita = $(this).siblings('input[id=asita]').val();
        keystone[asita-1]+=1;
        
        
        $("#count_re"+asita).val(keystone[asita-1]);
        
        //var ss = $(this).parent().parent().siblings().children().attr('rowspan');
        //var q = parseInt(ss);
        //var s = q+1;
        //$(this).parent().parent().siblings().children().attr('rowspan',s);
        var html = '';
        html +='<tr id = "'+asita+keystone[asita-1]+'s">';
        html += '<td id = "treport_tds" ><input name = "report_date'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "report_NO'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "report_order'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "unit'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "price_per_unit'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "summary'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "life_time'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "Depreciation_rate'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "year_Depreciation'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "sum_Depreciation'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "net_value'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "Change_order'+asita+'[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "report_number'+asita+'[]"style ="width:100%;" type = "text"></td>';
        html +='</tr>';
        $('#tbody'+asita).append(html);

    });
    $(document).on('click','#minus',function(){
        var asita = $(this).siblings('input[id=asita]').val();
        
        if(keystone[asita-1] == 0){ }
        else if(keystone[asita-1] > 0){
            
        $('#'+asita+keystone[asita-1]+'s').remove();
        
        keystone[asita-1] -= 1;
        $("#count_re"+asita).val(keystone[asita-1]);
        }
       
        /*var ss = $(this).parent().parent().siblings().children().attr('rowspan');
        var q = parseInt(ss);
        if(q <=1 ){ }
        else{
        var s = q-1;
        $(this).parent().parent().siblings().children().attr('rowspan',s);
        }*/
    });

      $(document).on('change' , '#kk select' ,function(){
   
   var id = parseInt($(this).attr('id'));
   var op = id + 1;
   var value = $('#'+id).val();
   $('#test').html(op);
   if(value !="0"){
       $(this).siblings('input').attr('disabled',true);
       $('[id='+op+']').slice().prop("disabled", true);
       $('[id='+op+']').slice().prop("required", false);
       $(this).siblings('input').attr('required',false);
   }
   else{ $(this).siblings('input').attr('disabled',false);
    $(this).siblings('input').attr('required',true);
    $('[id='+op+']').slice().prop("disabled", false);
    $('[id='+op+']').slice().prop("required", true);
}

});
$(document).on('keyup' , '#kk input' ,function(){
      var value = $(this).val();
   var id = parseInt($(this).attr('id')) - 1;
   if(value != ""){
       $('#'+id).attr('disabled',true);
   }
   else{
       $('#'+id).attr('disabled',false);
   }

});
$(document).on('blur' , '#kk input' ,function(){
      var value = $(this).val();
   var id = parseInt($(this).attr('id')) - 1;
   if(value != ""){
       $('#'+id).attr('disabled',true);
   }
   else{
       $('#'+id).attr('disabled',false);
   }

});
$(document).on('change' , 'input[type=radio]',function(){
    var value =$(this).attr('id');
    if(value == "frt"){
        $(this).siblings('input[id=els]').attr('disabled',false);
        $(this).siblings('input[id=incomeyrd]').attr('disabled',true);
    }else if (value == "sd"){
        $(this).siblings('input[id=incomeyrd]').attr('disabled',false);
        $(this).siblings('input[id=els]').attr('disabled',true);

    }
    else{
        $(this).siblings('input[id=incomeyrd]').attr('disabled',true);
        $(this).siblings('input[id=els]').attr('disabled',true);
    }
});

$(document).on('change' , '#gmt', function(){
    var value =$(this).val();
    if(value == 4){
        $(this).siblings('input[id=els]').attr('disabled',false);
        $(this).siblings('input[id=incomeyrd]').attr('disabled',true);
    }else if (value == 2){
        $(this).siblings('input[id=incomeyrd]').attr('disabled',false);
        $(this).siblings('input[id=els]').attr('disabled',true);

    }
    else{
        $(this).siblings('input[id=incomeyrd]').attr('disabled',true);
        $(this).siblings('input[id=els]').attr('disabled',true);
    }

});

$(document).on('change' , '#so',function(){
    var value = $(this).val();
    var q = $(this).parents().parents().parents().parents().parents().parents().attr('id').replace(/t/, '');
    var ele = document.getElementsByClassName("idx");
    ele[q].innerHTML= ""; 
    var o = $(this).parents().parents().siblings().children().children('input[id=iforc]').val();
    if(value == "more"){
        $(this).parents().parents().siblings().children().children('select[id=rn]').prop('disabled', false);
        var run =  $(this).parents().parents().siblings().children().children('select[id=rn]').val();
        if(run == "notdefaultex"){
            var idq= $(this).parents().parents().siblings().children().children('input[id=idq]').val();
            $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        htmlq ="";
        htmlq+= '<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:10%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""> . <input style ="width:10%" type ="text" name= "asset_n'+o+'[]"required ><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = "">';
        $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);
        var htmlq = "";
        if(idq > 0){
            $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        for(var ci = 0;ci<=idq-1;ci++){
            
            if(ci == 0){
                         htmlq+='<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:20%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""> . <input style ="width:10%" type ="text" name= "asset_n'+o+'[]"required ><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
                    }else{
                        htmlq+='<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida" disabled class = "">/<input style ="width:20%" type="text" name="asset_Set'+o+'[]" id = "idb"disabled class = ""> . <input style ="width:10%" type ="text" name= "asset_n'+o+'[]"required ><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
                    }
        }$(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);
    }
        }else if( run == "defaultex"){
            var idq= $(this).parents().parents().siblings().children().children('input[id=idq]').val();
            $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        htmlq ="";
        htmlq+= '<input type="text" style ="width:40%" name="asset_ID[]"required id = "ida" class = "">/<input style ="width:10%" type="text" name="asset_Set[]"required id = "idb" class = ""><input style ="width:10%" type="text" name="assetid[]" id= "idc" class = "">';
        $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);
        var htmlq = "";
        if(idq > 0){
            $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);
    }
        }
    }
    else if(value == "one"){
        $(this).parents().parents().siblings().children().children('select[id=rn]').prop('disabled', true);
        $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        htmlq="";
        
          $(this).parents().parents().siblings().children('td[id=keyy]').html('');
          $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);
          var idq= $(this).parents().parents().siblings().children().children('input[id=idq]').val();
          if(idq > 0){
            $(this).parents().parents().siblings().children('td[id=keyy]').html('');
            $('#idq').val("1");
            htmlq+='<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:10%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
        
    }else{
        $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        htmlq+='<input type="text"  style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:10%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
    }
          $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);
        
        
        
    }


});

$(document).on('change','#rn',function(){
    var q = $(this).parents().parents().parents().parents().parents().parents().attr('id').replace(/t/, '');
    var value =$(this).val();
    var ele = document.getElementsByClassName("idx");
    ele[q].innerHTML= "";
     var idq= $(this).parents().parents().siblings().children().children('input[id=idq]').val();
    if(value =="defaultex"){
        htmlq = "";
        htmlq+= '<input type="text" style ="width:40%" name="asset_ID[]"required id = "ida" class = "">/<input style ="width:10%" type="text" name="asset_Set[]"required id = "idb" class = ""><input style ="width:10%" type="text" name="assetid[]" id= "idc" class = "">';
          $(this).parents().parents().siblings().children('td[id=keyy]').html('');
          $(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);


    }    
    else if(value == "notdefaultex"){
        var o = $(this).parents().parents().siblings().children().children('input[id=iforc]').val();
        $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        var htmlq = "";
        
        $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        
        if(idq > 0){
            $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        for(var ci = 0;ci<=idq-1;ci++){
            
            if(ci == 0){
                         htmlq+='<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:20%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""> . <input style ="width:10%" type ="text" name= "asset_n'+o+'[]"required ><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
                    }else{
                        htmlq+='<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida" disabled class = "">/<input style ="width:20%" type="text" name="asset_Set'+o+'[]" id = "idb"disabled class = ""> . <input style ="width:10%" type ="text" name= "asset_n'+o+'[]"required ><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
                    }
          
        }  
    }else{
        $(this).parents().parents().siblings().children('td[id=keyy]').html('');
        htmlq+='<input type="text" style ="width:40%" name="asset_ID'+o+'[]" id = "ida"required class = "">/<input style ="width:10%" type="text" name="asset_Set'+o+'[]" id = "idb"required class = ""> . <input style ="width:10%" type ="text" name= "asset_n'+o+'[]"required ><input style ="width:10%" type="text" name="assetid'+o+'[]" id= "idc" class = ""><br>';
    }$(this).parents().parents().siblings().children('td[id=keyy]').append(htmlq);

    }

});
 $(document).on('click','#submit',function(){
    $('#rn').prop('disabled',false);
 });
 /*$(document).on('click','#datepick[type=text]',function(){
     var t = $(this).prop('type');
     var d = $(this).val().split('/');
     var dy = (parseInt(d[2])-543)+'-'+d[1]+'-'+d[0];
         $(this).prop('type','date');
         $(this).val(dy);
    
 });
 $(document).on('blur','#datepick[type=date]',function(){
    
     var t = $(this).prop('type');
     var d = $(this).val().split('-');
     var dy = d[2]+'/'+d[1]+'/'+(parseInt(d[0])+543);
     $(this).prop('type','text');
     $(this).val(dy);
        
     
    
 });*/
});


</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



</html>

<!-- <script src="javascript/multi_insert_form_js.js"></script> -->


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
function get_money_type(){
    require 'connect.php';
    $output = '';
    $sql = "SELECT * FROM money_type";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $output .= '<option value="'.$row["mid"].'">'.$row["money_type"].'</option>';
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
                
                    $sql = "SELECT * FROM getmethod WHERE getMethod_ID NOT IN ('1', '2', '3','9')";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$output .= '<option value="'.$row["getMethod_ID"].'">'.$row["method"].'</option>';
                    }     }
 return $output;
}


?>
