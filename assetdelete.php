
<?php 
require 'connect.php';

$sql = "DELETE FROM asset WHERE asset_number = '".$_GET['del_id']."' ";
if ($conn->query($sql) == TRUE) {
header('Location: assetmanage.php');
}
?>