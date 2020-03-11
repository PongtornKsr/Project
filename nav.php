<body background="img/BG.png" style ="
  background-repeat: no-repeat;
  background-attachment: fixed; ">
         
          <nav class="navbar navbar-light" style="background-color: #B3EE3A;">
          <?php SESSION_START();
                          require 'connect.php';
                          $sql = "SELECT *  FROM userdata WHERE name = '".$_SESSION['Account']."'";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          if($row['profile_ID'] == 1 ){ echo "<a class='navbar-brand' href='indexAdmin.php'>";} 
                            elseif($row['profile_ID'] == 2){ echo "<a class='navbar-brand' href='index.php'>"; }
                          }
                        }
                          ?>
                    <img src="img/logomini.png" width="80" height="30" alt="">
            </a>
            <ul class="nav justify-content-end">
                    <li class="nav-item">
                    <?php SESSION_START();
                          require 'connect.php';
                          $sql = "SELECT *  FROM userdata WHERE name = '".$_SESSION['Account']."'";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          if($row['profile_ID'] == 1 ){ echo "<a class='nav-link' href='indexAdmin.php'>home</a>";} 
                            elseif($row['profile_ID'] == 2){ echo "<a class='nav-link' href='index.php'>home</a>"; }
                          }
                        }
                          ?>
                    </li>
                    
                    <!--<li class="nav-item">
                      <div class="nav-item dropdown">
                        <a href = "" class="nav-link dropdown-toggle" data-toggle="dropdown">รายงาน</a>
                        <div class="dropdown-menu">
                          <a href="text_report.php" class="dropdown-item">พิมพ์ทะเบียนคุมทรัพย์สิน</a>
                        </div>
                    </li>-->
                    <li class="nav-item">
                      <div class="nav-item dropdown">
                        <a href="insert.html" class="nav-link dropdown-toggle" data-toggle="dropdown">จัดการบัญชีผู้ใช้</a>
                        <div class="dropdown-menu">
                          <?php SESSION_START();
                          require 'connect.php';
                          $sql = "SELECT *  FROM userdata WHERE name = '".$_SESSION['Account']."'";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          if($row['profile_ID'] == 1 ){ echo "<a href='AccountManage.php' class='dropdown-item'>ค้นหาและจัดการผู้ใช้</a>
                            <a href='userinsert.php' class='dropdown-item'>เพิ่มผู้ใช้ใหม่</a>
                            <a href='profile_edit.php' class='dropdown-item'>แก้ไขข้อมูลส่วนตัว</a>";} 
                            elseif($row['profile_ID'] == 2){ echo "<a href='profile_edit.php' class='dropdown-item'>แก้ไขข้อมูลส่วนตัว</a>"; }
                          }
                        }
                          ?>
                          

                        </div>
                    </li>
                    <li class="nav-item">
                      <div class="nav-item dropdown">
                        <a href="insert.html" class="nav-link dropdown-toggle" data-toggle="dropdown">จัดการครุภัณฑ์</a>
                        <div class="dropdown-menu">
                        <?php SESSION_START();
                          require 'connect.php';
                          $sql = "SELECT *  FROM userdata WHERE name = '".$_SESSION['Account']."'";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                          if($row['profile_ID'] == 1 ){ //echo "<a href='assetinsert.php' class='dropdown-item'>เพิ่มครุภัณฑ์เดี่ยว</a>";
                           echo "<a href='multi_insert_form.php' class='dropdown-item'>เพิ่มครุภัณฑ์</a>
                            <a href='Search.php' class='dropdown-item'>ค้นหาและแก้ไขข้อมูลครุภัณฑ์</a>"; } 
                            elseif($row['profile_ID'] == 2){ echo "<a href='Search.php' class='dropdown-item'>ค้นหาและแก้ไขข้อมูลครุภัณฑ์</a>"; }
                          }
                        }
                          ?>
                        
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                  </ul>
          </nav>