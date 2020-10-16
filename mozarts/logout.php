<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   session_destroy();
   	echo "<script>alert('you are logged out successful'); window.location.href='index.html';</script>";
?>