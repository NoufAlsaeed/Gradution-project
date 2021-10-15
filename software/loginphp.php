<?php 

function session_error_handling_function($code, $msg, $file, $line) {
    // your handling code here
}

set_error_handler('session_error_handling_function');
session_start();
restore_error_handler();

  $logemail = "";
  $logpassword = "";
  $logrole=""; 

  include('db.php');


  if (isset($_POST['log'])) {


   $em = $_POST['logemail'];
   $passw = $_POST['logpassword'];
   $passww=Md5($passw);
   

    $sql_buyeremail = "SELECT * FROM buyer WHERE email='$em' and password='$passww'";
  //   $sql_buyerpassword = "SELECT * FROM buyer WHERE ";

    $res_buyeremail = mysqli_query($db, $sql_buyeremail);
   //  $res_buyerpassword = mysqli_query($db, $sql_buyerpassword);


    $sql_selleremail = "SELECT * FROM seller WHERE email='$em' and password='$passww'";
   // $sql_sellerpassword = "SELECT * FROM seller WHERE ";

    $res_selleremail = mysqli_query($db, $sql_selleremail);
   // $res_sellerpassword = mysqli_query($db, $sql_sellerpassword);



    $sql_adminemail = "SELECT * FROM admin WHERE email='$em' and password='$passww'";
   // $sql_adminpassword = "SELECT * FROM admin WHERE password='$passww'";

    $res_adminemail = mysqli_query($db, $sql_adminemail);
   // $res_adminpassword = mysqli_query($db, $sql_adminpassword);

    $sqlbb= "SELECT id FROM buyer WHERE email='$em'";
    $sqlss= "SELECT * FROM seller WHERE email='$em'";
    $sqlaa= "SELECT id FROM admin WHERE email='$em'";
    $resultbb  = mysqli_query($db, $sqlbb);
    $resultss  = mysqli_query($db, $sqlss);
    $resultaa  = mysqli_query($db, $sqlaa);

$rows = mysqli_fetch_array($res_selleremail);
$ss = $rows["AccountState"]; 


    if (mysqli_num_rows($res_buyeremail) > 0) {
   
   $row = mysqli_fetch_assoc($resultbb);
  $id = $row["id"];
  $_SESSION['id'] = $id ;
  $_SESSION['role'] = "buyer"; 
       
      header("location:buyerprofile.php");
    }
else if (mysqli_num_rows($res_selleremail) > 0  && $ss == 'غير مصرح' ) {


  $id = $rows["id"];
  $_SESSION['id'] = $id ;
  $_SESSION['role'] = "seller";
  $_SESSION['AccountState']=$rows["AccountState"];
       
      header("location:waitpage.php");
    }
    else if (mysqli_num_rows($res_selleremail) > 0 && $ss == 'مصرح') {


  $id = $rows["id"];
  $_SESSION['id'] = $id ;
  $_SESSION['role'] = "seller";
    $_SESSION['AccountState']=$rows["AccountState"];
       
      header("location:sprofile.php");
    }
      else if (mysqli_num_rows($res_adminemail) > 0 ) {
     
       $rowa = mysqli_fetch_assoc($resultaa);
       $id = $rowa["id"];
       $_SESSION['id'] = $id ;
       $_SESSION['role'] = "admin"; 
      header("location:admin.php");
    }
    else {
       $email_error = "<div class = 'text'>عذرا... اسم المستخدم او كلمة المرور غير صحيحه</div>";  

    }

  }

  



?>
