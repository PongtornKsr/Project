<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Css/BG.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <body background="img/BG.png">
          <nav class="navbar navbar-light" style="background-color: #B3EE3A;">
            
            <a class="navbar-brand" href="Home.html">
                    <img src="img/logomini.png" width="80" height="30" alt="">
            </a>
            <ul class="nav justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link" href="indexAdmin.php">home</a>
                    </li>
                    <li class="nav-item">
                      <div class="nav-item dropdown">
                        <a href = "" class="nav-link dropdown-toggle" data-toggle="dropdown">Report</a>
                        <div class="dropdown-menu">
                          <a href="text_report.php" class="dropdown-item">พิมพ์บันทึกข้อความ</a>
                          <a href="p4_report.php" class="dropdown-item">พิมพ์พ.ส.4</a>
                          <a href="check_report.php" class="dropdown-item">พิมพ์ใบตรวจสอบครุภัณฑ์</a>
                        </div>
                    </li>
                    <li class="nav-item">
                      <div class="nav-item dropdown">
                        <a href="insert.html" class="nav-link dropdown-toggle" data-toggle="dropdown">AccountManage</a>
                        <div class="dropdown-menu">
                          <a href="AccountManage.php" class="dropdown-item">ค้นหาและจัดการผู้ใช้</a>
                          <a href="userinsert.php" class="dropdown-item">เพิ่มผู้ใช้ใหม่</a>
                          <a href="profile_edit.php" class="dropdown-item">แก้ไขข้อมูลส่วนตัว</a>
                        </div>
                    </li>
                    <li class="nav-item">
                      <div class="nav-item dropdown">
                        <a href="insert.html" class="nav-link dropdown-toggle" data-toggle="dropdown">AssetManage</a>
                        <div class="dropdown-menu">
                          <a href="assetinsert.php" class="dropdown-item">เพิ่มครุภัณฑ์เดี่ยว</a>
                          <a href="multi_insert_form.php" class="dropdown-item">เพิ่มครุภัณฑ์ชุด</a>
                          <a href="" class="dropdown-item">เพิ่มครุภัณฑ์ติดอาคาร</a>
                          <a href="Search.php" class="dropdown-item">ค้นหาและแก้ไขข้อมูลครุภัณฑ์</a>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                  </ul>
          </nav>