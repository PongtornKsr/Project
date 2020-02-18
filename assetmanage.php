<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html><?php SESSION_START(); ?>
<html lang="en">
<?php require 'managepageheader.php'; ?>

  <?php require 'searchbox.php'; ?>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-dark">
  <thead>
    <tr>
        <th scope="col">รหัสครุภัณฑ์</th>
        <th scope="col">รุ่น/แบบ</th>
        <th scope="col">สถานที่ตั้ง</th>
	    <th scope="col">ห้องที่จัดเก็บ</th>
        <th scope="col">ผู้รับผิดชอบ</th>
        <th scope="col">วิธีการที่ได้รับ</th> 
        <th scope="col">ประเภทครุภัณฑ์</th>
	    <th scope="col">สถานะการใช้งาน</th>
        <th scope="col">ประเภทการใช้งาน</th>
	    <th scope="col">edit</th>
    </tr>
  </thead>
  <tbody>
        <?php
       require 'connect.php';
            $s = $_POST['search'];
            $clause = " WHERE ";
            $sql="SELECT * FROM asset natural join assetstat natural join assettype natural join asset_location natural join deploy_stat natural join respon_per NATURAL join room ";//Query stub
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
                        <td>".$row['asset_ID']."</td>
                        <td>".$row['model']."</td>
                        <td>".$row['asset_location']."</td>
                        <td>".$row['room']."</td>
                        <td>".$row['resper_firstname']."".$row['resper_lastname']."</td>
                        <td>".$row['method']."</td>
                        <td>".$row['asset_type_name']."</td>
                        <td>".$row['asset_stat_name']."</td>
                        <td>".$row['dstat']."</td>
                        <td><a href='assetdetail.php?asset_number=".$row['asset_number']."&function=3'><button type='button' style='background-color:red; border-color:White; color:white'>Detail</button></a>";
                        echo "<a href='edit.php?asset_number=".$row['asset_number']."&function=4'><button type='button' style='background-color:black; border-color:White; color:white'>EDIT</button></a>               
                         <input type = 'button' onClick= 'deletethis(".$row['asset_number'].")' name = 'Del' value = 'Delete' >";
                        
                
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
</div>

<?php require 'footer.php'; ?>
</html>