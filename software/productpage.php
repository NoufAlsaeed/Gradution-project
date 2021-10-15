
<?php include('loginphp.php');
?>
<!--The bellow script is just adding values of selected item into array so that we can display them into basket.php page.-->
<?php
//session_start();
include('db.php');include('10Rec.php');
$status="";


if (isset($_POST['productID']) && $_POST['productID']!=""){
$productID = $_POST['productID'];
$result = mysqli_query($con,"SELECT * FROM product WHERE productID ='$productID'");
$row = mysqli_fetch_assoc($result);
$productName = $row['productName'];
$productID = $row['productID'];
$productPrice = $row['productPrice'];
$productPic = $row['productPic'];
$size = $row['size'];
$sellerID = $row['sellerID'];
 
$cartArray = array(
 $productID=>array(
 'productName'=>$productName,
 'productID'=>$productID,
 'productPrice'=>$productPrice,
 'size'=>$size,
 'productQuantity'=>1,
 'productPic'=>$productPic,
 'sellerID'=>$sellerID
 )
);

 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>!تم اضافة المنتج الى سلتك</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($productID,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
! المنتج قد تمت اضافته الى سلة مشترياتك </div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>!تم اضافة المنتج الى سلتك </div>";
 }
 
 }

}

?>

<?php
$status="";

if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST['productID'] == $value['productID'] ){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:green;'>
      !تم حذف المنتج من سلتك </div>";
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
<script>

function goBack() { window.history.back() }

</script>

<html lang="ar" id="top" class="js no-touch localstorage">
<head>
	<link rel="icon" type="image/jpg" sizes="16*16" href="images/ii.jpg" />	
<link rel="shortcut icon" type="image/png" href="leaf.png" />	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> معلومات المنتج </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="نبات، نباتات ، صبار، اعشاب، بائعين">
   <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" /> 

    <style type="text/css">
     #woo {
  padding: 15px;
  border: 1px solid #666;
  background: #fff;
  display: none;
}

#formButton {
  display: block;
  /*margin-right: auto;
  margin-left: auto;*/
}</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <form class="search__form" action="search.php" method="GET">
                        <label class="sr-only" for="search">Search</label>
                        <input
                                type="search"
                                name="search_key"
                                id="search" required
                                placeholder="البحث"
                                style="     text-align: right;"
                        />
                    </form>
                </div>
			  
			  <?php
			  if(empty($_SESSION["shopping_cart"])) { ?>
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
			<?php  }
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
            <a href="basket.php" class="cart">
              <svg
                version="1.1"
                viewBox="0 0 100 100"
                xmlns="http://www.w3.org/2000/svg" >
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
      <span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>
			  
                 			  
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

   $total_price = 0;
$id=$_GET['idd'];
$sql = "SELECT * FROM product WHERE productID= '$id'";
$result = mysqli_query($con, $sql);
   $plantsFromTheSameSize = [];//raghad array for size
