

<?php 

include('db.php');

if ($con->connect_errno) {

    printf("connection failed: %s\n", $con->connect_error());
    exit();
}


$d=$_GET["iddd"];
  
  $sql = "UPDATE seller SET AccountState='مصرح' WHERE id='$d'";
  
  if(mysqli_query($con, $sql)){ 

	header("Location:newsellers.php");
	$acc="تم قبول البائع"; 
} 
  
else{ 
    $acc= "حدث خطأ، حاول مرة اخرى" ; 
} 
mysqli_close($con); 
?> 





