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
    <meta name='viewport'content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
    <title>Application Tracking</title>
    <link rel='stylesheet' href='css/stylesheet.css'/>
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
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
        </nav>
        <div class="container">
      		<div class="content">

			<?php
            $id = $_GET['id'];
            $sql = mysqli_query($con, "SELECT * FROM appdata WHERE id='$id'");
            if (mysqli_num_rows($sql) == 0) {
                header("Location: ");
            } else {
                $row = mysqli_fetch_assoc($sql);
            }
            if (isset($_POST['save'])) {
                $appname		     = $_POST['appname'];
                $contact_point	 = $_POST['contact_point'];
                $phone_number    = $_POST['phone_number'];
                $project_start	 = $_POST['project_start'];
                $project_end     = $_POST['project_end'];
                $description		 = $_POST['description'];
                $status			 = $_POST['status'];
///detail1
                $detail_name = $_POST['detail_name'];
                $percent = $_POST['percent'];
                $date_start = $_POST['date_start'];
                $date_complete = $_POST['date_complete'];
                $date_end = $_POST['date_end'];
                $total = $_POST['total'];
///detail2
                $detail_name_1 = $_POST['detail_name_1'];
                $percent_1 = $_POST['percent_1'];
                $date_start_1 = $_POST['date_start_1'];
                $date_complete_1 = $_POST['date_complete_1'];
                $date_end_1 = $_POST['date_end_1'];
                $total_1 = $_POST['total_1'];
///detail3
                $detail_name_2 = $_POST['detail_name_2'];
                $percent_2 = $_POST['percent_2'];
                $date_start_2 = $_POST['date_start_2'];
                $date_complete_2 = $_POST['date_complete_2'];
                $date_end_2 = $_POST['date_end_2'];
                $total_2 = $_POST['total_2'];
///detail4
                $detail_name_3 = $_POST['detail_name_3'];
                $percent_3 = $_POST['percent_3'];
                $date_start_3 = $_POST['date_start_3'];
                $date_complete_3 = $_POST['date_complete_3'];
                $date_end_3 = $_POST['date_end_3'];
                $total_3 = $_POST['total_3'];
///detail5
                $detail_name_4 = $_POST['detail_name_4'];
                $percent_4 = $_POST['percent_4'];
                $date_start_4 = $_POST['date_start_4'];
                $date_complete_4 = $_POST['date_complete_4'];
                $date_end_4 = $_POST['date_end_4'];
                $total_4 = $_POST['total_4'];

                $update = mysqli_query($con, "UPDATE appdata SET appname='$appname', contact_point='$contact_point', phone_number='$phone_number', project_start='$project_start', project_end='$project_end', description='$description', status='$status',
                   detail_name='$detail_name', percent='$percent', date_start='$date_start', date_complete='$date_complete', date_end='$date_end', total='$total',
                   detail_name_1='$detail_name_1', percent_1='$percent_1', date_start_1='$date_start_1', date_complete_1='$date_complete_1', date_end_1='$date_end_1', total_1='$total_1',
                   detail_name_2='$detail_name_2', percent_2='$percent_2', date_start_2='$date_start_2', date_complete_2='$date_complete_2', date_end_2='$date_end_2', total_2='$total_2',
                   detail_name_3='$detail_name_3', percent_3='$percent_3', date_start_3='$date_start_3', date_complete_3='$date_complete_3', date_end_3='$date_end_3', total_3='$total_3',
                   detail_name_4='$detail_name_4', percent_4='$percent_4', date_start_4='$date_start_4', date_complete_4='$date_complete_4', date_end_4='$date_end_4', total_4='$total_4' WHERE id='$id'") or die(mysqli_error());
                if ($update) {
                    header("Location: edit.php?id=".$id."&message=success");
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ข้อมูลไม่สามารถบันทึกได้ โปรดลองอีกครั้ง.</div>';
                }
            }

            if (isset($_GET['message']) == 'success') {
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>บันทึกข้อมูลเรียบร้อยแล้ว.</div>';
                // Redirect to another page
                header("refresh: 1; url=app.php");
            }
            ?>
    <div class="container">
  <h2><b>ข้อมูลแอปพลิเคชั่น &raquo; แก้ไขข้อมูล</b></h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">แก้ไขข้อมูล</a></li>
    <li><a data-toggle="tab" href="#menu1">อัปเดทผลการดำเนินงาน</a></li>
  </ul>
<form class="form-horizontal" action="" method="post">
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
				<div class="form-group">
          <br>
					<label class="col-sm-3 control-label">ID</label>
					<div class="col-sm-2">
						<input type="text" name="id" value="<?php echo $row ['id']; ?>" class="form-control" disabled="disabled" placeholder="รหัสแอปพลิเคชั่น" required onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">AppName</label>
					<div class="col-sm-4">
							<input type="text" name="appname" value="<?php echo $row ['appname']; ?>" class="form-control" placeholder="ชื่อแอปพลิเคชั่น" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Description</label>
					<div class="col-sm-4">
						<textarea name="description" class="form-control" placeholder="คำอธิบายแอปพลิเคชั่น"><?php echo $row ['description']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Contact Point</label>
					<div class="col-sm-3">
            <input type="text" name="contact_point" value="<?php echo $row ['contact_point']; ?>" class="form-control" placeholder="ติดต่อ" required>
        </div>
					</div>
          <div class="form-group">
  					<label class="col-sm-3 control-label">Phone Number</label>
  					<div class="col-sm-2">
              <input type="text" name="phone_number" value="<?php echo $row ['phone_number']; ?>" class="form-control" placeholder="หมายเลขโทรศัพท์" required onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}">
          </div>
  					</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ProjectStart</label>
					<div class="col-sm-2">
						<input type="date" name="project_start" value="<?php echo $row ['project_start']; ?>" class="form-control" id="dateofbirth" date="" data-date-format="dd-mm-yyyy" placeholder="" required>
					</div>
        </div>
        <div class="form-group">
					<label class="col-sm-3 control-label">ProjectEnd</label>
					<div class="col-sm-2">
						<input type="date" name="project_end" value="<?php echo $row ['project_start']; ?>" class="form-control" id="dateofbirth" date="" data-date-format="dd-mm-yyyy" placeholder="" required>
					</div>
        </div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
              <option value="กำลังดำเนินการ">กำลังดำเนินการ</option>
							<option value="ยังไม่แล้วเสร็จ">ยังไม่แล้วเสร็จ</option>
							<option value="ดำเนินการเสร็จสิ้น">ดำเนินการเสร็จสิ้น</option>
						</select>
					</div>
          <div class="col-sm-3">
            <b>สถานะปัจจุบัน :</b> <span class="label label-info"><?php echo $row['status']; ?></span>
				 </div>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <br>
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
        <form class="form-horizontal" action="" method="post">
          <tr>
            <td class="col-sm-4">
              <input type="text" name="detail_name" value="<?php echo $row ['detail_name']; ?>" class="form-control" placeholder="ผลการดำเนินงาน...">
            </td>
            <td class="col-sm-1">
              <input type="text" name="percent" value="<?php echo $row ['percent']; ?>" class="form-control" placeholder="">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_start" value="<?php echo $row ['date_start'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_complete" value="<?php echo $row ['date_complete']; ?>" class="form-control"  placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_end" value="<?php echo $row ['date_end'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-1">
              <input type="text" name="total" value="<?php echo $row ['total'];?>" class="form-control" placeholder="">
            </td>
          </tr>
          <tr>
            <td class="col-sm-4">
              <input type="text" name="detail_name_1" value="<?php echo $row ['detail_name_1']; ?>" class="form-control" placeholder="ผลการดำเนินงาน...">
            </td>
            <td class="col-sm-1">
              <input type="text" name="percent_1" value="<?php echo $row ['percent_1']; ?>" class="form-control" placeholder="">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_start_1" value="<?php echo $row ['date_start_1'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_complete_1" value="<?php echo $row ['date_complete_1']; ?>" class="form-control"  placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_end_1" value="<?php echo $row ['date_end_1'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-1">
              <input type="text" name="total_1" value="<?php echo $row ['total_1'];?>" class="form-control" placeholder="">
            </td>
          </tr>
          <tr>
            <td class="col-sm-4">
              <input type="text" name="detail_name_2" value="<?php echo $row ['detail_name_2']; ?>" class="form-control" placeholder="ผลการดำเนินงาน...">
            </td>
            <td class="col-sm-1">
              <input type="text" name="percent_2" value="<?php echo $row ['percent_2']; ?>" class="form-control" placeholder="">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_start_2" value="<?php echo $row ['date_start_2'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_complete_2" value="<?php echo $row ['date_complete_2']; ?>" class="form-control"  placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_end_2" value="<?php echo $row ['date_end_2'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-1">
              <input type="text" name="total_2" value="<?php echo $row ['total_2'];?>" class="form-control" placeholder="">
            </td>
          </tr>
          <tr>
            <td class="col-sm-4">
              <input type="text" name="detail_name_3" value="<?php echo $row ['detail_name_3']; ?>" class="form-control" placeholder="ผลการดำเนินงาน...">
            </td>
            <td class="col-sm-1">
              <input type="text" name="percent_3" value="<?php echo $row ['percent_3']; ?>" class="form-control" placeholder="">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_start_3" value="<?php echo $row ['date_start_3'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_complete_3" value="<?php echo $row ['date_complete_3']; ?>" class="form-control"  placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_end_3" value="<?php echo $row ['date_end_3'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-1">
              <input type="text" name="total_3" value="<?php echo $row ['total_3'];?>" class="form-control" placeholder="">
            </td>
          </tr>
          <tr>
            <td class="col-sm-4">
              <input type="text" name="detail_name_4" value="<?php echo $row ['detail_name_4']; ?>" class="form-control" placeholder="ผลการดำเนินงาน...">
            </td>
            <td class="col-sm-1">
              <input type="text" name="percent_4" value="<?php echo $row ['percent_4']; ?>" class="form-control" placeholder="">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_start_4" value="<?php echo $row ['date_start_4'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_complete_4" value="<?php echo $row ['date_complete_4']; ?>" class="form-control"  placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-2">
              <input type="date" name="date_end_4" value="<?php echo $row ['date_end_4'];?>" class="form-control" placeholder="วว/ดด/ปปป">
            </td>
            <td class="col-sm-1">
              <input type="text" name="total_4" value="<?php echo $row ['total_4'];?>" class="form-control" placeholder="">
            </td>
          </tr>
          </div>
        </table>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-3 control-label">&nbsp;</label>
    <div class="col-sm-6">
      <input type="submit" name="save" class="btn btn-sm btn-primary" value="บันทึก">
      <a href="app.php" class="btn btn-sm btn-danger">ยกเลิก</a>
    </div>
  </div>
  </div>
  </form>
  <br>
  <br>
  <br>
  <br>
  <center><a href="" class=""></a></center>
	</div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
  <script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
  </div>
</div>
<footer class="container-fluid text-center">
  <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
  <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application Tracking System แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
</footer>
  </body>
</html>
