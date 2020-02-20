<?php session_start();
include('condb.php');

  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
    if ($level!='Member') {
        Header("Location: index.php");
    }
      ?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8'/>
    <meta name='viewport'
      content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
    <title>Responsive Design</title>
    <link rel="stylesheet" href="css/w3-animate-top.css" />
    <link rel='stylesheet' href='css/stylesheet.css'/>
    <link rel='stylesheet' href='css/grid.css'/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- There's nothing here! -->
      <nav class="navbar-inverse">
        <div class="container-fluid">
    <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"> <font size ="6px"color="#024DA1"><b>AppTrack</b></font> </a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <form action="logout.php">
              <a class="navbar-brand"> <p> สวัสดี คุณ <?php echo $name; ?> สถานะ <?php echo $level; ?></p> </a>
              <a href=javascript:if(confirm('ยืนยันการออกจากระบบ')==true){window.location='logout.php';} <button class="btn btn-danger navbar-btn"> ออกจากระบบ </a>
            </ul>
          </div>
        </div>
        </nav>
    <div class='page'>
  <div class='section content'>
    <div class="w3-container w3-center w3-animate-top">
            <center><h2>มีแอปพลิเคชั่นที่กำลังใช้งานอยู่  รายการ</h2></center>
            <div class="grid-container">
              <a href="managementapp.php" class="myButton"><div><center>จัดการแอปพลิเคชั่น<br><br> <img src="img\03.png" width="150" height="150"></center></div></a>
              <a href="inventoryapp.php" class="myButton"><div><center>ข้อมูล EGAT Application Inventory<br><br> <img src="img\02.png" width="150" height="150"></center></div></a>
            </div>
          </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
  <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application tracking system แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
</footer>
  </body>
</html>
