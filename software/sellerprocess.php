
<?php
// sller join us page new seller (nouf) -------------------------------------------------------------------------------------------------------


include('db.php');

 /* $sellername = "";
  $sellerphonenumber="";
  $selleremail = "";
  $shopname = "";
  $enumb =""; 
  $address="";
  $passwordd=""; */



  //$imge= $_FILES['book_c'][
  

  if (isset($_POST['log'])) {

  /* if(!isset($_POST['shopimg'])){
     $shopimge ="data:image/png;base64,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"; 
     $shopimge=base64_encode(file_get_contents(addslashes($shopimge)));
    // $shopimg = $_FILES['shopimg']['tmp_name'];
       
   } else if(isset($_POST['shopimg'])){(*/
     $shopimge= $_FILES['shopimg']['tmp_name'];
       $shopimge=base64_encode(file_get_contents(addslashes($shopimge)));

   



 



    $sellername = $_POST['sellername'];
    $sellerphonenumber = $_POST['sellerphonenumber'];
    $selleremail = $_POST['selleremail'];
    $shopname = $_POST['shopname'];
    $enumb = $_POST['enumb'];
    $address= $_POST['address'];
    $passwordd = $_POST['passwordd'];

    $sql_u = "SELECT * FROM seller WHERE Full_name='$sellername'";
    $sql_p = "SELECT * FROM seller WHERE phone_number='$sellerphonenumber'";
    $sql_e = "SELECT * FROM seller WHERE email='$selleremail'";
    $sql_sh = "SELECT * FROM seller WHERE ShopName='$shopname'";   
    $sql_en = "SELECT * FROM seller WHERE commercialRegistration='$enumb'";  
    $sql_ad= "SELECT * FROM seller WHERE adress='$address'";
    $sql_bb = "SELECT * FROM buyer WHERE email='$selleremail'"; // check if there is a buyer with the same email to prevent sign up


    $res_u = mysqli_query($db, $sql_u);
    $res_p = mysqli_query($db, $sql_p);
    $res_e = mysqli_query($db, $sql_e);
    $res_sh = mysqli_query($db, $sql_sh);
    $res_en = mysqli_query($db, $sql_en);
    $res_ad = mysqli_query($db, $sql_ad);
    $res_bb = mysqli_query($db, $sql_bb);


 if (!preg_match('/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u', $sellername) && !preg_match('/^[A-Za-z0-9]$/', $sellername)){
 $name_error = "<div class = 'text'> عذرا ... ادخل احرف او ارقام فقط </div>"; 
}else if (mysqli_num_rows($res_u) > 0) {
      $name_error = "<div class = 'text'> عذرا ... اسم المستخدم مسجل بالفعل </div>";  
     }else if(mysqli_num_rows($res_p) > 0){
      $phone_error = "<div class = 'text'>عذرا ... رقم الهاتف مسجل بالفعل </div>";  
     }else if(is_numeric($sellerphonenumber) == false ){
      $phone_error = "<div class = 'text'>عذرا ... ادخل رقم </div>"; }
      else  if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $selleremail)) {
  $email_error = "<div class = 'text'>عذرا ... البريد الالكتروني المدخل غير صحيح </div>"; 
}else if(mysqli_num_rows($res_e) > 0){
      $email_error = "<div class = 'text'>عذرا ... البريد الالكتروني مسجل بالفعل </div>";  
     } else if (!preg_match('/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u', $shopname) && !preg_match('/^[A-Za-z0-9]$/', $shopname)){
 $shopname_error = "<div class = 'text'> عذرا ... ادخل احرف او ارقام فقط </div>"; 
}else if(mysqli_num_rows($res_sh) > 0){
      $shopname_error = "<div class = 'text'>عذرا ... اسم المتجر مسجل بالفعل  </div>";  
     }else if(is_numeric($enumb) == false ){
      $enumb_error = "<div class = 'text'>عذرا ... ادخل رقم </div>"; }
      else if(mysqli_num_rows($res_en) > 0){
      $enumb_error = "<div class = 'text'>عذرا ... السجل التجاري مسجل بالفعل  </div>"; } 
      else if (!preg_match('/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u', $address) && !preg_match('/^[A-Za-z0-9]$/', $address)){
 $address_error = "<div class = 'text'> عذرا ... ادخل احرف او ارقام فقط </div>"; 
}
  else if(strlen($passwordd) < 8 ){
     $pass_error = "<div class = 'text'>عذرا ... يجب أن تكون كلمة المرور أكبر من 8 أحرف </div>";  
    }elseif (mysqli_num_rows($res_bb) > 0) {
     $email_error = "<div class = 'text'>عذرا ... البريد الإلكتروني مسجل بالفعل كمشتري </div>"; 
    }

    else{

if(!empty($_POST['sellername']) && !empty($_POST['sellerphonenumber']) && !empty($_POST['selleremail']) && !empty($_POST['shopname'])&& !empty($_POST['enumb'])&& !empty($_POST['address']) &&  !empty($_POST['passwordd']) ) 
{
  //Do my PHP code


  
   

// "INSERT INTO seller (Full_name, phone_number, email, ShopName, commercialRegistration, adress ,password )    VALUES ('$username', '$phonenumber', '$email','$shopname','$enumb', '  $address', ".md5($password)."')";



           $query = "INSERT INTO seller ( Full_name,profilepic, phone_number, email, ShopName, commercialRegistration, adress, password, AccountState) VALUES ('$sellername',
           '$shopimge', '$sellerphonenumber','$selleremail' ,'$shopname','$enumb','$address','".md5($passwordd)."' ,'غير مصرح')"; // UN --> unauthorized A -> authorized

           $results = mysqli_query($db, $query);
           session_start();


        $sql= "SELECT * FROM seller WHERE email='$selleremail'";
  
   $result  = mysqli_query($db, $sql);

  $row = mysqli_fetch_assoc($result);

   $id = $row["id"];

  $_SESSION['id'] = $id;
     $_SESSION['role'] = "seller"; 
     $_SESSION['AccountState']=$row["AccountState"];

          
   header("location:waitpage.php");

                exit();
    }
  }
  }


