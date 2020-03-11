<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html><?php SESSION_START(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/management.css"> 
    <link rel="stylesheet" href="CSS/fixedthead.css">
    <link rel="stylesheet" href="CSS/submitstyle.css">
    <title>Document</title>
</head>
<body>
    
<?php  require 'connect.php';
       $sqla = "SELECT * FROM userdata WHERE name = '".$_SESSION['Account']."'";
       $result = $conn->query($sqla);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           if($row['profile_ID']==2){ $_SESSION['editop'] = 2; require 'nav.php'; }
           elseif($row['profile_ID']==1){ $_SESSION['editop'] = 1; require 'nav.php'; }
            }
        }
?>
<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/LOGOxx.png" class="brand_logo" alt="Logo">
					</div>
				</div>
  <?php // require 'searchbox.php'; ?>
  <form action="asset_update.php" method="post">
    <div style="text-align:center">
    <table class="table table-striped table-dark">
  <thead>
    <tr>
        <th></th>
        <th>รหัสครุภัณฑ์</th>
        <th>ชื่อครุภัณฑ์</th>
        <th>ชื่อเรียก</th>
        <th>ประเภทครุภัณฑ์</th>
	    <th>edit</th>
    </tr>
  </thead>
  <tbody>
        <?php
       // var_dump($_SESSION['Account']);
       require 'connect.php';
      
            $s = $_POST['search'];
            $clause = " WHERE ";
            $sql="SELECT * FROM asset natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room ";//Query stub
            if(isset($_POST['submit'])){
            if(isset($_POST['soption'])){
            foreach($_POST['soption'] as $c){
            if(!empty($c)){
                if($c == 'asset_location_ID')
                {
                    $r = $_POST['loc'];
                    $sql .= $clause."`".$c."` = {$r}";
                    $clause = " and " ; 
                }
                else if($c ==  'room_ID')
                {
                    $r = $_POST['rm'];
                    $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                }
               else if($c == 'asset_type_ID')
                {
                    $r = $_POST['atype'];
                    $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                }
                else if($c == 'asset_stat_ID')
                {
                    $r = $_POST['utype'];
                    $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                }
                else if($c == 'dstat_ID')
                {
                    $r = $_POST['dtype'];
                    $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                }
                else if($c == 'resper_ID')
                {
                    $r = $_POST['resper_ID'];
                    $sql .= $clause."`".$c."` = {$r} ";
                    $clause = " and ";
                }
                else if($c == 'get_method')
                {
                    $r = $_POST['method'];
                    $sql .= $clause."`".$c."` LIKE '%{$r}%' ";
                    $clause = " and ";
                }
               else if($c == 'asset_ID'){
                   
                $sql .= $clause."`".$c."` LIKE '%{$s}%' OR asset_name LIKE '%{$s}%'";
                $clause = " and ";//Change  to OR after 1st WHERE
            
               }
               
               
              
            } 
           
        }
        //SELECT * FROM asset natural join assetstat natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room WHERE (`asset_ID` LIKE '%15.2%' or model LIKE '%15.2%' OR asset_location LIKE '%15.2%' )and `room_ID` = 1 and `asset_type_ID` = 1 and `asset_stat_ID` = 1 and `dstat_ID` = 2 and `resper_ID` = 1 and `get_method` LIKE '%ตกลงราคา%'
       // $sql .= "or( asset_ID LIKE '%{$s}%' OR  model LIKE '%{$s}%' OR asset_location LIKE '%{$s}%' OR room LIKE  '%{$s}%' OR 	asset_type_name LIKE '%{$s}%' OR asset_stat_name LIKE '%{$s}%' OR dstat LIKE '%{$s}%' OR resper_firstname LIKE '%{$s}%' OR resper_lastname LIKE '%{$s}%' OR get_method LIKE '%{$s}%')";
    }
    else if(!isset($_POST['soption']))
    {
        $sql .= $clause."`asset_ID` LIKE '%{$s}%' OR asset_name LIKE '%{$s}%'";
    }  
               // echo $sql;//Remove after testing
}

        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                echo
                    "<tr>
                        <td><input type='checkbox' name='id[]' id= 'cbx' onclick='checkboxes()' value = '".$row['id']."'></td>
                        <td>".$row['asset_ID']."</td>
                        <td>".$row['asset_name']."</td>
                        <td>".$row['asset_nickname']."</td>
                        <td>".$row['asset_type_name']."</td>
                        <td><a href='assetdetail.php?asset_number=".$row['id']."&function=3'><button type='button' style='background-color:red; border-color:White; color:white'>Detail</button></a>";
                        if($_SESSION['editop'] == 1){
                        echo "<a href='edit.php?asset_number=".$row['asset_number']."&function=4'><button type='button' style='background-color:black; border-color:White; color:white'>EDIT</button></a>"; } //<input type = 'button' onClick= 'deletethis(".$row['asset_number'].")' name = 'Del' value = 'Delete' >    
                
                echo "</td></tr>";
        
                echo "<script language ='javascript'> 
                    function deletethis(did){
                        if(confirm('Do you Want to delete?')){
                            window.location.href='assetdelete.php?del_id='+did+''
                            return true;
                        }

                    }
                </script>";

            }
        }
       
        ?>
    </tbody>
</table>
<?php if($_SESSION['editop'] == 2){ }
else if($_SESSION['editop'] == 1){ ?>
<p id = "q"style="color: red;font-size: 24px">โปรดเลือกรายการครุภัณฑ์ที่ต้องการแก้ไข</p>
<div style = "text-align: center">
<input style= "text-align: center" type="submit" id = 'x' name="stat_update" value="แก้ไขสถานะของครุภัณฑ์ที่เลือก">
<input style= "text-align: center" type="submit" id = 'y' name="room_update" value="แก้ไขห้องที่จัดเก็บของครุภัณฑ์ที่เลือก">
</div>
<?php } ?>
</div>
</form>
<?php require 'footer.php'; ?>
</html>

<script type="text/javascript"> 

window.onload = function(){
    document.getElementById('x').disabled = true;
    document.getElementById('y').disabled = true;
    checkboxes();
}
function checkboxes()
      {
          
       var inputElems = document.getElementsByTagName("input"),
        count = 0;

        for (var i=0; i<inputElems.length; i++) {       
           if (inputElems[i].type == "checkbox" && inputElems[i].checked == true){
                count++;
                
           }

        }
        if(count > 0){
                  
                document.getElementById('x').disabled = false;
                document.getElementById('y').disabled = false;
                document.getElementById('q').style.display = 'none';
                }
                else if(count <= 0){
                    document.getElementById('x').disabled = true;
                    document.getElementById('y').disabled = true;
                    document.getElementById('q').style.display = 'block';
                }
       
     }

</script>