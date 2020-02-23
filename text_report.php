<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="CSS/css_report.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php require 'nav.php'; ?>
    <div class="testbox">
      <form action="/">
        <h1>ออกเอกสารบันทึกข้อความ</h1>
        <div class="item">
          <p>ส่วนราชการ</p>
          <div>
            <input type="text" name="major" />
          </div>
        </div>
        <div class="item">
          <p>โทร</p>
          <input type="text" name="tel"/>
        </div>
        <div class="item">
          <p>ฉบับที่</p>
          <div>
            <input type="text" name="number" />
          </div>
        </div>
        <div class="item">
          <p>เรียนถึง</p>
          <div>
            <input type="text" name="to" />
          </div>
        </div>
        <div class="item">
          <p>วันที่</p>
          <input type="date" name="tdate" required/>
          <i class="fas fa-calendar-alt"></i>
        </div>
        <!-- <div class="item">
          <p>Your department</p>
          <select>
            <option value="">*Please select*</option>
            <option value="A">Department A</option>
            <option value="B">Department B</option>
            <option value="C">Department C</option>
            <option value="D">Department D</option>
            <option value="E">Department E</option>
          </select>
        </div> -->
        <div class="item">
          <p>หัวหน้าสาขา</p>
          <input type="text" name="hmajor"/>
        </div>
        <div class="item">
          <p>ข้อความ</p>
          <textarea name="text" rows="5"></textarea>
        </div>
        <div class="item">
          <p>จึงเรียนเพื่อโปรจพิจารณาอนุมัติ</p>
          <textarea name="approve_text" rows="5"></textarea>
        </div>
       
        <div class="btn-block">
          <button type="submit" href="/">Send</button>
        </div>
      </form>
    </div>
  </body>
</html>
<?php require 'footer.php'; ?>