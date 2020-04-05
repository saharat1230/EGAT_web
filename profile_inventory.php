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

            $sql = mysqli_query($con, "SELECT * FROM inventoryapp WHERE id='$id'");
            if (mysqli_num_rows($sql) == 0) {
                header("Location: app.php");
            } else {
                $row = mysqli_fetch_assoc($sql);
            }

            if (isset($_GET['action']) == 'delete') {
                $delete = mysqli_query($con, "DELETE FROM inventoryapp WHERE id='$id'");
                if ($delete) {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ลบข้อมูลสำเร็จแล้ว.</div>';
                    header("refresh: 1; url=inventory.php");
                } else {
                    echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่สามารถลบได้.</div>';
                }
            }
            ?>
            <div class="panel panel-default">
			<table class="table table-striped table-condensed">
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
					<th>URL</th>
					<td><?php echo $row['url']; ?></td>
				</tr>
				<tr>
					<th>Contact Point</th>
					<td><?php echo $row['contact_point']; ?></td>
				</tr>
        <tr>
					<th>Phone Number</th>
					<td><?php echo $row['phone_number']; ?></td>
				</tr>
				<th>ProjectStart</th>
				<td><?php echo $row['project_start']; ?></td>
			   </tr>
         <th>ProjectEnd</th>
 				<td><?php echo $row['project_end']; ?></td>
 			   </tr>
					<th>Status</th>
					<td><?php echo $row['status']; ?></td>
				</tr>
			</table>
    </div>
      <br>
			<a href="profile_inventory.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูล <?php echo $row['appname']; ?>')"></span> ลบข้อมูล</a>
      <center><a href="inventory.php" class="btn btn-sm btn-default">ย้อนกลับ</a>&nbsp;<a href="admin.php" class="btn btn-sm btn-default">กลับเมนูหลัก</a></center>
      </br>
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
