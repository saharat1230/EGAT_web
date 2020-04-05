<?php
include('condb.php');
if(isset($_POST['add'])){
  $id		     = $_POST['id'];
  $appname		     = $_POST['appname'];
  $contact_point	 = $_POST['contact_point'];
  $phone_number 	 = $_POST['phone_number'];
  $project_start	 = $_POST['project_start'];
  $project_end		 = $_POST['project_end'];
  $description		 = $_POST['description'];
  $status			   = $_POST['status'];

  $sql = mysqli_query($con, "SELECT * FROM appdata WHERE id='$id'");
  if(mysqli_num_rows($sql) == 0){
    if($pass1 == $pass2){
      $pass = md5($pass1);
      $insert = mysqli_query($con, "INSERT INTO appdata(id, appname, contact_point, phone_number, project_start, project_end, description, status)
                      VALUES('$id','$appname', '$contact_point', '$phone_number', '$project_start', '$project_end', '$description', '$status')") or die(mysqli_error());

  $sql2 = "INSERT INTO inventoryapp(id, appname, contact_point, phone_number, project_start, project_end, description, status)
    VALUES('$id','$appname', '$contact_point', '$phone_number', '$project_start', '$project_end', '$description', '$status')";
    $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
    mysqli_close($con);

      if($insert){
        echo "<script>";
        echo "alert(\" บันทึกข้อมูลเรียบร้อยแล้ว \");";
        header("refresh: 0; url=app.php");
        echo "</script>";
        exit(0);
      }else{
        echo "<script>";
        echo "alert(\" Opp! ไม่ข้อมูลไม่สามารถบันทึกได้ ! \");";
        header("refresh: 0; url=add.php");
        echo "</script>";
        exit(0);
        }
      } else{
        echo "<script>";
        echo "alert(\" รหัสผ่านไม่เหมือนกัน! \")";
        header("refresh: 0; url=add.php");
        echo "<script>";
        exit(0);
        }
      }else{
        echo "<script>";
        echo "alert(\" ID นี้มีอยู่ในระบบแล้ว! \")";
        header("refresh: 0; url=add.php");
        echo "<script>";
        exit(0);
      }
    }
  ?>
