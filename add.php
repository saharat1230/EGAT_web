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
	<link rel='stylesheet' href='css/stylesheet.css'/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latihan MySQLi</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
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
					<a class="navbar-brand" href=""><b>AppTrack</b></font> </a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<form action="logout.php">
						<a class="navbar-brand"> <p> สวัสดี คุณ <?php echo $name; ?> สถานะ <?php echo $level; ?></p> </a>
						<a href=javascript:if(confirm('ยืนยันการออกจากระบบ')==true){window.location='logout.php';} <button class="btn btn-danger navbar-btn"> ออกจากระบบ </a>
						</form>
					</ul>
				</div>
			</nav>
	<div class="container">
		<div class="content">
			<h2>ข้อมูลแอปพลิเคชั่น &raquo; เพิ่มข้อมูล</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$id		     = $_POST['id'];
				$appname		     = $_POST['appname'];
				$contact_point	 = $_POST['contact_point'];
				$project_start	 = $_POST['project_start'];
				$description		     = $_POST['description'];
				$status			 = $_POST['status'];

				$cek = mysqli_query($con, "SELECT * FROM appdata WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0){
					if($pass1 == $pass2){
						$pass = md5($pass1);
						$insert = mysqli_query($con, "INSERT INTO appdata(id, appname, contact_point, project_start, description, status)
														VALUES('$id','$appname', '$contact_point', '$project_start', '$description', '$status')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>บันทึกข้อมูลเรียบร้อยแล้ว.</div>';
							header("refresh: 1; url=app.php");
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Opp! ไม่ข้อมูลไม่สามารถบันทึกได้ !</div>';
							header("refresh: 1; url=add.php");
						}
					} else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> รหัสผ่านไม่เหมือนกัน!</div>';
						header("refresh: 1; url=add.php");
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ID นี้มีอยู่แล้ว!</div>';
					header("refresh: 1; url=aad.php");
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID</label>
					<div class="col-sm-2">
						<input type="text" name="id" class="form-control" placeholder="รหัสแอปพลิเคชั่น" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">AppName</label>
					<div class="col-sm-4">
						<input type="text" name="appname" class="form-control" placeholder="ชื่อแอปพลิเคชั่น" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Description</label>
					<div class="col-sm-3">
						<textarea name="description" class="form-control" placeholder="คำอธิบายแอปพลิเคชั่น"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Contact Point</label>
					<div class="col-sm-4">
						<input type="text" name="contact_point" class="form-control" placeholder="ติดต่อ" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ProjectStart</label>
					<div class="col-sm-2">
						<input type="date" name="project_start" class="form-control" id="dateofbirth" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
							<option value=""> ----- </option>
                            <option value="กำลังดำเนินการ">กำลังดำเนินการ</option>
							<option value="ยังไม่แล้วเสร็จ">ยังไม่แล้วเสร็จ</option>
							<option value="ดำเนินการเสร็จสิ้น">ดำเนินการเสร็จสิ้น</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="บันทึก">
						<a href="admin.php" class="btn btn-sm btn-danger">ยกเลิก</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
	<footer class="container-fluid text-center">
	  <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
	  <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application tracking system แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
	</footer>
</body>
</html>
