<!DOCTYPE html><?php SESSION_START(); $_SESSION['b'] = 1; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
</head>
<body>
<a href="assetinsert.php"><button type="button" class="btn btn-danger">เพิ่มครุภัณฑ์เดี่ยว</button></a>
<a href="multi_insert_form.php"><button type="button" class="btn btn-success">เพิ่มครุภัณฑ์ชุด</button></a>
<a href="Assetpremanage.php"><button type="button" class="btn btn-success">เพิ่มครุภัณฑ์ระบบ</button></a>
<a href="Search.php"><button type="button" class="btn btn-success">ค้นหาและแก้ไขข้อมูลครุภัณฑ์</button></a>
</body>
</html>