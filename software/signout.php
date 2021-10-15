<?php

 session_start();
 $role= $_SESSION['role'];
unset($_SESSION['role']);
session_destroy();
header("location:login.php");
exit();
   

 
?>

