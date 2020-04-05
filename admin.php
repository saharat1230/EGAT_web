<?php session_start();
include('condb.php');
$page=$_GET['page'];
$strSearch=$_GET['strSearch'];

  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
    if ($level!='ADMIN') {
        Header("Location: login.php");
    }
      ?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8'/>
    <meta name='viewport'
      content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
    <title>Application Tracking</title>
    <link rel="stylesheet" href="css/w3-animate-top.css" />
    <link rel='stylesheet' href='css/stylesheet.css'/>
    <link rel='stylesheet' href='css/grid.css'/>
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="dist/jquery.preloader.min.js"></script>
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
            <a class="navbar-brand" href=""><b>AppTrack</b></a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <form action="logout.php">
              <a class="navbar-brand"> <p> สวัสดี คุณ <?php echo $name; ?> สถานะ <?php echo $level; ?></p> </a>
              <a href=javascript:if(confirm('ยืนยันการออกจากระบบ')==true){window.location='logout.php';} <button class="btn btn-danger navbar-btn"> ออกจากระบบ </a>
              </form>
            </ul>
          </div>
        </div>
        </nav>
    <div class='page'>
  <div class='section content'>
    <div class="w3-container w3-center w3-animate-top">
      <?php
      if($strSearch=="Y"){
        $Qtotal = mysqli_query($con,"select * from appdata Where ".$Search2." like '%".$Search."%'  ");
      }else{
        $Qtotal = mysqli_query($con,"select * from appdata");
      }
        $total_data = mysqli_num_rows($Qtotal);
        ?>
            <?php
              printf('<h2><b> มีแอปพลิเคชั่นที่รอให้จัดการอยู่ <font color="#20B2AA"> %d </font> รายการ </b></h2> ',$total_data);
            ?>
            <div class="grid-container">
              <a href="add.php" title="เพิ่มข้อมูลแอปพลิเคชั่น" class="myButton"><div><center>เพิ่มแอปพลิเคชั่น<br><br> <img src="img\01.png" width="150" height="150"></center></div></a>
              <a href="app.php" title="จัดการแอปพลิเคชัน" class="myButton"><div><center>จัดการแอปพลิเคชั่น <br><br> <img src="img\03.png" width="150" height="150"></center></div></a>
              <a href="inventory.php" title="ข้อมูล Application Inventory กทห-ห." class="myButton"><div><center>ข้อมูล Application Inventory กทห-ห. <br><br> <img src="img\02.png" width="150" height="150"></center></div></a>
            </div>
          </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
  <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application Tracking System แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
</footer>
  </body>
</html>
