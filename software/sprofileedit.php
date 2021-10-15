<?php include('loginphp.php');

//session_start();
$rr= $_SESSION['role'];
$id= $_SESSION['id']; 

        $sql= "SELECT * FROM seller WHERE email='$id'";
  
   $result  = mysqli_query($db, $sql);

  $row = mysqli_fetch_assoc($result);

$state= $_SESSION['AccountState'];

if(isset($_SESSION['role'])){
switch ($rr) {
  case 'seller':
  if ($state == 'مصرح'){

  }else if ($state == 'غير مصرح'){
     header('location:waitpage.php');
 close();
  }
    break;
  
 case 'buyer':
    header('location:login.php');
 close();
    break;
     case 'admin':
    header('location:login.php');
 close();
    break;
} }
else {
   header('location:login.php');
}


//if(!isset($_SESSION['role'])) {
  //header('location:login.php');
//} ?>

<?php

//include "loginphp.php"; // Using database connection file here

$id =$_SESSION['id']; // get id through query string

$qry = mysqli_query($db,"select * from seller where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
    $mail = $_POST['mail'];
  $phone = $_POST['phone'];
    $shopname = $_POST['shopname'];
    $address = $_POST['address'];

   if(is_numeric($phone) == false ){
      $phoneerr = "<div class = 'text'>عذرا ... ادخل رقم </div>"; }
      else { 
	
if($_FILES['filename']['name'] == "") { // filename is empty (and not an error)
	    $edit = mysqli_query($db,"update seller set Full_name='$name', email='$mail', phone_number='$phone', ShopName='$shopname', adress='$address' where id='$id'");

}
else {
		$shopimge= $_FILES['filename']['tmp_name'];
       $shopimge=base64_encode(file_get_contents(addslashes($shopimge)));
	  
    $edit = mysqli_query($db,"update seller set Full_name='$name', email='$mail', phone_number='$phone', ShopName='$shopname', adress='$address', profilepic='$shopimge' where id='$id'");
}	  
} 
    if($edit)
    {

 
    echo "<script type='text/javascript'>alert('تم تعديل المعلومات الشخصية بنجاح');location.href='ssprofile.php'</script>";  
        mysqli_close($db); // Close connection
       // header("location:ssprofile.php"); // redirects to all records page
        //exit;


    }
    else
    { $eerr = "<div class = 'text'>عذرا ... ادخل احرف او ارقام فقط </div>";
    }     
}
?>
<!DOCTYPE html>
<html lang="ar" id="top" class="js no-touch localstorage">
<head>
		<link rel="icon" type="image/jpg" sizes="16*16" href="images/ii.jpg" />	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> تعديل الملف الشخصي </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="نبات، نباتات ، صبار، اعشاب، بائعين">
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
<script type='text/javascript'></script>
</head> 
<body>


    <!-- Header Start -->
  <header class="site-header">
      <div class="site-header__top">
        <div class="wrapper site-header__wrapper">
          <div class="site-header__start">
            
          </div>
          <div class="site-header__middle">
            
          </div>
          <div class="site-header__end top">

             <a href="sprofile.php" class="brand"><img src="images/logo.png"></a>

          </div>
        </div>
      </div>
      <div class="site-header__bottom">
        <div class="wrapper site-header__wrapper">
          <div class="site-header__start">
       
          </div>

          <div class="site-header__end bottom">
                 <nav class="nav">
            
                <img class="nav__toggle" aria-expanded="false" src="images/menu.svg.png" style="width: 28px; height: 28px;">
          
              <ul class="nav__wrapper">
                <li class="nav__item"><a href="ssprofile.php"> الملف الشخصي </a></li>
                <li class="nav__item"><a href="sViewProducts.php"> إدارة المنتجات  </a></li>
                <li class="nav__item"><a href="sellerorder.php"> قائمة الطلبات</a></li>
  
              </ul>
            </nav>
          
           
              <form method="POST" action="buyerprofile.php">
            <a href="icon.php">
              <svg
                version="1.1"
                viewBox="0 0 100 100"
                xmlns="http://www.w3.org/2000/svg"
              >
                <title>Profile</title>
                <path
                  d="m65.57 52.5c6.9336-4.5078 11.574-11.797 12.723-19.988 1.1484-8.1875-1.3047-16.473-6.7344-22.715-5.4258-6.2422-13.289-9.8242-21.559-9.8242s-16.133 3.582-21.559 9.8242c-5.4297 6.2422-7.8828 14.527-6.7344 22.715 1.1484 8.1914 5.7891 15.48 12.723 19.988-10.012 3.2812-18.73 9.6406-24.914 18.172-6.1836 8.5273-9.5117 18.793-9.5156 29.328h7.1445c0-15.312 8.168-29.461 21.426-37.117 13.262-7.6523 29.598-7.6523 42.859 0 13.258 7.6562 21.426 21.805 21.426 37.117h7.1445c-0.003906-10.535-3.332-20.801-9.5156-29.328-6.1836-8.5312-14.902-14.891-24.914-18.172zm-37-23.93c0-5.6836 2.2578-11.133 6.2773-15.152 4.0195-4.0156 9.4688-6.2734 15.152-6.2734s11.133 2.2578 15.152 6.2734c4.0195 4.0195 6.2773 9.4688 6.2773 15.152 0 5.6836-2.2578 11.137-6.2773 15.152-4.0195 4.0195-9.4688 6.2773-15.152 6.2773s-11.133-2.2578-15.152-6.2773c-4.0195-4.0156-6.2773-9.4688-6.2773-15.152z"
                />
              </svg>
            </a>
              &nbsp; 
          </form>
            <div> 

    <form method="POST" action="buyerprofile.php" enctype="multipart/form-data"> <a href="signout.php" name="so" ><img height="20px" width="20px"  src="images/logout.svg"> </a> </form> </div> 
          </div>
        </div>
      </div>
    </header>
    <!-- Header End -->

 



