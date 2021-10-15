<?php

  ob_start();
  session_start();
  session_regenerate_id();
  include "db.php";

  if (isset($_GET["order_id"])) {

    $buyer_cp = "";

    function header_page($page_url) {

        header("location: $page_url");
        exit;

    }

    if (!isset($_SESSION["role"])) {

      header_page("login.php");

    } else {

      if ($_SESSION["role"] != "seller") {

        if ($_SESSION["role"] == "buyer") {

          header_page("login.php");

        } elseif ($_SESSION["role"] == "admin") {

          header_page("login.php");

        }

      }

    }

    include("connect.php"); // Include Connection File
    $order_id = filter_var($_GET["order_id"],
FILTER_SANITIZE_NUMBER_INT); // Filter The Order ID


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (in_array($_POST["order_state"], array("طلب جديد", "قيد المعالجة","جاري الشحن", "تم التوصيل", "إلغاء الطلب"))) {
        $stmt4 = $connect -> prepare("UPDATE oorder SET OrderState = ?
WHERE OrderID = ?");
        $stmt4 -> execute(array($_POST["order_state"], $order_id));

        $name = 'DoneClose-'.$order_id;

        if( $_POST["order_state"] == 'إلغاء الطلب' && !isset($_COOKIE[$name]) )
        {
          foreach($_POST["ids"] as $key => $ID)
          {
              $stmt3 = $conn->prepare("SELECT `productQuantity` FROM `product` WHERE `productID`= $ID");
              $stmt3->execute();
              $row = $stmt3->fetch();

              $orignQ = ($row['productQuantity'] + $_POST["qs"][$key]).'<br />';

              $stmt4 = $conn->prepare("UPDATE product SET productQuantity=? WHERE productID=?");
              $stmt4->execute( array($orignQ, $ID) );
          }

          

          setcookie($name, "", time()+3600*8888);
        }


      }

    }

    $stmt = $connect -> prepare("SELECT OrderDate,OrderState FROM
oorder WHERE OrderID = ?");
    $stmt -> execute(array($order_id));
    $order_exist = $stmt -> rowCount();
    $order_info = $stmt -> fetch();

    if ($order_exist > 0) {

      $stmt2 = $connect -> prepare("SELECT
                                        product.productName,
                                        product.productID,
                                        product.size,
                                        product.productPrice,
                                        ordered_items.quantity,
                                        oorder.deliveryCost,
                                        oorder.tax
                                    FROM
                                        product,
                                        ordered_items,
                                        oorder
                                    WHERE
                                        product.productID =
ordered_items.product_id
                                    AND
                                        oorder.OrderID = ordered_items.order_id
                                    AND
                                        oorder.OrderID = ?
                                  ");
      $stmt2 -> execute(array($order_id));
      $order_producs = $stmt2 -> fetchAll();


?>
<!DOCTYPE html>
<html lang="ar" id="top" class="js no-touch localstorage">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> معلومات المشتري </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="نبات، نباتات ، صبار، اعشاب، بائعين">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="style.css" />

</head>
	<link rel="icon" type="image/jpg" sizes="16*16" href="images/ii.jpg" />
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

                <img class="nav__toggle" aria-expanded="false"
src="images/menu.svg.png" style="width: 28px; height: 28px;">

              <ul class="nav__wrapper">
                <li class="nav__item"><a href="ssprofile.php"> الملف
الشخصي </a></li>
                <li class="nav__item"><a href="sViewProducts.php">
إدارة المنتجات  </a></li>
                <li class="nav__item"><a href="sellerorder.php"> قائمة
الطلبات</a></li>

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
                  d="m65.57 52.5c6.9336-4.5078 11.574-11.797
12.723-19.988 1.1484-8.1875-1.3047-16.473-6.7344-22.715-5.4258-6.2422-13.289-9.8242-21.559-9.8242s-16.133
3.582-21.559 9.8242c-5.4297 6.2422-7.8828 14.527-6.7344 22.715 1.1484
8.1914 5.7891 15.48 12.723 19.988-10.012 3.2812-18.73 9.6406-24.914
18.172-6.1836 8.5273-9.5117 18.793-9.5156 29.328h7.1445c0-15.312
8.168-29.461 21.426-37.117 13.262-7.6523 29.598-7.6523 42.859 0 13.258
7.6562 21.426 21.805 21.426
37.117h7.1445c-0.003906-10.535-3.332-20.801-9.5156-29.328-6.1836-8.5312-14.902-14.891-24.914-18.172zm-37-23.93c0-5.6836
2.2578-11.133 6.2773-15.152 4.0195-4.0156 9.4688-6.2734
15.152-6.2734s11.133 2.2578 15.152 6.2734c4.0195 4.0195 6.2773 9.4688
6.2773 15.152 0 5.6836-2.2578 11.137-6.2773 15.152-4.0195
4.0195-9.4688 6.2773-15.152
6.2773s-11.133-2.2578-15.152-6.2773c-4.0195-4.0156-6.2773-9.4688-6.2773-15.152z"
                />
              </svg>
            </a>
              &nbsp;
          </form>
            <div>

    <form method="POST" action="buyerprofile.php"> <a
href="signout.php" name="so" ><img height="20px" width="20px"
src="images/logout.svg"> </a> </form> </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header End -->
<!-- Header End -->




      <main>




              <div class = "nprofilePage"><br>

              <h1 class="mt-1 pp mainColor"  style='font-size:
170%'>معلومات الطلب</h1>
                  <!-- Order State -->

                  <div class="order_state" id="order_state">
                      <div class="to_cont">
                        <div class="state">حالة الطلب: </div>
                        <div class="con" class="btn-success">
                          <form action="<?php echo
$_SERVER["PHP_SELF"] . "?order_id=$order_id"; ?>" method="POST">
                            <select name="order_state">
                              <option value="طلب جديد" <?php if
($order_info["OrderState"] == "طلب جديد") { echo "selected"; } ?>>طلب
جديد</option>
                              <option value="قيد المعالجة" <?php if
($order_info["OrderState"] == "قيد المعالجة") { echo "selected"; }
?>>قيد المعالجة</option>
                              <option value="جاري الشحن" <?php if
($order_info["OrderState"] == "جاري الشحن") { echo "selected"; }
?>>جاري الشحن</option>
                              <option value="تم التوصيل" <?php if
($order_info["OrderState"] == "تم التوصيل") { echo "selected"; } ?>>تم
التوصيل</option>
                              <option value="إلغاء الطلب" <?php if
($order_info["OrderState"] == "إلغاء الطلب") { echo "selected"; }
?>>إلغاء الطلب</option>
                            </select>
    
                  
                            
                  <?php
                    foreach( $order_producs as $pro )
                    {
                      echo '<input type="hidden" name="ids[]" value="'.$pro['productID'].'" />';
                      echo '<input type="hidden" name="qs[]" value="'.$pro['quantity'].'" />';
                    }
                  ?>
                           <input style="margin-left:10px;" type="submit" value=" تأكيد حالة الطلب">
                            
                          </form>
                        
                         <br>
                          </div>
                        
                        </div>
                        </div>
                 
                  
                        <div class="container " style="background-color:  #cbeac8">

<div class="border-tab ">
    <ul class="order_list_sm">
        <li>تاريخ الطلب: <?php echo $order_info["OrderDate"]; ?></li>
        <li>رقم الطلب: <?php echo $order_id; ?></li>
    </ul>
    <table class="manage_buy table-responsive" style="margin-left: auto;
  margin-right: auto;">
        <tr style="height: 50px;line-height: 50px ; background-color:  #cbeac8 ">
<th width="300" style="color: #000;">الاجمالي</th>
            <th width="300" style="color: #000;">السعر</th>
            <th width="300" style="color: #000;">الحجم</th>
            <th width="300" style="color: #000;">الكمية</th>
            <th width="300" style="color: #000;">اسم المنتج</th>
        </tr>
<?php
            $total_products = 0;
//foreach ($_SESSION["shopping_cart"] as $product  ){




include('db.php');


$sqlee = "SELECT * FROM ordered_items WHERE order_id='$order_id'";
$resultee = mysqli_query($con, $sqlee);

		
		$sqlnn = "SELECT * FROM oorder WHERE OrderID='$order_id'";


$resultss = mysqli_query($con, $sqlnn);
		if (mysqli_num_rows($resultss) > 0){

$roweew = mysqli_fetch_assoc($resultss);
$buyerid = $roweew['BuyerID']; 

$sqlbuyer = "SELECT * FROM buyer WHERE id='$buyerid'"; 
$resultbuyer = mysqli_query($con, $sqlbuyer);
$rowbuyerinfo = mysqli_fetch_assoc($resultbuyer);

$fullname = $rowbuyerinfo['Full_name']; 
$emailbuyer = $rowbuyerinfo['email']; 
$phonenumber = $rowbuyerinfo['phone_number']; 



}

while ($rowee = mysqli_fetch_assoc($resultee)){


$idproduct = $rowee['product_id'];
$resultqq = "SELECT * FROM product WHERE productID='$idproduct' ";
$resultqqq = mysqli_query($con, $resultqq);
while ($rrrrr = mysqli_fetch_assoc($resultqqq)){

$idddd=$rowee['product_id'];
$sqloo="SELECT * FROM ordered_items  WHERE product_id= '$idproduct' AND order_id='$order_id'";
$resultsss=mysqli_query($con, $sqloo);



while ($row1 = mysqli_fetch_assoc($resultsss)){

echo '<tr class="tr_body" style ="background-color:  #f0f9ef"><td>'.$rrrrr['productPrice']* $row1["quantity"].'</td>';
echo '<td>'.$rrrrr['productPrice'].'</td>';
echo ' <td>'.$rrrrr["size"].'</td>';
echo '<td>'.$row1["quantity"].'</td>';
echo '<td>'.$rrrrr["productName"].'</td> </tr>';
$total_products += ($rrrrr["productPrice"]) * ($row1["quantity"]);
}
}}
$tax= '0.15';
$tax=$total_products*0.15;
            $order_delivery = 10;
            $total = $total_products + $tax + $order_delivery;

            $stmt3 = $connect -> prepare("UPDATE oorder SET totalPrice = ? WHERE OrderID = ?");
            $stmt3 -> execute(array($total,$order_id));



?>

    </table>
	
    <ul class="ul_info_pro"  style="margin-left: auto; margin-right: auto; text-align: right;padding-top: 8px ;">
      <li><span class="title">المجموع: </span><span class="value"><?php echo $total_products; ?></span></li>
      <li><span class="title">الضريبة: </span><span class="value"><?php  echo $tax; ?></span></li>
      <li><span class="title">سعر التوصيل: </span><span class="value"><?php echo $order_delivery; ?></span></li>
      <li><span class="title">إجمالي المبلغ: </span><span class="value"><?php echo $total; ?></span></li>
    </ul>
</div>

</div>

				  
				  
				  


<br>

<br>

<br>



     <div class="">

<div class="">
   
<table class="manage_buy  table-responsive" style=" margin-left: auto;
  margin-right: auto; background-color:   #f0f9ef">
  <tr class="tr_body" >
    <th colspan="3" style="background-color:  #cbeac8">معلومات المشتري</th>
  </tr>
  <tr  class="tr_body " style="height: 35px; line-height: 35px; background-color:  #cbeac8">
    <td width="300" style="color: #000;">رقم الهاتف</td>
    <td width="300" style="color: #000;"> الايميل</td>
    <td width="300" style="color: #000;">الاسم </td>

  </tr>
  
  
    <tr class="tr_body"  style="height: 35px; line-height: 35px; ">
    <td width="300" style="color: #000;"><?php echo  $phonenumber;?></td>
    <td width="300" style="color: #000;"><?php echo $emailbuyer;?></td>
    <td width="300" style="color: #000;"><?php echo$fullname;?></td>

  </tr >
 
   <tr  class="tr_body mainbag"  style="" style="background-color:  #cbeac8">
    <th colspan="3" style="background-color:  #cbeac8"> معلومات  التوصيل</th>
	
  </tr>
  
  <tr class="tr_body" style="height: 35px; line-height: 35px;  " >
 <td colspan="3" >
<?php echo $roweew['adress'];?>

  </td>
  </tr>
 
 
</table>

</div>

</div>











<br> 
<br>

<br>
				  
				  
				  
      </main>

      <footer>
          <ul class="foot">
         
              <li> <a href="mailto:noufib1252@gmail.com">  <img
src="images/call-center.png" alt="khadra" /> تواصل معنا  </a> </li>
          </ul>
      </footer>

      <script src="javascript/header.js"></script>
  </body>
</html>
<?php
    } else {
      header("location: login.php");
      exit;
    }
  } else {

  header("location: login.php");
  exit;

  }
?>