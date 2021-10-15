
<?php 

include('db.php');

if ($con->connect_errno) {

    printf("connection failed: %s\n", $con->connect_error());
    exit();
}


$dd=$_GET["iddddd"];




    $sql_u = "SELECT * FROM oorder WHERE SellerID='$dd'";

    $res_u = mysqli_query($con, $sql_u);

      if (mysqli_num_rows($res_u) > 0) {

   echo '<script language="javascript">';
    echo 'alert("عذراً، لايمكن حذف حساب المتجر لوجود طلبات من البائعين"); location.href="allsellers.php"';
    echo '</script>';


      } else if (mysqli_num_rows($res_u) == 0) {


  
  $sql2 = "DELETE FROM seller WHERE id='$dd'";
  
  if(mysqli_query($con, $sql2)){ 

	 echo '<script language="javascript">';
    echo 'alert("سيتم حذف الحساب نهائيا"); location.href="allsellers.php"';
    echo '</script>';

} 
  
else{ 
    $acc= "حدث خطأ، حاول مرة اخرى" ; 
} }
mysqli_close($con); 
?> 


