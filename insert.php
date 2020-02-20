<?php session_start();
include('condb.php');

  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
    if ($level!='ADMIN') {
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
        <div class="content">
    <h2>ข้อมูลแอปพลิเคชั่น &raquo; เพิ่มข้อมูล</h2>
    			<hr />

    			<?php
    			if(isset($_POST['add'])){
    				$nik		     = $_POST['nik'];
    				$nama		     = $_POST['nama'];
    				$tempat_lahir	 = $_POST['tempat_lahir'];
    				$tanggal_lahir	 = $_POST['tanggal_lahir'];
    				$alamat		     = $_POST['alamat'];
    				$no_telepon		 = $_POST['no_telepon'];
    				$jabatan		 = $_POST['jabatan'];
    				$status			 = $_POST['status'];
    				$username		 = $_POST['username'];
    				$pass1	         = $_POST['pass1'];
    				$pass2           = $_POST['pass2'];

    				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");
    				if(mysqli_num_rows($cek) == 0){
    					if($pass1 == $pass2){
    						$pass = md5($pass1);
    						$insert = mysqli_query($koneksi, "INSERT INTO karyawan(nik, nama, tempat_lahir, tanggal_lahir, alamat, no_telepon, jabatan, status, username, password)
    														VALUES('$nik','$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telepon', '$jabatan', '$status', '$username', '$pass')") or die(mysqli_error());
    						if($insert){
    							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Di Simpan.</div>';
    						}else{
    							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Karyawan Gagal Di simpan !</div>';
    						}
    					} else{
    						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Tidak sama !</div>';
    					}
    				}else{
    					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Sudah Ada..!</div>';
    				}
    			}
    			?>

    			<form class="form-horizontal" action="" method="post">
    				<div class="form-group">
    					<label class="col-sm-5 control-label">NIK</label>
    					<div class="col-sm-5">
    						<input type="text" name="nik" class="form-control" placeholder="NIK" required>
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">Nama</label>
    					<div class="col-sm-5">
    						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">Tempat Lahir</label>
    					<div class="col-sm-5">
    						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">Tanggal Lahir</label>
    					<div class="col-sm-4">
    						<input type="text" name="tanggal_lahir" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">Alamat</label>
    					<div class="col-sm-5">
    						<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">No Telepon</label>
    					<div class="col-sm-3">
    						<input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">Jabatan</label>
    					<div class="col-sm-5">
    						<select name="jabatan" class="form-control" required>
    							<option value=""> ----- </option>
    							<option value="Operator">Operator</option>
    							<option value="Leader">Leader</option>
                                <option value="Supervisor">Supervisor</option>
    							<option value="Manager">Manager</option>
    						</select>
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">Status</label>
    					<div class="col-sm-5">
    						<select name="status" class="form-control">
    							<option value=""> ----- </option>
                                <option value="Outsourcing">Outsourcing</option>
    							<option value="Kontrak">การทำสัญญา</option>
    							<option value="Tetap">คงที่</option>
    						</select>
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">Username</label>
    					<div class="col-sm-5">
    						<input type="text" name="username" class="form-control" placeholder="Username">
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">Password</label>
    					<div class="col-sm-5">
    						<input type="password" name="pass1" class="form-control" placeholder="Password">
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-5 control-label">Ulangi Password</label>
    					<div class="col-sm-5">
    						<input type="password" name="pass2" class="form-control" placeholder="Ulangi Password">
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-sm-3 control-label">&nbsp;</label>
    					<div class="col-sm-6">
              </br>
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

  </div>
</div>
<footer class="container-fluid text-center">
  <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
  <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application tracking system แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
</footer>
  </body>
</html>
