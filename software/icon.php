<?php

 session_start();
 $role= $_SESSION['role'];
if (isset($role)){

switch ($role) {
	case "buyer":
		 if (isset($_SESSION['role'])){
          header('Location:buyerprofile.php');}
         else {
          header('Location:login.php');}
		break;
	
	case "seller":
         if (isset($_SESSION['role'])){
          header('Location:sprofile.php');}
         else {
          header('Location:login.php');}
		break;
		case "admin":
         if (isset($_SESSION['role'])){
          header('Location:admin.php');}
         else {
          header('Location:login.php');}
		break;
}
}
else  {
 header('Location:login.php');
}


?>