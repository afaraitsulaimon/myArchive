<?php
   session_start();
   session_destroy();

   header("location:user-login-reg.php");
   exit();
?>