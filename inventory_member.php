<?php session_start();
include('condb.php');
$page=$_GET['page'];
$strSearch=$_GET['strSearch'];

  $ID = $_SESSION['ID'];
  $name = $_SESSION['name'];
  $level = $_SESSION['level'];
    if ($level!='Member') {
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
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- There's nothing here! -->
    <div id="overlay"></div>
      <nav class="navbar-inverse navbar-fixed-top">
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
          <h2>จัดการแอปพลิเคชัน</h2>
    			<h2><b>Inventory Application &raquo; กทห-ห.</b></h2>

    			<?php
                if (isset($_GET['action']) == 'delete') {
                    $id = $_GET['id'];
                    $sql = mysqli_query($con, "SELECT * FROM inventoryapp WHERE id='$id'");
                    if (mysqli_num_rows($sql) == 0) {
                        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ไม่พบข้อมูล</div>';
                    } else {
                        $delete = mysqli_query($con, "DELETE FROM inventoryapp WHERE id='$id'");
                        if ($delete) {
                            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ลบข้อมูลสำเร็จแล้ว</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ข้อมูลไม่สามารถลบได้</div>';
                        }
                    }
                }
                ?>
                <?php
                  $limit = '10';

                  if($strSearch=="Y"){
                    $Qtotal = mysqli_query($con,"select * from inventoryapp Where ".$Search2." like '%".$Search."%'  ");
                  }else{
                    $Qtotal = mysqli_query($con,"select * from inventoryapp");
                  }

                    $total_data = mysqli_num_rows($Qtotal);
                    $total_page= ceil($total_data/$limit);

                    if($page>=$total_page) $page=$total_page;
                    if($page<=0 or $page==''){
                    $start = 0;
                    $page=1;
                  }

                    $start=($page-1)*$limit;

                    $from=$start+1;
                    $to=$page*$limit;
                    if($to>$total_data) $to=$total_data;
                  ?>
                  <br>
          <form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">--ตัวกรองข้อมูลแอปพลิเคชั่น--</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : null);  ?>
						<option value="Active" <?php if ($filter == 'Active') {
                    echo 'selected';
                } ?>>Active</option>
						<option value="In Active" <?php if ($filter == 'In Active') {
                    echo 'selected';
                } ?>>In Active</option>
					</select>
          <input class="form-control" id="myInput" type="text" placeholder="ค้นหา..">
				</div>
			</form>
      <div class='' role='alert' align="right" style='font-weight:bold;'>
            <?php
              printf(' จำนวน %d รายการ ',$total_data);
              echo $from.' - '.$to;
              printf(' | หน้า %d <br />',$page);
            ?>
     </div>
      <br>
      <?php
       $perpage = 10;
       if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
           $page = 1;
        }
        $start = ($page - 1) * $perpage;
        $sql = "select * from inventoryapp limit {$start} , {$perpage} ";
        $query = mysqli_query($con, $sql);
        ?>
    			<div class="table-responsive">
            <div class="panel panel-default">
    			<table class="table table-striped table-hover">
            <tbody id="myTable">
    				<tr>
              <th>#</th>
              <th>AppName</th>
              <th>Description</th>
              <th>URL</th>
              <th>Contact Point	</th>
    					<th>ProjectStart</th>
    					<th>ProjectEnd</th>
    					<th>Status</th>
    				</tr>
    				<?php
                    if ($filter) {
                        $query = mysqli_query($con, "SELECT * FROM inventoryapp WHERE status='$filter' ORDER BY id ASC");
                    } else {
                        $sql = mysqli_query($con, "SELECT * FROM inventoryapp ORDER BY id ASC");
                    }
                    if (mysqli_num_rows($query) == 0) {
                        echo '<tr><td colspan="8">ไม่มีข้อมูล.</td></tr>';
                    } else {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '
                            <tr>
                								<td>'.(($page > 1) ? strval($page - 1).strval($no) : $no ).'</td>
                							<td><a href="profile_inventory_member.php?id='.$row['id'].'">'.$row['appname'].'</a></td>
                                            <td>'.$row['description'].'</td>
                                            <td><a href="'.$row['url'].'"target="_blank">'.$row['url'].'</a></td>
                                            <td>'.$row['contact_point'].'</td>
                							<td>'.$row['project_start'].'</td>
                                            <td>'.$row['project_end'].'</td>
                							<td>';
                                        if ($row['status'] == 'Active') {
                                            echo '<h4><span class="label label-success">Active</h4></span>';
                                        } elseif ($row['status'] == 'In Active') {
                                            echo '<h4><span class="label label-danger">in Active</h4></span>';
                                        }
                                        echo '
    							</td>
    						</tr>
    						';

                            $no++;
                        }
                    }
                    ?>
                  </tbody>
                  </table>
                </div>
                  <?php
                  $sql2 = "select * from inventoryapp ";
                  $query2 = mysqli_query($con, $sql2);
                  $total_record = mysqli_num_rows($query2);
                  $total_page = ceil($total_record / $perpage);
                  ?>
                  <nav>
                    <ul class="pagination">
                      <li>
                        <a href="inventory_member.php?page=1" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <?php for ($i=1;$i<=$total_page;$i++) { ?>
                        <li><a href="inventory_member.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                      <?php } ?>
                      <li>
                        <a href="inventory_member.php?page=<?php echo $total_page;?>" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <script>
                  $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                      var value = $(this).val().toLowerCase();
                      $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                      });
                    });
                  });
                </script>
                  <center><a href="member.php" class="btn btn-sm btn-default">กลับเมนูหลัก</a></center>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br >
                  <center><a href="" class=""></a></center>
                </div>
              </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">
        $(function(){
            $("#overlay").fadeOut();
            $(".main-contain").removeClass("main-contain");
        });
        </script>
        <footer class="container-fluid text-center">
        <center><img src="img\EGAT_Logo.png" class="img-responsive" width="5%" alt="Footer Image" /></center>
        <p><h5>Copyright 2020 : ระบบติดตามแอปพลิเคชั่น Application Tracking System แผนก หรจ-ห. กอง กทห-ห. ฝ่ายจัดการและพัฒนาระบบสารสนเทศ (อจส.)</h5></p>
        </footer>
  </body>
</html>
