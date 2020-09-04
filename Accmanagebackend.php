<?php 
SESSION_START();
$fname = $_SESSION['userData']['givenName'];
$ffname = $_SESSION['Uname'];
$db = mysqli_connect('localhost', 'admin', '1234', 'prodata');
$output= "";
if(isset($_POST['nmsearch'])){
    $output .='<table class="table bg-light text-dark table-bordered table-striped" width="1400px"> <thead>
    <tr>
      <th scope="col"><a class= "column_sort" id="givenName" data-order="desc" href="#" >First Name</a></th>
      <th scope="col"><a class= "column_sort" id="familyName" data-order="desc"  href="#" >Last Name</a></th>
      <th scope="col"><a class= "column_sort" id="email" data-order="desc"  href="#" >Email</a></th>
	  <th scope="col"><a class= "column_sort" id="stat_name" data-order="desc"  href="#" >Status</a></th>
      <th scope="col"><a class= "column_sort" id="profile_name" data-order="desc"  href="#">Profile</a></th>
      <th scope="col"><a class= "column_sort" id="last_update" data-order="desc"  href="#" >Lastupdate</a></th>
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
            <td>".$row['givenName']."</td>
            <td>".$row['familyName']."</td>
            <td>".$row['email']."</td>
            <td>".$row['stat_name']."</td>
            <td>".$row['profile_name']."</td>
            <td>".$row['last_update']."</td>
            <td>";
            if($row['ID_stat']==1){ $output.= "<a href='usermanage.php?ID=".$row['ID']."&function=4'><button type='button' style='background-color:red; border-color:White; color:white'>DELETE</button></a>";}                       
            else { $output.= "<a href='usermanage.php?ID=".$row['ID']."&function=1'><button type='button' style='background-color:green; border-color:White; color:white'>Active</button></a>";}
            
            if($row['profile_ID']==2){ $output.= "<a href='usermanage.php?ID=".$row['ID']."&function=5'><button type='button' style='background-color:blue; border-color:White; color:white'>SET TO ADMIN</button></a>";}                       
            else { $output.= "<a href='usermanage.php?ID=".$row['ID']."&function=6'><button type='button' style='background-color:black; border-color:White; color:white'>SET TO GUEST</button></a>";};
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
      <th scope="col"><a class= "column_sort" id="givenName" data-order="'.$order.'" href="#" >First Name</a></th>
      <th scope="col"><a class= "column_sort" id="familyName" data-order="'.$order.'"  href="#" >Last Name</a></th>
      <th scope="col"><a class= "column_sort" id="email" data-order="'.$order.'"  href="#" >Email</a></th>
	  <th scope="col"><a class= "column_sort" id="stat_name" data-order="'.$order.'"  href="#" >Status</a></th>
      <th scope="col"><a class= "column_sort" id="profile_name" data-order="'.$order.'"  href="#" >Profile</a></th>
      <th scope="col"><a class= "column_sort" id="last_update" data-order="'.$order.'"  href="#" >Lastupdate</a></th>
	  <th scope="col">Edit</th> 
	  
    </tr>
  </thead> <tbody>';
  while($row = mysqli_fetch_array($result)){
      $output .="<tr>
      <td>".$row['givenName']."</td>
      <td>".$row['familyName']."</td>
      <td>".$row['email']."</td>
      <td>".$row['stat_name']."</td>
      <td>".$row['profile_name']."</td>
      <td>".$row['last_update']."</td>
      <td>";
      if($row['ID_stat']==1){ $output.= "<a href='usermanage.php?ID=".$row['ID']."&function=4'><button type='button' style='background-color:red; border-color:White; color:white'>DELETE</button></a>";}                       
      else { $output.= "<a href='usermanage.php?ID=".$row['ID']."&function=1'><button type='button' style='background-color:green; border-color:White; color:white'>Active</button></a>";}
      
      if($row['profile_ID']==2){ $output.= "<a href='usermanage.php?ID=".$row['ID']."&function=5'><button type='button' style='background-color:blue; border-color:White; color:white'>SET TO ADMIN</button></a>";}                       
      else { $output.= "<a href='usermanage.php?ID=".$row['ID']."&function=6'><button type='button' style='background-color:black; border-color:White; color:white'>SET TO GUEST</button></a>";};
      $output .="</td></tr>";
  }
  $output .='</tbody> </table>';
  echo $output;
  exit();
}



?>