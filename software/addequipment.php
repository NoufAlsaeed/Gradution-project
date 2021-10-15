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


include('db.php');
  if (isset($_POST['addp'])) {

  $pname = $_POST['pname'];


  if($_POST['pname']=='اخرى'){
    $pname =  $_POST['ppname'];
    }
    else{
     $pname = $_POST['pname'];
  }

    $sellerid= $_SESSION['id']; 

    $type = 'ادوات زراعية ';
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
    
    
    
    /*
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
include ('recomendation.php');   */     




    

       echo '<script language="javascript">';
    echo 'alert("تم اضافة المنتج بنجاح"); location.href="sViewProducts.php"';
    echo '</script>'; }
 

  

 


    
  //}

}
  


//end seller join us page -------------------------------------------------------------------------------------------------------

?>




<!DOCTYPE html>
<html lang="ar" id="top" class="js no-touch localstorage">
<head>
    <link rel="icon" type="image/jpg" sizes="16*16" href="images/ii.jpg" /> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> اضافة منتج </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="نبات، نباتات ، صبار، اعشاب، بائعين">
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />

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
    <li class="nav__item"><a href="AddProductPage.php"> إضافة منتج </a></li>
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

    <form method="POST" action="buyerprofile.php"> <a href="signout.php" name="so" ><img height="20px" width="20px"  src="images/logout.svg"> </a> </form> </div> 
          </div>
        </div>
      </div>
    </header>
    <!-- Header End -->

 


<main>



<div class = "editeprofilePage">
<h1 class='mb-3 pr-0 mt-3 text-center mainColor pp' style='font-size: 170%'> إضافة منتج </h1>
<br>

<div class="editeprofileBorder mainbag ">













 
<form method="post" action="addequipment.php" enctype="multipart/form-data">
<!-- tr -->
<div class = "editeprofileContet"> 
   <label for="filename" class = "text">: صورة المنتج</label> <br>
  <input type="file" id="myFile" name="filename" required>
   
 
 <?php if (isset($file_error)): ?>
        
        <span style="color:red;"><?php echo $file_error; ?></span>
        
      <?php endif ?>
   
</div>

<!-- tr -->
<!-- tr -->
<div class = "editeprofileContet"> 
<label for="descreption" class = "text" style="line-height:200%">: وصف المنتج</label><br>
<textarea id="descreption" name="descreption" rows="4" cols="25" maxlength="2000" required>
</textarea>
 <?php if (isset($descreption_error)): ?>
        <br>
        <span style="color:red;"><?php echo $descreption_error; ?></span>
        <br>
      <?php endif ?>
</div>



<script type="text/javascript">
function showfield(name){
  if(name=='اخرى'){
   document.getElementById('div1').innerHTML=' <br> اسم المنتج : <input type="text" name="pname" maxlength="45" required/>'; 
  }
  else document.getElementById('div1').innerHTML='';
}
</script>





<div class = "editeprofileContet"> 
<?php 

$sql2 = "SELECT productName FROM product where productType='ادوات زراعية '" ;
$resultt = mysqli_query($db, $sql2);

echo " <label for='pname' class = 'text' id='type' style='line-height:200%'>: اسم المنتج</label> ";
echo   "<select name='pname' id='pname' class = 'text' onchange='showfield(this.options[this.selectedIndex].value)'>";
?>



<?php 

while ($row = mysqli_fetch_assoc($resultt)){
  echo "<option>".$row["productName"]."</option>";

}

echo " 

<option value='اخرى'>اخرى</option>

</select>
";
echo "<div id='div1'></div>";

?>




</div>
<!-- tr -->
<!-- 
<div class = "editeprofileContet"> 
<form action="/action_page.php">
  <label for="filename" class = "text">: معلومات المنتج</label>
  <input type="file" id="myFile" name="filename">

</form></div>
tr -->


<?php if (isset($pnerror)): ?><br> <span style="color:red;"><?php echo $pnerror; ?></span> <br>  <?php endif ?>


<div class = "editeprofileContet">
<label for="hight" class = "text">: ارتفاع المنتج</label>
<input type="text" id="hight" name="hight" maxlength="6" placeholder='ادخل رقم ' required>
 <?php if (isset($hight_error)): ?>
        <br>
        <span style="color:red;"><?php echo $hight_error; ?></span>
        <br>
      <?php endif ?>
</div>
<!-- tr -->
<!-- tr -->
<div class = "editeprofileContet">
<label for="quantity" class = "text">:الكمية</label>
<input type="text" id="quantity" name="quantity" maxlength="10" placeholder='ادخل رقم ' required>
 <?php if (isset($quant_error)): ?>
        <br>
        <span style="color:red;"><?php echo $quant_error; ?></span>
        <br>
      <?php endif ?>
</div>
<div class = "editeprofileContet">
<label for="price" class = "text">:   السعر</label>
<input type="text" id="price" name="price" maxlength="10" placeholder='ادخل رقم ' required>
 <?php if (isset($price_error)): ?>
        <br>
        <span style="color:red;"><?php echo $price_error; ?></span>
        <br>
      <?php endif ?>
</div>
<div class = "editeprofileContet">
<label for="size" class = "text" style="line-height:200%">:  حجم المنتج</label>
<select name="size" id="size" required>
<option value="صغير (10سم)">صغير </option>
<option value="وسط (15سم)">وسط </option>
<option value="كبير (20سم)">كبير </option>
</select>
 <?php if (isset($size_error)): ?>
        <br>
        <span style="color:red;"><?php echo $size_error; ?></span>
        <br>
      <?php endif ?>
</div>
<?php if (isset($exist_error)): ?>
        <br>
        <span style="color:red;"><?php echo $exist_error; ?></span>
        <br>
      <?php endif ?>
</div>
</div>





<br>
  <div><input class="btn-success" type="submit" value="اضافة المنتج" name="addp"></div></form>


 <br>

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
