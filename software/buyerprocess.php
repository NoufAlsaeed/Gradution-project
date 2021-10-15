 <?php

// Create connection
include('db.php');


// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());}
?>
<?php
// sign up new buyer (nouf) -------------------------------------------------------------------------------------------------------





  $username = "";
  $phonenumber="";
  $email = "";
  $password=""; 


  if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];

    $sql_u = "SELECT * FROM buyer WHERE Full_name='$username'";
    $sql_p = "SELECT * FROM buyer WHERE phone_number='$phonenumber'";
    $sql_e = "SELECT * FROM buyer WHERE email='$email'";
    $sql_ss = "SELECT * FROM seller WHERE email='$email'"; // check if there is a seller with the same email to prevent sign up


    $res_u = mysqli_query($db, $sql_u);
    $res_e = mysqli_query($db, $sql_e);
    $res_p = mysqli_query($db, $sql_p);
    $res_ss = mysqli_query($db, $sql_ss);




if (!preg_match('/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u', $username) && !preg_match('/^[A-Za-z0-9]$/', $username)){
 $name_error = "<div class = 'text'> عذرا ... ادخل احرف او ارقام فقط </div>"; 
} else if (mysqli_num_rows($res_u) > 0) {
      $name_error = "<div class = 'text'> عذرا ... اسم المستخدم مستخدم بالفعل </div>"; 
    }else  if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
  $email_error = "<div class = 'text'>عذرا ... البريد الالكتروني المدخل غير صحيح </div>"; 
} else if(mysqli_num_rows($res_e) > 0){
      $email_error = "<div class = 'text'>عذرا ... البريد الالكتروني مستخدم بالفعل </div>"; 
    }else if(is_numeric($phonenumber) == false ){
      $phone_error = "<div class = 'text'>عذرا ... ادخل رقم </div>";  
    }else if(mysqli_num_rows($res_p) > 0){
      $phone_error = "<div class = 'text'>عذرا ... رقم الهاتف مأخوذ بالفعل </div>";  
    } else if(strlen($password) < 8 ){
     $pass_error = "<div class = 'text'>عذرا ... يجب أن تكون كلمة المرور أكبر من 8 أحرف </div>";  
    }elseif (mysqli_num_rows($res_ss) > 0) {
     $email_error = "<div class = 'text'>عذرا ... البريد الإلكتروني مسجل بالفعل كبائع </div>"; 
    }

    else{

if(!empty($_POST['username']) && !empty($_POST['phonenumber']) && !empty($_POST['email']) && !empty($_POST['password']) ) 
{
  //Do my PHP code


  
   





           $query = "INSERT INTO buyer (Full_name, phone_number, email ,password ) 
                VALUES ('$username', '$phonenumber', '$email','".md5($password)."')";
           $results = mysqli_query($db, $query);
 session_start();


        $sql= "SELECT id FROM buyer WHERE email='$email'";
  
   $result  = mysqli_query($db, $sql);

  $row = mysqli_fetch_assoc($result);

   $id = $row["id"];

  $_SESSION['id'] = $id;
     $_SESSION['role'] = "buyer";  



          
   header("location:buyerprofile.php");

                exit();
    }
  }
  }


//end sign up new buyer-------------------------------------------------------------------------------------------------------

?>



