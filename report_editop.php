<?php 
require 'connect.php' ;
$option = $_POST['option'];
$aid = $_POST['aid'];
$as = $_POST['as'];
$html = "";
if($option == "deleterow"){
$sqlq = "DELETE FROM asset_report_text WHERE aid = '".$aid."'";
if ($conn->query($sqlq) == TRUE) {
    $sqle = "DELETE FROM asset_report WHERE aid = '".$aid."'";
    $conn->query($sqle);
}

    $c = 1;
$sql = "SELECT * FROM asset natural join asset_report_text natural join asset_report where asset_number = '".$as."' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$html .= '<tr id = "report_ta"><input type = "hidden" name = "aid[]" value = "'.$row['aid'].'">
<td id = "treport_td" ><input  type = "text" name = "report_date[]" style ="width:100%" value = "'.$row['date'].'"></td>
<td id = "treport_td" ><input name = "report_NO[]" style ="width:100%;" type = "text" value = "'.$row['report_NO'].'"></td>
<td id = "treport_td" ><input name = "report_order[]" style ="width:100%;" type = "text" value = "'.$row['report_order'].'"></td>
<td id = "treport_td" ><input name = "unit[]" style ="width:100%;" type = "text" value = "'.$row['unit'].'"></td>
<td id = "treport_td" ><input name = "price_per_unit[]" style ="width:100%;" type = "text" value = "'.$row['price_per_unit'].'"></td>
<td id = "treport_td" ><input name = "summary[]" style ="width:100%;" type = "text" value = "'.$row['summary'].'"></td>
<td id = "treport_td" ><input name = "life_time[]" style ="width:100%;" type = "text" value = "'.$row['life_time'].'"></td>
<td id = "treport_td" ><input name = "Depreciation_rate[]" style ="width:100%;" type = "text" value = "'.$row['Depreciation_rate'].'"></td>
<td id = "treport_td" ><input name = "year_Depreciation[]" style ="width:100%;" type = "text" value = "'.$row['year_Depreciation'].'"></td>
<td id = "treport_td" ><input name = "sum_Depreciation[]" style ="width:100%;" type = "text" value = "'.$row['sum_Depreciation'].'"></td>
<td id = "treport_td" ><input name = "net_value[]" style ="width:100%;" type = "text" value ="'.$row['net_value'].'"></td>
<td id = "treport_td" ><input name = "Change_order[]" style ="width:100%;" type = "text" value = "'.$row['Change_order'].'"></td>
<td id = "treport_td" ><input name = "report_number[]"style ="width:100%;" type = "text" value ="'.$row['report_number'].'"></td>';
if($c > 1){
$html .= '<td id = "trport_td"><button class="btn btn-danger" id = "remover"style = "width: 50px"type = "button" value = "'.$row['aid'].'" data-as="'.$as.'" >X</button></td>';
}
$html .= '</tr>';
$c += 1;
}     
}
    
echo $html;
exit();
}
                           ?>