<?php 
require 'connect.php';
echo "AADS";
$num = "255546.65";
echo "<br>";
echo "<br>";
echo number_format("1000000")."<br>";
echo number_format("1000000",2)."<br>";

if(is_numeric($num)) { echo number_format($num,2)."<br>"; }
else { echo $num; }
echo number_format($num,2)."<br>";
$s = number_format($num,2)."<br>";
echo str_replace(',', '', $s)."<br>";

echo count($_POST['report_date'])."<br>";
//echo $_POST['count_re'];







$idA = array();
$idB = array();
$c = count($_POST['report_date']);
$count_re = $_POST['count_re'];


for($n =  $count_re ; $n >= 1 ; $n-- ){

    $date = $_POST['report_date'][$c-$n];
    $report_NO = $_POST['report_NO'][$c-$n];
    $report_order = $_POST['report_order'][$c-$n];
    $unit = $_POST['unit'][$c-$n];
    $price_per_unit = $_POST['price_per_unit'][$c-$n];
    $summary = $_POST['summary'][$c-$n];
    $life_time = $_POST['life_time'][$c-$n];
    $Depreciation_rate = $_POST['Depreciation_rate'][$c-$n];
    $year_Depreciation = $_POST['year_Depreciation'][$c-$n];
    $sum_Depreciation = $_POST['sum_Depreciation'][$c-$n];
    $net_value = $_POST['net_value'][$c-$n];
    $Change_order = $_POST['Change_order'][$c-$n];
    $report_number = $_POST['report_number'][$c-$n];
    $cn = $c-$n;
    $t = time();
    $sql = "INSERT INTO `asset_report`( `date`,`time_now`, `report_NO`, `report_order`, `unit`, `price_per_unit`, `summary`, `life_time`, `Depreciation_rate`, `year_Depreciation`, `sum_Depreciation`, `net_value`, `Change_order`, `report_number`) VALUES ('".$date."','".$t.$n."','".$report_NO."','".$report_order."','".$unit."','".$price_per_unit."','".$summary."','".$life_time."','".$Depreciation_rate."','".$year_Depreciation."','".$sum_Depreciation."','".$net_value."','".$Change_order."','".$report_number."')";
    if ($conn->query($sql) == TRUE) {
           $sql = "SELECT aid FROM asset_report WHERE time_now = '".$t.$n."'" ;
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $repid = $row['aid'];
            array_push($idB,$repid);
            }
           }
        
        }

}




for($i = 0 ; $i < count($_POST['aid']) ; $i++ )
{
    
    $date = $_POST['report_date'][$i];
    $report_NO = $_POST['report_NO'][$i];
    $report_order = $_POST['report_order'][$i];
    $unit = $_POST['unit'][$i];
    $price_per_unit = $_POST['price_per_unit'][$i];
    $summary = $_POST['summary'][$i];
    $life_time = $_POST['life_time'][$i];
    $Depreciation_rate = $_POST['Depreciation_rate'][$i];
    $year_Depreciation = $_POST['year_Depreciation'][$i];
    $sum_Depreciation = $_POST['sum_Depreciation'][$i];
    $net_value = $_POST['net_value'][$i];
    $Change_order = $_POST['Change_order'][$i];
    $report_number = $_POST['report_number'][$i];
    $aids = $_POST['aid'][$i];
    $sql = "UPDATE `asset_report` SET `date`='".$date."',`report_NO`='".$report_NO."',`report_order`='".$report_order."',`unit`='".$unit."',`price_per_unit`='".$price_per_unit."',`summary`='".$summary."',`life_time`='".$life_time."',`Depreciation_rate`='".$Depreciation_rate."',`year_Depreciation`='".$year_Depreciation."',`sum_Depreciation`='".$sum_Depreciation."',`net_value`='".$net_value."',`Change_order`='".$Change_order."',`report_number`='".$report_number."' WHERE aid = '".$aids."'";
    if ($conn->query($sql) == TRUE) {
    
    }
}

$aidq = $_POST['aid'][0];
$sql = "SELECT * FROM asset_report_text where aid = '".$aidq."'";
$result = $conn->query($sql);
           if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($idA,$row['id']);
            }
        }


for($i = 0 ; $i <count($idA); $i++){
    for($z = 0 ; $z <count($idB) ; $z++){
        $sqll = "INSERT INTO `asset_report_text`( `id`, `aid`) VALUES ('".$idA[$i]."','".$idB[$z]."')";
            if ($conn->query($sqll) == TRUE) {
                echo $sqll;
            }
            
    }
}

print_r($idA);
header('Location: assetmanage.php');
?>