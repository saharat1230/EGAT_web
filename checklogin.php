<?php
session_start();
if (isset($_POST['username'])) {
    include "condb.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql="SELECT * FROM login
    WHERE  username='".$username."'
    AND  password='".$password."' ";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)==1) {
        $row = mysqli_fetch_array($result);

        $_SESSION["ID"] = $row["ID"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["level"] = $row["level"];

        if ($_SESSION["level"]=="ADMIN") {
            echo "<script>";
            echo "alert(\" ยินดีต้อนรับเข้าสู่ระบบ\");";
            echo "</script>";
            header("refresh: 0; url=admin.php");
            exit(0);
        }
        if ($_SESSION["level"]=="Member") {
            echo "<script>";
            echo "alert(\" ยินดีต้อนรับเข้าสู่ระบบ\");";
            echo "</script>";
            header("refresh: 0; url=Member.php");
            exit(0);
        }
    } else {
        echo "<script>";
        echo "alert(\" Username หรือ Password ไม่ถูกต้อง!\");";
        echo "</script>";
        header("refresh: 0; url=login.php");
        exit(0);
    }
} else {
    Header("Location: index.php"); //user & password incorrect back to login again
}
