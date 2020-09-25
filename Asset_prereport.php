<!DOCTYPE html><?php SESSION_START(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/BG.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="stylesheet" href="CSS/Checckbox.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>CS_Asset</title>
</head>
<body>
<?php include 'nav.php'; ?>
<div align= "center" style= "margin-top:10%;">
<div class= "whitebox" style= "width:80%;align:center;height:30%;">
    <h1>ตรวจสอบภาพรวมครุภัณฑ์</h1>
    <br>
    <form action="asset_report.php" method="POST">
    <table>
    <tr>
        <td>
        <input type="checkbox" class="hidden-box" id="all"  name="all" value = "qd" />
    <label for="all" class="check--label">
      <span class="check--label-box"></span>
      <span >เลือกทั้งหมด</span>
    </label>
        </td>
    </tr>
    <tr>
    <td><input type="checkbox" class="hidden-box" id="w" name = "asroom"/>
    <label for="w" class="check--label">
      <span class="check--label-box"></span>
      <span>ห้องที่จัดเก็บครุภัณฑ์</span>
    </label></td>
    <td><input type="checkbox" class="hidden-box" id="e" name = "respers"/>
    <label for="e" class="check--label">
      <span class="check--label-box"></span>
      <span>ผู้รับผิดชอบ</span>
    </label></td>
    <td><input type="checkbox" class="hidden-box" id="s" name = "ustat" />
    <label for="s" class="check--label">
      <span class="check--label-box"></span>
      <span >สถานะการใช้งาน</span>
    </label></td>
    </tr>
    <tr>
    <td><input type="checkbox" class="hidden-box" id="q" name = "astyp" />
    <label for="q" class="check--label">
      <span class="check--label-box"></span>
      <span>ประเภทของครุภัณฑ์</span>
    </label></td>
    
    
    </tr>
    
    </table>
    <br>
    <table width="50%" >
    
        <tr>
        <td><div ><select class="form-control" name="axis" id="axis">
        <option value='P'>แนวตั้ง</option>
        <option value='A4-L'>แนวนอน</option>
    </select></div></td>
            <td><button type="submit" class= "btn btn-outline-success" name="overall">แสดงภาพรวม</button></td>
        </tr>
    </table>
    <br>
    
</div>
</div>


</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).on('change','#all',function(){
        if(this.checked) {
           
            $('#s').prop( "checked", true );
            $('#q').prop( "checked", true );
            $('#w').prop( "checked", true );
            $('#e').prop( "checked", true );
           
        }
        else{
            
            $('#s').prop( "checked", false );
            $('#q').prop( "checked", false );
            $('#w').prop( "checked", false );
            $('#e').prop( "checked", false );
           
        }
    })
</script>