$index=0;//raghad index for array 
          while ($row = mysqli_fetch_assoc($result)){
    //raghad start here execute sql and add product ids with same product like this product but they
    // have other sizes into the array.
           $sellerSizeID=$row["sellerSizeID"];
           $sqlForSizes = "SELECT * FROM product WHERE sellerSizeID= '$sellerSizeID'"; 
           $resultForSizes = mysqli_query($con, $sqlForSizes); 
  while($rowForSizes = mysqli_fetch_array($resultForSizes)) {
   $plantsFromTheSameSize[]=$rowForSizes['productID'];
   $plantsFromTheSameSize[$index++] ;

} 
        //raghad finish here
        $ie1 = $row['sellerID'];
        $sql1 = "SELECT * FROM seller WHERE id='$ie1'" ;
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($result1);
			  echo " 	<br><img  style='
 display: flex;
  text-align: right;
margin-left: 90%; ' height='35px' width='35px'  onclick='goBack()' src='images/arrowright.svg'>   <br> ";

$namep= $row["productName"]; // nouuuuuufff
//echo "<div class='product_wrapper'>";
echo "<br>".' <div class="conOfPrcolumn"><img  src="data:image/png;base64,'.( $row["productPic"] ).'" /> </div>';
   echo "
    <form method='post' action=''>
    <input type='hidden' name='productID' value=".$row["productID"]." />
  <input type='hidden' name='sellerID' value=".$row["sellerID"]." />
  <div class = 'conOfProduct'>

    <div class='mb-2' style='border:1px solid #DDD; padding:10px; border-radius:10px;'>
    <h3 class='name mb-2 mainColor'><span class=''> اسم المنتج :</span>  ".$row["productName"]."   </h3> 
	<h3 class='name mb-2 mainColor'><span class=''> اسم المتجر :</span>  ".$row1["ShopName"]."   </h3>  
 </div> 
  
    <p style='text-align:right; font-size:110%;' class='name  mr-2 mb-1 mt-0 mainColor'>
    : وصف المنتج  </p><p style='text-align:right; font-size:100%;' class='name  mr-2 mb-2 mt-0 '>".$row["description"]."</p>
   

          <p style='text-align:right; font-size:110%;' class='name  mr-2 mb-2 mt-0 mainColor'>
الإرتـــفــاع : <input type='hidden' name='ShopName' value=".$row1["ShopName"] ." /> ".$row["height"]." م</p>";?>
        <?php 
        //raghad start here
 //here i will start with check what is the size for this product , make it the default size in the option 
 //then i will check how many products in the array , if it is one so just one option witch is this 
 //product option , then if it is two , i will make 2 options and default one is this page id , then
 // if he press the other size option , i will redirect him to productpage.php?idd=(the selected product 
 //witch is the other size) . and it is the same if there are 3 size , i think it is good but we need
 // to ask nora if it good or not . and thats it , i will make all of them into in if statement ,
 // if index = one , if index = 2 , if index = 3 .
 
      if($index==1)
      {
        echo "
                   <p style='text-align:right; font-size:110%;' class='name  mr-2 mb-1 mt-0 mainColor'>: الحجم  </p>
				   <div class = 'conOfCheck'>
				   <select style='
  width: 100%;
  padding: 4px 4px;
  border: none;
  border-radius: 1px;
  background-color: #f1f1f1;'>
                    <option>".$row['size']."</option>
                    </select></div>";
      }

      if($index>=2){
  
          echo "
         <div class = 'conOfCheck'>
                  <p style='text-align:right; font-size:110%;' class='name  mr-2 mb-1 mt-0 mainColor'>: الحجم </p> <select style='
  width: 100%;
  padding: 4px 4px;
  border: none;
  border-radius: 1px;
  background-color: #f1f1f1;' onchange='this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);'>";
        $count=0;
                foreach( $plantsFromTheSameSize as $ttttt   ){
                   if ($row['productID']==$ttttt){
                       echo "<option>".$row['size']."</option>";
                       unset($plantsFromTheSameSize[$count]); }
                     $count++;  
                     }      
                foreach( $plantsFromTheSameSize as $ttttt ) { 
                     $sqlForThisProduct = "SELECT * FROM product WHERE productID='$ttttt'" ;
                     $resultForThisProduct = mysqli_query($con, $sqlForThisProduct);
                     $rowForThisProduct = mysqli_fetch_assoc($resultForThisProduct);      
                     echo"<option value='productpage.php?idd=".$ttttt."'> ".$rowForThisProduct['size']." </option>";
                     }                
        echo"</select></div>  ";
      }
     //raghad finish here
      ?>

  
  <?php




  ?>
   

 
     
<input type='hidden' name='productID' value="<?php echo $row["productID"]; ?>" />
<input type='hidden' name='action' value="change" />
<p style='text-align:right; font-size:110%;' class='name  mr-2 mb-1 mt-0 mainColor'>: الكمية </p> 
<div class = 'conOfCheck'>
<select style="
  width: 100%;
  padding: 4px 4px;
  border: none;
  border-radius: 1px;
  background-color: #f1f1f1;"name='productQuantity' class='productQuantity'  value="1">
<?php
$i=1;
  while ($i<=$row["productQuantity"]){?>     
<option <?php if($row["productQuantity"]==$i) ?> value=<?php echo $i; ?> ><?php echo $i; ?></option>
  <?php $i++; } ?>
</select>

</div>


<?php $yy = $row['productPrice'];?> 
<?php $totalPrice = $row["productPrice"]*$row["productQuantity"]; ?>
<?php $row["productPrice"]=$totalPrice;?>  


          
      <?php  echo "   

                    </div>";  
					echo "  <div class = 'conOfCheckk'>" ; 


$sqlin="SELECT * FROM informationsheet  WHERE plantName='$namep'"; 
$resultss=mysqli_query($con, $sqlin);

if (mysqli_num_rows($resultss)> 0){

  echo"<div class='conOfCheckk btn btn-success' id='formButton' onclick='myFunction()'><a href='#informationsheet.php?name=".$row["productName"]."'> المزيد </div></a> ";  }
echo " 
   </div>
     <p><div class='price'>  سعر المنتج : ".$yy." ر.س</div> </p>  <br>";
	 if( $row['productQuantity']==0){ echo "<h2 style='font-size: 150% ; color:green;'>"." المنتج غير متوفر حاليا"."</h2>"; }else{ 
	 echo"<button type='submit' class='buy btn btn-success'>اضف الى السلة </button>";}
 echo"
    </form>
    <hr></div>"; ?>
	




<?php
      }
