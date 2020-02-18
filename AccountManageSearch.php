<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html><?php SESSION_START(); ?>
<html lang="en">
<?php require 'managepageheader.php'; 
$Search = $_POST['search'];
?>

<form action="AccountManageSearch.php" method="post">
<?php require 'accsearchbox.php'; ?>
</form>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
	  <th scope="col">Start</th>
      <th scope="col">Profile</th>
      <th scope="col">Lastupdate</th>
	  <th scope="col">Edit</th> 
	  
    </tr>
    </thead>
  <tbody>
        <?php
        require 'connect.php';
        $fname = $_SESSION['userData']['givenName'];
        $sql = "SELECT * FROM userdata natural join userstat natural join userprofile WHERE (givenName NOT IN ('$fname')) AND  (givenName LIKE '%$Search%' or familyName  LIKE '%$Search%' or email  LIKE '%$Search%')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                echo
                    "<tr>
                        <td>".$row['givenName']."</td>
                        <td>".$row['familyName']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['stat']."</td>
                        <td>".$row['profile_name']."</td>
                        <td>".$row['last_update']."</td>
                        <td><a href='usermanage.php?ID=".$row['ID']."&function=3'><button type='button' style='background-color:red; border-color:White; color:white'>Delete</button></a>";
                        if($row['ID_stat']==1){ echo "<a href='usermanage.php?ID=".$row['ID']."&function=4'><button type='button' style='background-color:black; border-color:White; color:white'>Block</button></a>";}                       
                        else {echo "<a href='usermanage.php?ID=".$row['ID']."&function=1'><button type='button' style='background-color:black; border-color:White; color:white'>Active</button></a>";}
                        
                        if($row['profile_ID']==2){ echo "<a href='usermanage.php?ID=".$row['ID']."&function=5'><button type='button' style='background-color:blue; border-color:White; color:white'>Roleup</button></a>";}                       
                        else {echo "<a href='usermanage.php?ID=".$row['ID']."&function=6'><button type='button' style='background-color:blue; border-color:White; color:white'>Roledown</button></a>";}
                
                echo "</td></tr>";
        


            }
        }
       
        ?>
   </tbody>
</table>
</div>
<br><br>
  </form>
<?php require 'footer.php'; ?>
</html>