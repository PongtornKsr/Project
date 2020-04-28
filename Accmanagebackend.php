<?php 
SESSION_START();
$fname = $_SESSION['userData']['givenName'];
$ffname = $_SESSION['Uname'];
$db = mysqli_connect('localhost', 'admin', '1234', 'prodata');
$output= "";
if(isset($_POST['nmsearch'])){
    if(isset($_POST['query'])){
        $sch = mysqli_real_escape_string($db, $_POST['query']);
        $query = "SELECT * FROM userdata natural join userstat natural join userprofile WHERE (givenName NOT IN ('$fname')) AND  (givenName LIKE '%$sch%' or familyName  LIKE '%$sch%' or email  LIKE '%$sch%')";

    }
    else{
        $query ="SELECT * FROM userdata natural join userstat natural join userprofile  WHERE givenName NOT IN ('$fname') and givenName NOT IN ('$ffname') ";
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
    echo $output;
    exit();
}
?>