mysqli_close($con);
?>
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; 





?>





</div>
<script>
$(document).ready(function() {
  $("#formButton").click(function() {
    $("#woo").toggle();
  });
});
</script>


<div id="myDIV">  
<?php 

include('db.php');

//$idid=$_GET['name'];
//$idid= 1; 
$sql="SELECT * FROM informationsheet  WHERE plantName='$namep'"; 

$resultss=mysqli_query($con, $sql);
while($row = mysqli_fetch_array($resultss)){

   
    echo ' <section> <div id="woo"> 
         <h3 class="mt-7 pp mainColor mr-10"> معلومات النبتة</h3>
         <br>
         '; 

    echo '<h1 class="text-center mainColor">'.$row['plantName'].'</h1> <br>'; 

    echo ' <div class = "iconCONINFO">  
           <p class="" style="line-height: 1.5em; padding-right:5px;padding-left:10px;padding-top:7px; text-align: justify;
 ">  وصف للنبته : '.$row['plantDescription'].'</p> </div>  <br>  '; 

    echo '<p class="infop">: معلومات عامة </p><br>
         <div class = "iconCONINFO">
         <img src="images/icons.png" alt="khadra"/> 
         <p style="padding-right:5px;padding-left:20px; padding-top:7px;">اسم الفصيله:  '.$row['familyName'].'</p>';   

    echo '<img src="images/icons-plants_27.gif" alt="khadra"/>
          <p style="padding-right:5px;padding-left:10px;padding-top:7px; ">الرعاية :  '.$row['maintenance'].' </p> 
          </div>
          <br>';   

    echo '<div class = "iconCONINFO">
          <img src="images/13.png" alt="khadra" width="42" height="42"  /> 
          <p style="padding-right:5px;padding-left:20px; padding-top:7px;">الجفاف : '.$row['desiccation'].'</p>';   

    echo '<img src="images/15.png" alt="khadra" width="42" height="42"  /> 
          <p style="padding-right:5px;padding-left:10px;padding-top:7px; ">الري :  '.$row['irrigation'].'</p>
          </div>
          <br>';    

    echo '<div class = "iconCONINFO">
         <img src="images/icons4.gif" alt="khadra" width="42" height="42"  /> 
         <p style="padding-right:5px;padding-left:20px; padding-top:7px;">النمو: '.$row['vigour'].'</p>';  

    echo '<img src="images/icons5.gif" alt="khadra" width="42" height="42"  /> 
          <p style="padding-right:5px;padding-left:10px;padding-top:7px; ">الارتفاع: '.$row['height'].'</p> </div>
          ';   

    echo ' <div class = "iconCONINFO"><p style="padding-right:5px;padding-left:10px;padding-top:7px; "> موقع الإستخدام :  '.$row['locationOfUse'].' </p>
    <br> <br> 
          </div></div></section>';     

}
    

//$con->close(); 

				echo "<br><h1 style='text-align:right; font-size:170%;' class='name  mr-4 mb-3 mainColor'><span class=''> :ينصح بها لأجلك  </span></h1><hr> ";
?> 

<div class="wrap1">
<div class="contentR">
    <div class="boxR">
	
		<?php


foreach( $TenRecomendation as $valueRecomendation ){

	$sqlRecomendation = "SELECT * FROM product WHERE productID= '$valueRecomendation'";
$resultRecomendation = mysqli_query($con, $sqlRecomendation);

          while ($rowRecomendation = mysqli_fetch_assoc($resultRecomendation)){
			  $sellerIDRecomendation=$rowRecomendation["sellerID"];
			  			  $sqllRecomendation = "SELECT * FROM seller where id='$sellerIDRecomendation'" ;
$resulttRecomendation = mysqli_query($con, $sqllRecomendation);			  
			  $rowwRecomendation = mysqli_fetch_assoc($resulttRecomendation);
			  echo "<div class='product_wrapper'>";
echo "<div class='conOfPrcolumn'><a href='productpage.php?idd=".$rowRecomendation['productID']."'><img src='data:image/png;base64,".( $rowRecomendation["productPic"] )."' /></a> </div>";
    echo "
    <input type='hidden' name='productID' value=".$rowRecomendation["productID"]." />
	<input type='hidden' name='sellerID' value=".$rowRecomendation["sellerID"]." />
	<input type='hidden' name='ShopName' value=".$rowwRecomendation["ShopName"]." />
	<div class='name'>".$rowwRecomendation["ShopName"]."</div>
    <div class='name'>".$rowRecomendation["productName"]."</div>
    <div class='price'>	السعر: ".$rowRecomendation["productPrice"]." ر.س</div> 
    </div>";
			  
		  }
}
	mysqli_close($con);
 
	?>

    </div>
</div>
</div>


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