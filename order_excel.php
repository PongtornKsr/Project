<?php 
session_start();
require 'connect.php';
$sql = $_SESSION['sqlexcel'];
$head = $_SESSION['excel_head'];
$se = $_SESSION['se'];
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename='.rand().'.xls'); 
 ?>
 <table class="table table-bordered" width = "100%" style = "text-align:center">
<thead align='center'>
<tr>
<?php echo $head; ?>
</tr>
</thead>
<tbody>

<?php 
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            for($i = 0 ; $i < count($se) ; $i++){
                if($se[$i] == "resper_firstname|resper_lastname"){ $arr = explode("|",$se[$i]); echo "<td>".$row[$arr[0]]." ".$row[$arr[1]]."</td>"; }
                else{
                echo "<td>".$row[$se[$i]]."</td>";
                }
            }
            echo "</tr>";
        }
    }
   
    
?>
</tbody>
</table>