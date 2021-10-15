<?php

include('db.php');

$d= $_SESSION['id']; 
 if (isset($_POST['deleteaccount'])) {

$deleted= $_POST["deleteaccount"];




$sql = "UPDATE seller SET requstdeleteaccount='yes' WHERE id='$d'";

 



if ($db->query($sql) === TRUE) {
     $del= "تم ارسال طلبك";
} else if ($db->query($sql) === FALSE) {

  $err=  "حدثت مشلكة، حاول مرة اخرى " . $conn->error;
}

 }
?> 
