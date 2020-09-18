<?php 
SESSION_START();
$fname = $_SESSION['userData']['givenName'];
$ffname = $_SESSION['Uname'];
$db = mysqli_connect('localhost', 'admin', '1234', 'prodata');
$output= "";
if(isset($_POST['nmsearch'])){
    $output .='<table class="table bg-light text-dark table-bordered table-striped" width="1400px"> <thead>
    <tr>
      <th scope="col"><a class= "column_sort" id="givenName" data-order="desc" href="#" >ชื่อ</a></th>
      <th scope="col"><a class= "column_sort" id="familyName" data-order="desc"  href="#" >นามสกุล</a></th>
      <th scope="col"><a class= "column_sort" id="email" data-order="desc"  href="#" >อีเมล</a></th>
	  <th scope="col"><a class= "column_sort" id="stat_name" data-order="desc"  href="#" >สถานะ</a></th>
      <th scope="col"><a class= "column_sort" id="profile_name" data-order="desc"  href="#">ประเภทบัญชี</a></th>
      <th scope="col"><a class= "column_sort" id="last_update" data-order="desc"  href="#" >แก้ไขครั้งล่าสุด</a></th>
	  <th scope="col">Edit</th> 
	  
    </tr>
  </thead> <tbody>';
    if(isset($_POST['query'])){
            $sch = mysqli_real_escape_string($db, $_POST['query']);
            $query = "SELECT * FROM userdata natural join userstat natural join userprofile WHERE (givenName NOT IN ('$fname')) AND  (givenName LIKE '%$sch%' or familyName  LIKE '%$sch%' or email  LIKE '%$sch%')";
            $_SESSION['query'] = $query;
    }
    else{
        
            $query ="SELECT * FROM userdata natural join userstat natural join userprofile  WHERE givenName NOT IN ('$fname') and givenName NOT IN ('$ffname')";
            $_SESSION['query'] = $query;
    
    }
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $output .="<tr>
            <td align='left'>".$row['givenName']."</td>
            <td align='left'>".$row['familyName']."</td>
            <td align='left'>".$row['email']."</td>
            <td align='left'>".$row['stat_name']."</td>
            <td align='left'>".$row['profile_name']."</td>
            <td align='left'>".$row['last_update']."</td>
            <td>";
            if($row['ID_stat']==1){ $output.= " <button type='button' class='btn btn-outline-danger' id = 'del_b' value = '".$row['ID']."' data-func='4'>ลบผู้ใช้งาน</button>";}                       
      else { $output.= " <a href='usermanage.php?ID=".$row['ID']."&function=1'><button type='button' class='btn btn-outline-success'>Active</button></a>";}
      
      if($row['profile_ID']==2){ $output.= " <a href='usermanage.php?ID=".$row['ID']."&function=5'><button type='button' class='btn btn-outline-info'>ตั้งเป็นแอดมิน</button></a>";}                       
      else { $output.= "  <a href='usermanage.php?ID=".$row['ID']."&function=6'><button type='button' class='btn btn-outline-warning''>ตั้งเป็นผู้ใช้ทั่วไป</button></a>";};
      $output .= "  <a href='profile_edit.php?ID=".$row['ID']."'> <button type='button' class='btn btn-outline-secondary' value = '".$row['ID']."'>แก้ไขข้อมูล</button></a>";
      
            $output .="</td></tr>";
        }
    }
    $output .="</tbody> </table>";
    echo $output;
    exit();
}

if(isset($_POST['sort'])){
    $order = $_POST['order'];
    if($order == 'desc'){
        $order = 'asc';
    }
    else
    {
        $order = 'desc';
    
    }
    $query = $_SESSION['query'];
    $query .= "ORDER BY ".$_POST["column_name"]." ".$_POST['order']."";
    $result = mysqli_query($db,$query);
    $output .='<table class="table bg-light text-dark table-bordered table-striped" width="1400px"> <thead> 
    <tr>
      <th scope="col"><a class= "column_sort" id="givenName" data-order="'.$order.'" href="#" >ชื่อ</a></th>
      <th scope="col"><a class= "column_sort" id="familyName" data-order="'.$order.'"  href="#" >นามสกุล</a></th>
      <th scope="col"><a class= "column_sort" id="email" data-order="'.$order.'"  href="#" >อีเมล</a></th>
	  <th scope="col"><a class= "column_sort" id="stat_name" data-order="'.$order.'"  href="#" >สถานะ</a></th>
      <th scope="col"><a class= "column_sort" id="profile_name" data-order="'.$order.'"  href="#" >ประเภทบัญชี</a></th>
      <th scope="col"><a class= "column_sort" id="last_update" data-order="'.$order.'"  href="#" >แก้ไขครั้งล่าสุด</a></th>
	  <th scope="col">Edit</th> 
	  
    </tr>
  </thead> <tbody>';
  while($row = mysqli_fetch_array($result)){
      $output .="<tr>
      <td align='left'>".$row['givenName']."</td>
      <td align='left'>".$row['familyName']."</td>
      <td align='left'>".$row['email']."</td>
      <td align='left'>".$row['stat_name']."</td>
      <td align='left'>".$row['profile_name']."</td>
      <td align='left'>".$row['last_update']."</td>
      <td align='left'>";

      if($row['ID_stat']==1){ $output.= " <button type='button' class='btn btn-outline-danger' id = 'del_b' value = '".$row['ID']."' data-func='4'>ลบผู้ใช้งาน</button>";}                       
      else { $output.= " <a href='usermanage.php?ID=".$row['ID']."&function=1'><button type='button' class='btn btn-outline-success'>Active</button></a>";}
      
      if($row['profile_ID']==2){ $output.= " <a href='usermanage.php?ID=".$row['ID']."&function=5'><button type='button' class='btn btn-outline-info'>ตั้งเป็นแอดมิน</button></a>";}                       
      else { $output.= "  <a href='usermanage.php?ID=".$row['ID']."&function=6'><button type='button' class='btn btn-outline-warning''>ตั้งเป็นผู้ใช้ทั่วไป</button></a>";};
      $output .= "  <a href='profile_edit.php?ID=".$row['ID']."'><button type='button' class='btn btn-outline-secondary' value = '".$row['ID']."'>แก้ไขข้อมูล</button></a>";
      
      $output .="</td></tr>";

  }
  $output .='</tbody> </table>';
  echo $output;
  exit();
}



?>