//seller add product page -------------------------------------------------------------------------------------------------------

?>
<?php


include('db.php');
  if (isset($_POST['addp'])) {

  $pname = $_POST['pname'];


  if($_POST['pname']=='اخرى'){
    $pname =  $_POST['ppname'];
    $ppdes =  $_POST['ppdes'];
    $ppfam =  $_POST['ppfam'];
    $ppmai =  $_POST['ppmai'];
    $ppirr =  $_POST['ppirr'];
    $ppcca =  $_POST['ppcca'];
    $ppvi =  $_POST['ppvi'];
    $pphi =  $_POST['pphi'];
    $pploc =  $_POST['pploc'];


  }  else{
     $pname = $_POST['pname'];
  }

    $sellerid= $_SESSION['id']; 

    $type = $_POST['type'];
    //$filename = $_POST['filename']; // picture 
    //$img= $_FILES['filename']['tmp_name'];
    //$img=base64_encode(file_get_contents(addslashes($img))); 
    $descreption = $_POST['descreption'];
    $size = $_POST['size'];
    $hight = $_POST['hight'];
    $price = $_POST['price'];
    $quantity= $_POST['quantity'];



    $sql_hight = "SELECT * FROM product WHERE height='$hight'";
    $sql_quant = "SELECT * FROM product WHERE productQuantity='$quantity'";
    $sql_price = "SELECT * FROM product WHERE productPrice='$price'";
      //$sql_size = "SELECT * FROM product WHERE size='$size'"; 
       //$sql_pname = "SELECT * FROM product WHERE productName='$pname'";  
       //$sql_ptype = "SELECT * FROM product WHERE productType='$type'";
        $sql_seller = "SELECT * FROM product WHERE sellerID='$sellerid' AND productType='$type' AND productName='$pname' AND size='$size'";

    $res_hight = mysqli_query($db, $sql_hight);
    $res_quant = mysqli_query($db, $sql_quant);
    $res_price = mysqli_query($db, $sql_price);
 //$res_size = mysqli_query($db, $sql_size); 
 //$res_pname = mysqli_query($db, $sql_pname); 
 //$res_ptype = mysqli_query($db, $sql_ptype);
  $res_seller = mysqli_query($db, $sql_seller);



//if (!preg_match('/^[\p{Arabic}a-zA-Z\p{N}]+\h?[\p{N}\p{Arabic}a-zA-Z]*$/u', $descreption) && !preg_match('/^[A-Za-z0-9]$/', $descreption)){
// $descreption_error = "<div class = 'text'> عذرا ... ادخل احرف او ارقام فقط </div>"; 
//}
    if(is_numeric($hight) == false ){
      $hight_error = "<div class = 'text'>عذرا ... ادخل رقم </div>"; }
else if(is_numeric($quantity) == false ){
      $quant_error = "<div class = 'text'>عذرا ... ادخل رقم </div>"; }
else if(is_numeric($price) == false ){
      $price_error = "<div class = 'text'>عذرا ... ادخل رقم </div>"; }
else if(mysqli_num_rows($res_seller) > 0 ){
      $exist_error = "<div class = 'text'>عذرا ... لقد تم اضافة المنتج من قبل </div>"; }
      
      else{ 

   $imge= $_FILES['filename']['tmp_name'];
  $imge=base64_encode(file_get_contents(addslashes($imge)));
 
$sellerSizeID=$sellerid. ' ' . $pname;
      $query2 = "INSERT INTO product ( sellerID, productName, productType, productPic, description, size, height, productPrice, productQuantity,sellerSizeID) VALUES ('$sellerid','$pname','$type' ,'$imge','$descreption','$size','$hight' ,'$price', '$quantity' ,'$sellerSizeID')"; 
      $results = mysqli_query($db, $query2);
	  
	  
	  

      $sqlti = "SELECT * FROM product WHERE productName='$pname'";
        $sqltin = "SELECT * FROM informationsheet WHERE plantName='$pname'";
      $queryrecomendation1 = "SELECT * from product WHERE sellerID='$sellerid' AND productName='$pname' AND productType='$type' AND description='$descreption' AND size='$size' AND height='$hight' AND productPrice='$price' AND productQuantity='$quantity' AND sellerSizeID='$sellerSizeID'";
      $resultsrecomendation1 = mysqli_query($db, $queryrecomendation1);
	   while($rowrecomendation1 = mysqli_fetch_array($resultsrecomendation1)){
	   $id1=$rowrecomendation1['productID']; 
	   //session_start();
//$_SESSION['rec']=$rowrecomendation1['productID'];   
}
$id2=$rowrecomendation1['sellerSizeID'];
include ('CreateOrderRecomendation.php');
include ("createRecomendationTable.php"); 
$firstID=$id1;	  
//include ('recomendation.php');		 


if($_POST['pname'] =='اخرى'  ){

  $queryin = "INSERT INTO informationsheet ( plantName, plantPicture, plantDescription, familyName, maintenance, irrigation, desiccation, vigour, height, locationOfUse) VALUES ('$pname','$imge','$ppdes' ,'$ppfam','$ppmai','$ppirr','$ppcca' ,'$ppvi', '$pphi', '$pploc')"; 

      $resultsin = mysqli_query($db, $queryin);

   }
   



    

       echo '<script language="javascript">';
    echo 'alert("تم اضافة المنتج بنجاح"); location.href="sViewProducts.php"';
    echo '</script>'; }
 

  

 


    
  //}

}
  


//end seller join us page -------------------------------------------------------------------------------------------------------

?>