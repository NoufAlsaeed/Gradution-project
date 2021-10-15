<?php 
ob_start();
session_start();
include('loginphp.php');
 ?>


<?php
//session_start();
$status="";

// unset($_COOKIE['productID']);
// unset($_COOKIE['quantity']);
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST['productID'] == $value['productID'] ){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:green;'> !تم حذف المنتج من سلتك </div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['productID'] == $_POST['productID']){
        $value["productQuantity"] = $_POST["productQuantity"];
        break; // Stop the loop after we've found the product
    }
}
   
}




?>
<!DOCTYPE html>
<html lang="ar" id="top" class="js no-touch localstorage">
<head>
		<link rel="icon" type="image/jpg" sizes="16*16" href="images/ii.jpg" />	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> سلة المشتريات </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="نبات، نباتات ، صبار، اعشاب، بائعين">
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

             <a href="index.php" class="brand"><img src="images/logo.png"></a>

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
                <li class="nav__item"><a href="aboutus.php">عن خضراء </a></li>
                <li class="nav__item"><a href="shopslist.php">تسوق من البائعين </a></li>
                <li class="nav__item"><a href="shopproduct.php">تسوق منتجات </a></li>
  
              </ul>
            </nav>
            <div class="search">
              <button class="search__toggle" aria-label="Open search">
                Search
              </button>
              <form class="search__form" action="search.php">
                <label class="sr-only" for="search">Search</label>
                <input
                  type="search"
                  name=""
                  id="search"
                  placeholder="البحث"
                  style="     text-align: right;"
                />
              </form>
            </div>
            <a href="basket.php" class="cart">
              <svg
                version="1.1"
                viewBox="0 0 100 100"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g>
                  <title>Cart</title>
                  <path
                    d="m95.398 23.699c-1.8008-2.3008-4.6016-3.6992-7.5-3.6992h-60.898l-1.8984-7.3984c-1.1016-4.3008-4.8984-7.3008-9.3008-7.3008h-10.199c-1.6992 0-3.1016 1.3984-3.1016 3.1016 0 1.6992 1.3984 3.1016 3.1016 3.1016h10.199c1.5 0 2.8008 1 3.1992 2.5l12.199 48.602c1.1016 4.3008 4.8984 7.3008 9.3008 7.3008h39.898c4.3984 0 8.3008-3 9.3008-7.3008l7.5-30.801c0.69922-2.8047 0.10156-5.8047-1.8008-8.1055zm-4.2969 6.6992-7.5 30.801c-0.39844 1.5-1.6992 2.5-3.1992 2.5h-39.902c-1.5 0-2.8008-1-3.1992-2.5l-8.6992-34.898h59.301c1 0 2 0.5 2.6016 1.3008 0.59766 0.79688 0.89453 1.7969 0.59766 2.7969z"
                  />
                  <path
                    d="m42.602 73.898c-5.6992 0-10.398 4.6992-10.398 10.398s4.6992 10.398 10.398 10.398c5.6992 0.003907 10.398-4.6953 10.398-10.395s-4.6992-10.402-10.398-10.402zm0 14.5c-2.3008 0-4.1016-1.8008-4.1016-4.1016s1.8008-4.1016 4.1016-4.1016c2.3008 0 4.1016 1.8008 4.1016 4.1016-0.003906 2.2031-1.9023 4.1016-4.1016 4.1016z"
                  />
                  <path
                    d="m77 73.898c-5.6992 0-10.398 4.6992-10.398 10.398s4.6992 10.398 10.398 10.398 10.398-4.6992 10.398-10.398c-0.097657-5.6953-4.6992-10.398-10.398-10.398zm0 14.5c-2.3008 0-4.1016-1.8008-4.1016-4.1016s1.8008-4.1016 4.1016-4.1016 4.1016 1.8008 4.1016 4.1016c0 2.2031-1.9023 4.1016-4.1016 4.1016z"
                  />
                </g>
              </svg>
            </a>
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
            <?php if(isset($_SESSION['role'])){ echo'<div>   <div> 
    <form method="POST" action="buyerprofile.php">       &nbsp; <a href="signout.php" name="so" ><img height="20px" width="20px"  src="images/logout.svg"> </a>         </form> </div> 
          </div>
        </div>
        ';} else if(!isset($_SESSION['role'])){

echo'';

        } ?> 
      </div>
    </header>
    <!-- Header End -->

 


<main>
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
  $sellers = array();
?> 
<div class = "nprofilePage">
<h1 class='mb-5 pr-1 mt-3 text-center mainColor pp' style='font-size: 170%'>سلة المشتريات</h1>

<div class="container" >
<table class="table table-bordered" style='font-size:12px'>
<tr class="newnew" >
<th  width="1" >  حذف المنتج</th>
<th  width="1" >  الإجمالي  </th>
<th  width="1" >   السعر   </th>
<th  width="1" >اسم المتجر</th>
<th  width="1" >  الكمية   </th>
<th  width="1" >اسم المنتج</th>
</tr> 
<?php 


unset($_SESSION["ids"]);
unset($_SESSION["quantitys"]);