<main>
<div class = "editeprofilePage">
<h3> تعديل الملف الشخصي </h3>
<br>
<div class = "editeprofileBorder mainbag">
<div class = "editeprofileContet mainbag">
<form method="post" class="" enctype="multipart/form-data">
<label for="filename" class = "text"> : صورة البائع</label>
  <input type="file" id="myFile" name="filename">
</div>
<div class = "editeprofileContet">
<label for="hight" class = "text">:اسم البائع</label><br>
<input type="text" id="name" name="name" value="<?php 
$shopId= $_SESSION['id']; 
$sqle1 = "SELECT * FROM seller WHERE id = '$shopId'"; 
$result1 = mysqli_query($db,$sqle1); 
$row1 = mysqli_fetch_assoc($result1);
echo"".$row1['Full_name'].""; ?>" maxlength='45'  required>
</div>
<div class = "editeprofileContet">
<label for="hight" class = "text">: البريد الالكتروني</label><br>
<input type="email" id="mail" name="mail" value="<?php 
$shopId= $_SESSION['id']; 
$sqle1 = "SELECT * FROM seller WHERE id = '$shopId'"; 
$result1 = mysqli_query($db,$sqle1); 
$row1 = mysqli_fetch_assoc($result1);
echo"".$row1['email'].""; ?>"  maxlength='250' required >
</div>
<div class = "editeprofileContet">
<label for="hight" class = "text">: رقم التواصل</label><br>
<input type="text" id="phone" name="phone" value="<?php 
$shopId= $_SESSION['id']; 
$sqle1 = "SELECT * FROM seller WHERE id = '$shopId'"; 
$result1 = mysqli_query($db,$sqle1); 
$row1 = mysqli_fetch_assoc($result1);
echo"".$row1['phone_number'].""; ?>" maxlength='13'  required >
 <?php if (isset($phoneerr)): ?>
        <br>
        <span style="color:red;"><?php echo $phoneerr; ?></span>
        <br>
      <?php endif ?>
</div>
<div class = "editeprofileContet">
<label for="hight" class = "text">: اسم المتجر</label><br>
<input type="text" id="shopname" name="shopname" value="<?php 
$shopId= $_SESSION['id']; 
$sqle1 = "SELECT * FROM seller WHERE id = '$shopId'"; 
$result1 = mysqli_query($db,$sqle1); 
$row1 = mysqli_fetch_assoc($result1);
echo"".$row1['ShopName'].""; ?>" maxlength='50'  required >
</div>
<div class = "editeprofileContet">
<label for="hight" class = "text">: عنوان المتجر</label><br>
<input type="text" id="address" name="address" value="<?php 
$shopId= $_SESSION['id']; 
$sqle1 = "SELECT * FROM seller WHERE id = '$shopId'"; 
$result1 = mysqli_query($db,$sqle1); 
$row1 = mysqli_fetch_assoc($result1);
echo "".$row1['adress'].""; ?>" maxlength='30'  required >
</div></div><br>
<?php if (isset($eerr)): ?>
        <br>
        <span style="color:red;"><?php echo $eerr; ?></span>
        <br>
      <?php endif ?>
<div><input class="btn-success" style="border-color:black"  type="submit" name="update" value="حفظ التعديلات " ></div>

</form>
<br> <br>

</div>
<br>

</main>
    <footer>
  <ul class="foot">
 
      <li> <a href="mailto:noufib1252@gmail.com">  <img src="images/call-center.png" alt="khadra" /> تواصل معنا  </a> </li> 
    </ul>
</footer>
  </body>
      <script src="javascript/header.js"></script>
</html>
