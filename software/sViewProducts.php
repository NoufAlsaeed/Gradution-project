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
<!DOCTYPE html>
<html lang="ar" id="top" class="js no-touch localstorage">
<head>
		<link rel="icon" type="image/jpg" sizes="16*16" href="images/ii.jpg" />	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> قائمة منتجات البائع </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="نبات، نباتات ، صبار، اعشاب، بائعين">
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />

</head> 
<body>


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
    <!-- Header End -->

 

<main> 
<br>
<h1 class='mb-3 pr-0 mt-3 text-center mainColor pp' style='font-size: 170%'> إدارة المنتجات </h1>

<div class = "profilePage">
<?php 
$shopId=$_SESSION['id']; 
$sqle1 = "SELECT * FROM seller WHERE id = '$shopId'"; 
$result1 = mysqli_query($db,$sqle1); 
$row1 = mysqli_fetch_assoc($result1);
echo"<h1 class='mb-3 pr-0 mt-3 text-center mainColor pp' style='font-size: 140%'>".$row1['ShopName']." </h1>";

?>

<h2 class="typeOfP">نباتات</h2>
<hr class="solid">
 <div class = "containerSVP">
 


<?php
$shopId=$_SESSION['id']; 
$sqle = "SELECT * FROM product WHERE sellerID = '$shopId' AND productType!='ادوات زراعية '"; 
$result = mysqli_query($db,$sqle); 
	if (mysqli_num_rows($result) > 0){
          while ($row = mysqli_fetch_assoc($result)){
echo "<div class='product_wrapper'>";
echo "<div class='conOfPrcolumn'> <img height='200px' width='200px'  src='data:image/png;base64,".( $row["productPic"] )."' /> </div>";

    echo "
    <input type='hidden' name='productID' value=".$row["productID"]." />
  <input type='hidden' name='sellerID' value=".$row["sellerID"]." />
    <div class='name'>".$row["productName"]."</div>
    <p class='text-right mb-2'><div class='price'> السعر: ".$row["productPrice"]." ر.س</div>

<form action='editP.php'>
<div class = 'editeprofileContet>
<label for='quantity' class = 'text'> الكمية :</label>
<input type='number' id='quantity' name='quantity' value=". $row["productQuantity"].">
<input type='hidden' name='productID' value=".$row["productID"]." />
<input type='submit' name='update' value='حفظ' >
</div>
</form>
<div class='buttonProfile' id='delete' ><a href='deleteP.php?idd=".$row['productID']."' onclick='return confirm('Are you sure you want to delete this item')'>حذف المنتج </a></div>
    </div>
  ";

      }}
	 else {
	 	echo '<br> <br> <p style="font-size: 150%; color:lightgrey"> لا توجد لديك نباتات في الوقت الحالي   </p> <br> <br> ';
	 }

?>
</div>

<br>
</div>






<div class = "profilePage">
<h2 class="typeOfP">ادوات زراعية </h2>
<hr class="solid">
 <div class = "containerSVP">

<?php
$shopId=$_SESSION['id']; 
$sqle2 = "SELECT * FROM product WHERE sellerID='$shopId' AND productType='ادوات زراعية '"; 
$result2 = mysqli_query($db,$sqle2); 
	 	if (mysqli_num_rows($result2) > 0){
 while ($row2 = mysqli_fetch_assoc($result2)){
echo "<div class='product_wrapper'>";
echo "<div class='conOfPrcolumn'> <img height='200px' width='200px'  src='data:image/png;base64,".( $row2["productPic"] )."' /> </div>";

    echo "
    <input type='hidden' name='productID' value=".$row2["productID"]." />
  <input type='hidden' name='sellerID' value=".$row2["sellerID"]." />
    <div class='name'>".$row2["productName"]."</div>
    <div class='price'>$".$row2["productPrice"]."</div>

<form action='editP.php'>
<div class = 'editeprofileContet>
<label for='quantity' class = 'text'>الكمية :</label>
<input type='number' id='quantity' name='quantity' value=". $row2["productQuantity"].">
<input type='hidden' name='productID' value=".$row2["productID"]." />
<input type='submit' name='update' value='حفظ' >
</div>
</form>
<div class='buttonProfile' id='delete' ><a href='deleteP.php?idd=".$row2['productID']."' onclick='return confirm('Are you sure you want to delete this item')'>حذف المنتج </a></div>
    </div>
  ";

      }
		} else {
				echo '<br> <br> <p style="font-size: 150%; color:lightgrey"> لا توجد لديك ادوات زراعية في الوقت الحالي   </p> <br> <br> ';
		}
?>
</div>
<div style="clear:both;"></div>

<br>
</div>

</main>
    <footer>
  <ul class="foot">
 
      <li> <a href="mailto:noufib1252@gmail.com">  <img src="images/call-center.png" alt="khadra" /> تواصل معنا  </a> </li> 
    </ul>
</footer>
  </body>
      <script src="javascript/header.js"></script>
</html>
