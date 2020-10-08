<!DOCTYPE html>
<?php SESSION_START(); 
    require 'connect.php';
    
    $_SESSION['axis'] = $_POST['axis'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/formstyle.css">
    <link rel="stylesheet" href="CSS/BG.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="shortcut icon" href="img/computer.png">
   
</head>
<body>
    <?php require 'nav.php'; ?>
    <?php 
      
      
      if(isset($_POST['asroom'])){
        $sqlrm = "SELECT room_ID,room, COUNT(asset_type_ID) AS cnt FROM asset NATURAL JOIN room GROUP BY room_ID";
      }
      if(isset($_POST['respers'])){
        $sqlresper = "SELECT resper_ID , resper_firstname ,resper_lastname, COUNT(asset_type_ID) AS cnt FROM asset NATURAL JOIN respon_per GROUP BY resper_ID";
        
      }
      if(isset($_POST['ustat'])){
        $sqlstat= "SELECT asset_stat_ID , asset_stat_name , COUNT(asset_type_ID) AS cnt FROM asset NATURAL JOIN asset_stat_overview NATURAL JOIN assetstat GROUP BY asset_stat_ID , asset_stat_name";
        
      }
      if(isset($_POST['astyp'])){
        $sqltype= "SELECT asset_type_ID , asset_type_name , COUNT(asset_type_ID) AS cnt FROM asset NATURAL JOIN assettype GROUP BY asset_type_ID,asset_type_name";
        
      }
      else{
        $sqltype= "SELECT asset_type_ID , asset_type_name , COUNT(asset_type_ID) AS cnt FROM asset NATURAL JOIN assettype GROUP BY asset_type_ID,asset_type_name";
      }

    ?>
  <div class = "container" align = "center" >
  <form class = "whitebox"id = "myform" action="report_overview.php" method="post" target="_blank">
  
  <button style = "float:left"type = "submit" class="btn btn-outline-success" id = "pdf">ดาวน์โหลดเป็นPDF</button>
  
  <br>
  <br><br>
  <?php if(isset($_POST['asroom'])){ ?>
    <div id="piechart" style="width: 800px; height: 500px;"></div>
    <?php } ?>
    <?php  if(isset($_POST['respers'])){ ?>
    <div id="piechart2" style="width: 800px; height: 500px;"></div>
    <?php } ?>
    <?php  if(isset($_POST['ustat'])){ ?>
    <div id="piechart3" style="width: 800px; height: 500px;"></div>
    <?php } ?>
    <?php  if(isset($_POST['astyp'])){ ?>
    <div id="piechart4" style="width: 800px; height: 500px;"></div>
    <?php } else{ ?>
    <div id="piechart5" style="width: 800px; height: 500px;"></div>
    <?php } ?>
    
  
    <div><input type="hidden" name="img1" id="im1" value = "ddd"></div>
    <div><input type="hidden" name="img2" id="im2" value = "ddd"></div>
    <div><input type="hidden" name="img3" id="im3" value = "ddd"></div>
    <div><input type="hidden" name="img4" id="im4" value = "ddd"></div>
    <div><input type="hidden" name="img5" id="im5" value = "ddd"></div>
    <div><input type="hidden" name="img6" id="im6" value = "ddd"></div>
    </form>
    </div>
</body>
</html>
<script>
    var img1,img2,img3,img4,img5,img6 = "";
    $(document).ready(function(){
      $('#mym').click(function() {
       
            $('#im1').val(img1) ;
            $('#im2').val(img2);
            $('#im3').val(img3);
            $('#im4').val(img4);
            $('#im5').val(img5);
            $('#im6').val(img6);
           
            
      });
      $('#myform').submit(function() {
        $('#im1').val(img1) ;
            $('#im2').val(img2);
            $('#im3').val(img3);
            $('#im4').val(img4);
            $('#im5').val(img5);
            $('#im6').val(img6);
           
            return true;
      });

        });
    </script><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
   

        google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        <?php if(isset($_POST['asroom'])){ ?>
        var data = google.visualization.arrayToDataTable([
          ['Task', 'value'],
          <?php 
          $asrm =array();
            $result = $conn->query($sqlrm);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $text = "['".$row['room']."' , ".$row['cnt']."]";
              array_push($asrm,$text);
               }
       }
        for($i = 0; $i<count($asrm); $i++){
          if($i == (count($asrm)-1)){
            echo $asrm[$i];
          }
          else {
            echo $asrm[$i].",";
          }
          
        }
       ?>
        ]);
        var options = {
          title: 'ภาพรวมห้องจัดเก็บครุภัณฑ์'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        google.visualization.events.addListener(chart, 'ready', function () {
         
         img1 = '<img src="' + chart.getImageURI() + '">';
        console.log(document.getElementById('piechart').innerHTML);
      });
        chart.draw(data, options);
        <?php } ?>
        

        <?php  if(isset($_POST['respers'])){ ?>
        var data2 = google.visualization.arrayToDataTable([
          ['Task', 'value'],
          <?php 
          $asres =array();
            $result = $conn->query($sqlresper);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $text = "['".$row['resper_firstname']." ".$row['resper_lastname']."' , ".$row['cnt']."]";
              array_push($asres,$text);
               }
       }
        for($i = 0; $i<count($asres); $i++){
          if($i == (count($asres)-1)){
            echo $asres[$i];
          }
          else {
            echo $asres[$i].",";
          }
          
        }
       ?>
        ]);
        var options2 = {
          title: 'ภาพรวมผู้รับผิดชอบ'
        };
        var d = new google.visualization.PieChart(document.getElementById('piechart2'));
        google.visualization.events.addListener(d, 'ready', function () {
         
          img2 = '<img src="' + d.getImageURI() + '">';
        console.log(document.getElementById('piechart2').innerHTML);
      });
        d.draw(data2,options2);
        <?php } ?>

        <?php  if(isset($_POST['ustat'])){ ?>
        var data3 = google.visualization.arrayToDataTable([
          ['Task', 'value'],
          <?php 
          $asst =array();
            $result = $conn->query($sqlstat);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $text = "['".$row['asset_stat_name']."' , ".$row['cnt']."]";
              array_push($asst,$text);
               }
       }
        for($i = 0; $i<count($asst); $i++){
          if($i == (count($asst)-1)){
            echo $asst[$i];
          }
          else {
            echo $asst[$i].",";
          }
          
        }
       ?>
        ]);
        var options3 = {
          title: 'ภาพรวมสถานะการใช้งาน'
        };
        var d = new google.visualization.PieChart(document.getElementById('piechart3'));
        google.visualization.events.addListener(d, 'ready', function () {
          
          img3 = '<img src="' + d.getImageURI() + '">';
        console.log(document.getElementById('piechart3').innerHTML);
      });
        d.draw(data3,options3);
        <?php } ?>

        <?php  if(isset($_POST['astyp'])){ ?>
        var data4 = google.visualization.arrayToDataTable([
          ['Task', 'value'],
          <?php 
          $astype =array();
            $result = $conn->query($sqltype);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $text = "['".$row['asset_type_name']."' , ".$row['cnt']."]";
              array_push($astype,$text);
               }
       }
        for($i = 0; $i<count($astype); $i++){
          if($i == (count($astype)-1)){
            echo $astype[$i];
          }
          else {
            echo $astype[$i].",";
          }
          
        }
       ?>
        ]);
        var options4 = {
          title: 'ภาพรวมประเภทครุภัณฑ์'
        };
        var d = new google.visualization.PieChart(document.getElementById('piechart4'));
        google.visualization.events.addListener(d, 'ready', function () {
         
          img4 = '<img src="' + d.getImageURI() + '">';
          img6 = "60";
        console.log(document.getElementById('piechart4').innerHTML);
      });

        d.draw(data4,options4);
        <?php } 
        if(!isset($_POST['astyp']) && !isset($_POST['ustat']) && !isset($_POST['respers']) && !isset($_POST['asroom'])){  
        ?>
 var data5 = google.visualization.arrayToDataTable([
          ['Task', 'value'],
          <?php 
          $astype =array();
            $result = $conn->query($sqltype);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $text = "['".$row['asset_type_name']."' , ".$row['cnt']."]";
              array_push($astype,$text);
               }
       }
        for($i = 0; $i<count($astype); $i++){
          if($i == (count($astype)-1)){
            echo $astype[$i];
          }
          else {
            echo $astype[$i].",";
          }
          
        }
       ?>
        ]);
        var options5 = {
          title: 'ภาพรวมประเภทครุภัณฑ์'
        };
        var d = new google.visualization.PieChart(document.getElementById('piechart5'));
        google.visualization.events.addListener(d, 'ready', function () {
         
          img5 = '<img src="' + d.getImageURI() + '">';
         
        console.log(document.getElementById('piechart5').innerHTML);
      });

        d.draw(data5,options5);


        
        
        <?php } ?>
        
      
      }
     
    </script>
