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
    <link rel='stylesheet' href='css/stylesheet.css'/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <body>
    <!-- There's nothing here! -->
      <nav class="navbar-inverse navbar-fixed-top">
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
        </div>
        </nav>
        <div class="container">
          <div class="content">
          <h2>จัดการแอปพลิเคชัน</h2>
    			<h2>จัดการแอปพลิเคชัน</h2>

    			<?php
                if (isset($_GET['aksi']) == 'delete') {
                    $id = $_GET['id'];
                    $cek = mysqli_query($con, "SELECT * FROM appdata WHERE id='$id'");
                    if (mysqli_num_rows($cek) == 0) {
                        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ไม่พบข้อมูล</div>';
                    } else {
                        $delete = mysqli_query($con, "DELETE FROM appdata WHERE id='$id'");
                        if ($delete) {
                            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ลบข้อมูลสำเร็จแล้ว</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ข้อมูลไม่สามารถลบได้</div>';
                        }
                    }
                }
                ?>

          <form class="form-inline" method="get">
            <a href="add.php" class="btn btn-sm btn-success">เพิ่มแอปพลิเคชั่น</a>
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">--ตัวกรองข้อมูลแอปพลิเคชั่น--</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : null);  ?>
						<option value="ดำเนินการเสร็จสิ้น" <?php if ($filter == 'ดำเนินการเสร็จสิ้น') {
                    echo 'selected';
                } ?>>ดำเนินการเสร็จสิ้น</option>
						<option value="ยังไม่แล้วเสร็จ" <?php if ($filter == 'ยังไม่แล้วเสร็จ') {
                    echo 'selected';
                } ?>>ยังไม่แล้วเสร็จ</option>
                        <option value="กำลังดำเนินการ" <?php if ($filter == 'กำลังดำเนินการ') {
                    echo 'selected';
                } ?>>กำลังดำเนินการ</option>
					</select>
				</div>
			</form>
    </br>
    			<div class="table-responsive">
    			<table class="table table-striped table-hover">
    				<tr>
                        <th>#</th>
    					<th>ID</th><th>AppName</th>
                        <th>Description</th>
                        <th>Contact Point	</th>
    					<th>ProjectStart</th>
    					<th>ProjectEnd</th>
    					<th>Status</th>
                        <th>จัดการ</th>
    				</tr>

    				<?php
                    if ($filter) {
                        $sql = mysqli_query($con, "SELECT * FROM appdata WHERE status='$filter' ORDER BY id ASC");
                    } else {
                        $sql = mysqli_query($con, "SELECT * FROM appdata ORDER BY id ASC");
                    }
                    if (mysqli_num_rows($sql) == 0) {
                        echo '<tr><td colspan="8">ไม่มีข้อมูล.</td></tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($sql)) {
                          echo '
    						<tr>
    							<td>'.$no.'</td>
                  <td>'.$row['id'].'</td>
    							<td><a href="profile.php?id='.$row['id'].'">'.$row['appname'].'</a></td>
                                <td>'.$row['description'].'</td>
                                <td>'.$row['contact_point'].'</td>
    							<td>'.$row['project_start'].'</td>
                                <td>'.$row['tanggal_lahir'].'</td>
    							<td>';
                            if ($row['status'] == 'ดำเนินการเสร็จสิ้น') {
                                echo '<span class="label label-success">ดำเนินการเสร็จสิ้น</span>';
                            } elseif ($row['status'] == 'ยังไม่แล้วเสร็จ') {
                                echo '<span class="label label-info">ยังไม่แล้วเสร็จ</span>';
                            } elseif ($row['status'] == 'กำลังดำเนินการ') {
                                echo '<span class="label label-warning">กำลังดำเนินการ</span>';
                            }
                            echo '
    							</td>
    							<td>

    								<a href="edit.php?id='.$row['id'].'" title="แก้ไขข้อมูล" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
    							</td>
    						</tr>
    						';
                            $no++;
                        }
                      }
                    ?>
                  </table>
                </div>
        </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <center><a href="admin.php" class="btn btn-sm btn-default">กลับเมนูหลัก</a></center>
          <br>
        <footer class="container-fluid text-center">
        <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
        <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application tracking system แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
        </footer>
  </body>
</html>
