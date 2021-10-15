

<?php 

include('db.php');

if ($con->connect_errno) {

    printf("connection failed: %s\n", $con->connect_error());
    exit();
}


$d=$_GET["idddddd"];
  
  $sql = "UPDATE seller SET AccountState='غير مصرح' WHERE id='$d'";
  
  if(mysqli_query($con, $sql)){ 


  echo '<script language="javascript">';
    echo 'alert("تم الغاء تصريح البائع"); location.href="allsellers.php"';
    echo '</script>';
  

 // header("Location:allsellers.php");
  //$acc="تم الغاء تصريح البائع"; 
} 
  
else{ 
    $acc= "حدث خطأ، حاول مرة اخرى" ; 
} 
mysqli_close($con); 
?> 





