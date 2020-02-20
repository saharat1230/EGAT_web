<?php session_start();
include("condb.php");

$ID = $_SESSION['ID'];
$name = $_SESSION['name'];
$level = $_SESSION['level'];
    if ($level!='ADMIN') {
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
	<div class="container">
		<div class="content">
			<h2> ข้อมูลแอปพลิเคชั่น &raquo; สถานะ </h2>
			<hr />

			<?php
            $nik = $_GET['nik'];

            $sql = mysqli_query($con, "SELECT * FROM karyawan WHERE nik='$nik'");
            if (mysqli_num_rows($sql) == 0) {
                header("Location: app.php");
            } else {
                $row = mysqli_fetch_assoc($sql);
            }

            if (isset($_GET['aksi']) == 'delete') {
                $delete = mysqli_query($con, "DELETE FROM karyawan WHERE nik='$nik'");
                if ($delete) {
                    echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ลบข้อมูลสำเร็จแล้ว.</div>';
                    header("refresh: 1; url=app.php");
                } else {
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่สามารถลบได้.</div>';
                }
            }
            ?>

			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">ID</th>
					<td><?php echo $row['nik']; ?></td>
				</tr>
				<tr>
					<th>AppName</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>Description</th>
					<td><?php echo $row['alamat']; ?></td>
				</tr>
				<tr>
					<th>Contact Point</th>
					<td><?php echo $row['tempat_lahir']; ?></td>
				</tr>
				<th>ProjectStart</th>
				<td><?php echo $row['tanggal_lahir']; ?></td>
			</tr>
			<th>ProjectEndtart</th>
			<td><?php echo $row['tanggal_lahir']; ?></td>
		</tr>
					<th>Status</th>
					<td><?php echo $row['status']; ?></td>
				</tr>
			</table>

			<a href="app.php" class="btn btn-sm btn-info">ย้อนกลับ</a>
			<a href="edit.php?nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-success"></span>แก้ไขข้อมูล</a>
			<a href="profile.php?aksi=delete&nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูล <?php echo $row['nama']; ?>')"></span> ลบข้อมูล</a>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<footer class="container-fluid text-center">
	  <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
	  <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application tracking system แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
	</footer>
</body>
</html>
