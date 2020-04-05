<?php session_start();
include("condb.php");

$ID = $_SESSION['ID'];
$name = $_SESSION['name'];
$level = $_SESSION['level'];
    if ($level!='Member') {
        Header("Location: login.php");
    }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet' href='css/stylesheet.css'/>
  <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">

	<title>Application Tracking</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	</style>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
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
	<div class="container">
		<div class="content">
			<h2><b> ข้อมูลแอปพลิเคชั่น &raquo; สถานะ </b></h2>
			<hr />

			<?php
            $id = $_GET['id'];

            $sql = mysqli_query($con, "SELECT * FROM appdata WHERE id='$id'");
            if (mysqli_num_rows($sql) == 0) {
                header("Location: app_member.php");
            } else {
                $row = mysqli_fetch_assoc($sql);
            }

            if (isset($_GET['action']) == 'delete') {
                $delete = mysqli_query($con, "DELETE FROM appdata WHERE id='$id'");
                if ($delete) {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ลบข้อมูลสำเร็จแล้ว.</div>';
                    header("refresh: 1; url=app.php");
                } else {
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่สามารถลบได้.</div>';
                }
            }
            ?>

			<table class="striped table-condensed">
				<tr>
					<th width="20%">ID</th>
					<td><?php echo $row['id']; ?></td>
				</tr>
				<tr>
					<th>AppName</th>
					<td><?php echo $row['appname']; ?></td>
				</tr>
				<tr>
					<th>Description</th>
					<td><?php echo $row['description']; ?></td>
				</tr>
				<tr>
					<th>Contact Point</th>
					<td><?php echo $row['contact_point']; ?></td>
				</tr>
        <tr>
					<th>Phone Number</th>
					<td><?php echo $row['phone_number']; ?></td>
				</tr>
        <tr>
				  <th>ProjectStart</th>
				  <td><?php echo $row['project_start']; ?></td>
			  </tr>
        <tr>
         <th>ProjectEnd</th>
 				 <td><?php echo $row['project_end']; ?></td>
 			  </tr>
					<th>Status</th>
					<td><?php echo $row['status']; ?></td>
				</tr>
			</table>
      <h2><b>ผลการดำเนินงาน</b></h2>
      <div class="panel panel-default">
      <table class="table table-striped table-hover">
        <tr>
          <th>กิจกรรม</th>
          <th>นน.(%)</th>
          <th>เริ่มดำเนินการ</th>
          <th>กำหนดแล้วเสร็จ</th>
          <th>วันที่แล้วเสร็จ</th>
          <th>จำนวน(วัน)</th>
        </tr>
        <tr>
          <td><font color="#20B2AA"><?php echo $row['detail_name']; ?></font></td>
          <td><?php echo $row['percent']; ?></td>
          <td><?php echo $row['date_start']; ?></td>
          <td><?php echo $row['date_complete']; ?></td>
          <td><?php echo $row['date_end']; ?></td>
          <td><?php echo $row['total']; ?></td>
        </tr>
        <tr>
          <td><font color="#20B2AA"><?php echo $row['detail_name_1']; ?></font></td>
          <td><?php echo $row['percent_1']; ?></td>
          <td><?php echo $row['date_start_1']; ?></td>
          <td><?php echo $row['date_complete_1']; ?></td>
          <td><?php echo $row['date_end_1']; ?></td>
          <td><?php echo $row['total_1']; ?></td>
        </tr>
        <tr>
          <td><font color="#20B2AA"><?php echo $row['detail_name_2']; ?></font></td>
          <td><?php echo $row['percent_2']; ?></td>
          <td><?php echo $row['date_start_2']; ?></td>
          <td><?php echo $row['date_complete_2']; ?></td>
          <td><?php echo $row['date_end_2']; ?></td>
          <td><?php echo $row['total_2']; ?></td>
        </tr>
        <tr>
          <td><font color="#20B2AA"><?php echo $row['detail_name_3']; ?></font></td>
          <td><?php echo $row['percent_3']; ?></td>
          <td><?php echo $row['date_start_3']; ?></td>
          <td><?php echo $row['date_complete_3']; ?></td>
          <td><?php echo $row['date_end_3']; ?></td>
          <td><?php echo $row['total_3']; ?></td>
        </tr>
        <tr>
          <td><font color="#20B2AA"><?php echo $row['detail_name_4']; ?></font></td>
          <td><?php echo $row['percent_4']; ?></td>
          <td><?php echo $row['date_start_4']; ?></td>
          <td><?php echo $row['date_complete_4']; ?></td>
          <td><?php echo $row['date_end_4']; ?></td>
          <td><?php echo $row['total_4']; ?></td>
        </tr>
      </table>
    </div>
      <center><a href="app_member.php" class="btn btn-sm btn-default">ย้อนกลับ</a>&nbsp;<a href="member.php" class="btn btn-sm btn-default">กลับเมนูหลัก</a></center>
      </br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <center><a href="" class=""></a></center>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<footer class="container-fluid text-center">
	  <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
	  <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application Tracking System แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
	</footer>
</body>
</html>