$_SESSION["ids"]=[];
$_SESSION["quantitys"]=[];
foreach ($_SESSION["shopping_cart"] as $product  ){
  $_SESSION["ids"][] .= $product["productID"];
  $_SESSION['quantitys'][] .= $product["productQuantity"];
?>

<tr class="newnewwe" style='font-size: 13px'>

<td>
<form method='post' action=''>
<input type='hidden' name='productID' value="<?php echo $product["productID"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' style="border-radius:50%" class='remove btn btn-danger btn-sm'><i class="fa fa-times"> </i></button>

</form>
</td>

<td><?php echo $product["productPrice"]*$product["productQuantity"]."" ; ?> </td>
<td><?php echo $product["productPrice"]."" ;?> </td>


<?php
include('db.php');
  $id=$product["productID"];
$sql = "SELECT * FROM product WHERE productID= '$id'";
$result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($result)){
        $ie1 = $row['sellerID'];
        $sql1 = "SELECT * FROM seller WHERE id='$ie1'" ;
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($result1);
   echo "<td> ".$row1["ShopName"]."   </td>  ";
   array_push($sellers,$row1["ShopName"]); 

      }
mysqli_close($con);
?>




 <?php
 include('db.php');
$sqloo="SELECT productQuantity FROM product  WHERE productID= '$id'"; 
$resultsss=mysqli_query($con, $sqloo);
$row1 = mysqli_fetch_assoc($resultsss);
mysqli_close($con);
?>

<td >
<form method='post' action=''>
<input type='hidden' name='productID' value="<?php echo $product["productID"]; ?>" />
<input type='hidden' name='action' value="change" />

<select  style="
  width: 100%;
  padding: 4px 4px;
  border: none;
  border-radius: 1px;
  background-color: #f1f1f1;" name='productQuantity' class='productQuantity' onchange="this.form.submit()" >
<?php
$i=1;
  while ($i<=$row1["productQuantity"]){?>    
<option   <?php if($product["productQuantity"]==$i) echo "selected";?> value=<?php echo $i; ?>><?php echo $i; ?></option>
<?php
$i++;
}
$product["productQuantity"]=$product["productQuantity"];?>
</select>


</form>
</td>


<td><?php echo $product["productName"]; ?>
</td>

</tr>

<?php
$total_price += ($product["productPrice"]*$product["productQuantity"]);
$deliveryCost = 10;
$tax= '0.15';



setcookie('totalPrice', $total_price, time()+3600*24);
setcookie('deliveryCost', $deliveryCost, time()+3600*24);
setcookie('tax', $tax, time()+3600*24);
setcookie('sellerID', $product["sellerID"], time()+3600*24);
setcookie('BuyerID', @$_SESSION['id'], time() + time()+3600*24);




// if(  isset($_COOKIE['quantity'])  )
// {
//   unset($_COOKIE['quantity']);
//   //setcookie('quantity', $product["productQuantity"], time() + (86400 * 30), "/");
// }


//echo $_SESSION["ids"];

 //print_r( );

  // if( @$_COOKIE['quantity'] !== $product["productQuantity"] )
  // {
  //   @$_COOKIE['quantity'] = $product["productQuantity"];
  // }
}
?>





</table>

<div class="text-right p-3" dir="rtl">
<p class="text-right mb-2"> المجـموع:  <?php echo $total_price  ." ر.س"; ?> </p>

<p class="text-right mb-2">الــضــريبة: <?php $tax=$total_price*0.15; echo $tax." ر.س";?></p>


<p class="text-right mb-2">  سعر التوصيل: 10 ر.س</p>

<p class="text-right mb-2">
<?php
$total_price *= 1.15;
?>
<?php
$total_price += 10;
?>
<strong>اجمالي المبلغ: <?php echo $total_price." ر.س"; ?></strong> 
</p>
</div>

<?php
}else{
 echo "<br><br><h2 class='mb-5 pr-1 mt-3 text-center mainColor pp' style='font-size: 100%'> !سلة المشتريات فارغة  </h2>";
 }
?>

</div>
</div>
<div style="clear:both;"></div>
<div class="message_box" style="margin:10px 0px;">


<?php echo $status;


       if ($_GET) {
		   if (isset($_GET['check'])) {check($sellers);}}

 function check($sellers){
	  $i = 0;
	  $t = 1;
      $count = count($sellers);
	  if($count>1){
		  while($i<$count){
			  if ($sellers[$i]!=$sellers[$t]){  
			  echo "يجب أن تكون مشترياتك من متجر واحد";
			  break;}
			  elseif ($sellers[$i]==$sellers[$t]){$i++; $t++;}
			  if($t==$count){	  
			  echo "<script> location.href='address.php'; </script>";
			  exit;}}
}
	  else {	        
	  echo "<script> location.href='address.php'; </script>";
	  exit;}

		
		}
?>
</div>


<?php if(!isset($_SESSION["shopping_cart"])){ }else{ ?>
<form action="basket.php"  method="get">
<input type='hidden' name='action' value="check" />
<div><input type="submit" class="btn-success" name ="check"   value="تكملة اجراءات الشراء"  onclick="check()"/></div></form>
<?php } ?>





</div>
  <br>
  <br> 

</main>
    <footer>
  <ul class="foot">
   <li> <a href="joinus.php"> <img src="images/collaboration.png" alt="khadra" /> انضم الينا  </a></li> 
      <li> <a href="mailto:noufib1252@gmail.com">  <img src="images/call-center.png" alt="khadra" /> تواصل معنا  </a> </li> 
    </ul>
</footer>
  </body>
      <script src="javascript/header.js"></script>
</html>