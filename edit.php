<?php session_start();
include('condb.php');

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
			<h2>ข้อมูลแอปพลิเคชั่น &raquo; แก้ไขข้อมูล</h2>
			<hr />

			<?php
            $id = $_GET['id'];
            $sql = mysqli_query($con, "SELECT * FROM appdata WHERE id='$id'");
            if (mysqli_num_rows($sql) == 0) {
                header("Location: index.php");
            } else {
                $row = mysqli_fetch_assoc($sql);
            }
            if (isset($_POST['save'])) {
                $id		     = $_POST['id'];
                $appname		     = $_POST['appname'];
                $contact_point	 = $_POST['contact_point'];
                $project_start	 = $_POST['project_start'];
                $description		     = $_POST['description'];
                $status			 = $_POST['status'];

                $update = mysqli_query($con, "UPDATE appdata SET appname='$appname', contact_point='$contact_point', project_start='$project_start', description='$description', status='$status' WHERE id='$id'") or die(mysqli_error());
                if ($update) {
                    header("Location: edit.php?id=".$id."&pesan=sukses");
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่สามารถบันทึกได้ โปรดลองอีกครั้ง.</div>';
                }
            }

            if (isset($_GET['pesan']) == 'sukses') {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>บันทึกข้อมูลเรียบร้อยแล้ว.</div>';
                // Redirect to another page
                header("refresh: 1; url=app.php");
            }
            ?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">ID</label>
					<div class="col-sm-2">
						<input type="text" name="id" value="<?php echo $row ['id']; ?>" class="form-control" placeholder="id" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">AppName</label>
					<div class="col-sm-4">
							<input type="text" name="appname" value="<?php echo $row ['appname']; ?>" class="form-control" placeholder="appname" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Description</label>
					<div class="col-sm-4">
						<textarea name="description" class="form-control" placeholder="description"><?php echo $row ['description']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Contact Point</label>
					<div class="col-sm-4">
            <input type="text" name="contact_point" value="<?php echo $row ['contact_point']; ?>" class="form-control" placeholder="Tempat Lahir" required>
        </div>
					</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ProjectStart</label>
					<div class="col-sm-2">
						<input type="date" name="project_start" value="<?php echo $row ['project_start']; ?>" class="form-control" id="dateofbirth" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
					</div>
        </div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
							<option value="">-  สถานะล่าสุด  -</option>
                            <option value="กำลังดำเนินการ">กำลังดำเนินการ</option>
							<option value="ยังไม่แล้วเสร็จ">ยังไม่แล้วเสร็จ</option>
							<option value="ดำเนินการเสร็จสิ้น">ดำเนินการเสร็จสิ้น</option>
						</select>
					</div>
                    <div class="col-sm-3">
                    <b>สถานะปัจจุบัน :</b> <span class="label label-info"><?php echo $row['status']; ?></span>
				    </div>
                </div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="บันทึก">
						<a href="app.php" class="btn btn-sm btn-danger">ยกเลิก</a>
					</div>
				</div>
			</form>
		</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>
  </div>
</div>
<footer class="container-fluid text-center">
  <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
  <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application tracking system แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
</footer>
  </body>
</html>
