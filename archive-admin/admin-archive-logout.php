<?php
session_start();
   session_destroy();

   header("location:admin-archive-login.php");
   exit();
?>


