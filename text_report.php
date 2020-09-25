<?php require 'connect.php';
SESSION_START();
$_SESSION['sql_text'] = $_SESSION['sqlx'];
$_SESSION['word_text'] = $_SESSION['searchword'];
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="CSS/css_report.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <link rel="stylesheet" href="CSS/BG.css">
       <link rel="stylesheet" href="CSS/formstyle.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <style>
    
    #treport_td{ border: 1px solid black; }
    #treport_tds{ 
        border: 1px solid black;
       
                    border-top: none;
    }
    </style>

<title>CS_Asset</title>
</head>
<body>
<?php require 'nav.php'; ?>
    <br>
    
    <br>
    <br>
    
    <div class="whitebox">
    <div style = "text-align:center;"><h1>ทะเบียนคุมทรัพย์สิน</h1><br><a href="assetmanage.php" style ="float:left"><button class="btn btn-outline-secondary" >ย้อนกลับ</button></a></div>
    <br>
    <br>
    <form action="text_report_back.php" method = 'POST'>
    
    <table id = "treport">
                               <thead>
                               <tr id ="treport_tr">
                                    <td id = "treport_td" rowspan="2">
                                        <div>วัน/เดือน/ปี</div>
                                    </td>
                                    <td id ="treport_td" rowspan="2">
                                        <div>ที่เอกสาร</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>รายการ</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>จำนวนหน่วย</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>ราคาต่อ หน่วย/ชุด/กลุ่ม</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>มูลค่ารวม</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>อายุการใช้งาน</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>อัตรค่าเสื่อมราคา(%)</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>ค่าเสื่อมราคาประจำปี</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>ค่าเสื่อมราคาสะสม</div>
                                    </td>
                                    <td id = "treport_td" rowspan="2">
                                        <div>มูลค่าสุทธิ</div>
                                    </td>
                                    <td id = "treport_td" colspan="2">
                                        <div>รายการเปลี่ยนแปลงการเคลื่อนย้ายสถานภาพ</div>
                                    </td>
                               </tr>
                               <tr>
                                 <td id = "treport_td"><div>รายการเปลี่ยน</div> </td>
                                 <td id = "treport_td"><div>รายการเลขที่เอกสาร</div> </td>
                               </tr>
                               </thead>
                               <tbody id = "tbody">
                               <?php 

                                    $c = 1;
                                    $as = $_GET['asset_number'];
                                    $sql = "SELECT * FROM asset natural join asset_report_text natural join asset_report where asset_number = '".$as."' ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<tr id = "report_ta"><input type = "hidden" name = "aid[]" value = "'.$row['aid'].'">
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
                                            echo '<td id = "trport_td"><button class="btn btn-danger" id = "remover"style = "width: 50px"type = "button" value = "'.$row['aid'].'" data-as="'.$as.'">X</button></td>';
                                        }
                                        echo '</tr>';
                                       $c += 1;
                                    }     
                                }
                               ?>
                              
                                 
                                 
                                 
                                 

                                 
                               </tbody>
                               </table>
                               <br>
                               <div style = "float:right;"><button style = "width:50%" type="button" id = "minus" class="btn btn-danger">-</button><button style = "width:50%" type="button" id = "plus" class="btn btn-success">+</button></div>
                               <br>
                               <input type = "hidden" id = "count_re" name ="count_re">
                              <br>
                               <center><input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit"/> </center> 
              </form>     
              <br>           
              
      </div>
      
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
var tra = [0];
$(document).on('click','#plus',function(){
        var a = tra[tra.length-1]+1;

        tra.push(a);
        $("#count_re").val(tra[tra.length-1]);
        
        var html = '';
        html +='<tr id = "'+tra[tra.length-1]+'s">';
        html += '<td id = "treport_tds" ><input name = "report_date[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "report_NO[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "report_order[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "unit[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "price_per_unit[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "summary[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "life_time[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "Depreciation_rate[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "year_Depreciation[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "sum_Depreciation[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "net_value[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "Change_order[]" style ="width:100%;" type = "text"></td>';
        html +='<td id = "treport_tds" ><input name = "report_number[]"style ="width:100%;" type = "text"></td>';
        html +='</tr>';
        $('#tbody').append(html);

    });
    $(document).on('click','#minus',function(){
        
        var a = tra[tra.length-1] ;
        
        if(a == 0){ }
        else if(a > 0){tra.pop();
        $('#'+a+'s').remove();}
        $("#count_re").val(tra[tra.length-1]);
        
    });
   
</script>
<script>
$(document).ready(function(){

    $(document).on("click","#remover",function(){
        var aid = $(this).val();
        var asi = $(this).data("as");
        var option = "deleterow";
        $.ajax({
            url: "report_editop.php",
            method:"POST",
            data:{
                'option' : option,
                'aid' : aid,
                'as' : asi

            },
            success:function(data)
            {
                $('#tbody').html(data);
            }
        })
    })

})
</script>
