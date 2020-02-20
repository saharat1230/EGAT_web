<?php
  session_start();
  session_destroy();
  echo "<script>";
  echo "alert(\" คุณได้ออกจากระบบแล้ว\");";
  echo "</script>";
  header("refresh: 0; url=login.php");
  exit(0);
