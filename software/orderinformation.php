<?php

    ob_start();
    session_start();
    session_regenerate_id();

   if (isset($_GET["order_id"])) {
	   $order_id=$_GET["order_id"];
	        // include("updateRecomendationTable.php");

        function header_page($page_url) {
            header("location: $page_url");
            exit;
        }

        if (!isset($_SESSION["role"])) {
          header_page("login.php");
        } else {

          if ($_SESSION["role"] != "buyer") {

            if ($_SESSION["role"] == "seller") {

              header_page("login.php");

            } else {

              header_page("login.php");

            }

          }

        }

        include("connect.php"); // Include Connection File
        $order_id = filter_var($_GET["order_id"], FILTER_SANITIZE_NUMBER_INT); // Filter The Order ID
        $stmt = $connect -> prepare("SELECT OrderDate,OrderState FROM oorder WHERE OrderID = ?");
        $stmt -> execute(array($order_id));
        $order_exist = $stmt -> rowCount();
        $order_info = $stmt -> fetch();

        if ($order_exist > 0) {

          $stmt2 = $connect -> prepare("SELECT
                                            product.productName,
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
                                            product.productID = ordered_items.product_id
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
		  	<link rel="icon" type="image/jpg" sizes="16*16" href="images/ii.jpg" />	
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title> معلومات المشتري </title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="keywords" content="نبات، نباتات ، صبار، اعشاب، بائعين">
        <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1" />
          <link rel="stylesheet" href="style.css" />
          <style>
            .progressbar_hy li svg{right:unset;}
            @media (max-width: 768px){
              .progressbar_hy li {
                width: auto;
                margin:10px;
              }
              .progressbar_hy li svg{display:none;}
            }
          </style>
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
 include('loginphp.php');
 $rr= $_SESSION['role'];
if(isset($_SESSION['role'])){
switch ($rr) {
  case 'seller':
    break;
    case 'admin':
    break;
 case 'buyer':
    echo ' <a href="basket.php" class="cart">
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
            </a>';

    break;
      default:
  echo ' <a href="basket.php" class="cart">
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
            </a>';

    break;

} }




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
            <div>

     <div>

    <form method="POST" action="buyerprofile.php">       &nbsp; <a href="signout.php" name="so" ><img height="20px" width="20px"  src="images/logout.svg"> </a>         </form> </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header End -->
        <!-- Header End -->




                <main>




                                  <div class = "nprofilePage-f ">
                                    <br>
                                      <h3 class="mt-7 pp mainColor ">معلومات الطلب</h3>
                                      <!-- Order State -->
                                      <br>

                                      <!-- <div class="order_state " id="order_state">
                                          <div class="to_cont ">
                                            <div class="btn-success" >
                                              <?php
                                                //echo $order_info["OrderState"];
                                              ?>
                                            </div>
                                          </div>
                                      </div> -->

                                      <div class="container text-right mb-5">
                                        <p style="margin-bottom:20px">
                                          <span class="btn-success" style="margin-right:10px;"><?= $order_info["OrderState"] ?></span>
                                        </p>
                                        
                                      </div>

                                      <div class="container mainbag">

                                          <div class="border-tab mainbag">
                                              <ul class="order_list_sm">
                                                  <li>تاريخ الطلب: <?php echo $order_info["OrderDate"]; ?></li>
                                                  <li>رقم الطلب: <?php echo $order_id; ?></li>
                                              </ul>
                                              <table class="manage_buy table-responsive">
                                                  <tr style="height: 50px;line-height: 50px">
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
//$rowee = mysqli_fetch_assoc($resultee)

while ($rowee = mysqli_fetch_assoc($resultee)){


  $idproduct = $rowee['product_id'];
  $resultqq = "SELECT * FROM product WHERE productID='$idproduct' ";
  $resultqqq = mysqli_query($con, $resultqq);
  while ($rrrrr = mysqli_fetch_assoc($resultqqq)){

$idddd=$rowee['product_id'];
$sqloo="SELECT * FROM ordered_items  WHERE product_id= '$idproduct' AND order_id='$order_id'";
$resultsss=mysqli_query($con, $sqloo);



while ($row1 = mysqli_fetch_assoc($resultsss)){

echo '<tr class="tr_body"><td>'.$rrrrr['productPrice']* $row1["quantity"].'</td>';
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
                                              <ul class="ul_info_pro" style="text-align: right;padding-top: 8px">
                                                <li><span class="title">المجموع: </span><span class="value"><?php echo $total_products; ?></span></li>
                                                <li><span class="title">الضريبة: </span><span class="value"><?php  echo $tax; ?></span></li>
                                                <li><span class="title">سعر التوصيل: </span><span class="value"><?php echo $order_delivery; ?></span></li>
                                                <li><span class="title">إجمالي المبلغ: </span><span class="value"><?php echo $total; ?></span></li>
                                              </ul>
                                          </div>

                                      </div>

                                      <?php

                                        $orderProg = array(
                                          "طلب جديد",
                                          "قيد المعالجة",
                                          "جاري الشحن",
                                          "تم التوصيل",
                                          "إلغاء الطلب"
                                        );
 
                                      ?>

                                      <!-- Progress Bar -->
                                      <div class="container p-5 mt-5" dir="rtl" style="margin-top:50px;padding:30px 0; ">
                                        <ul class="progressbar_hy">
                                          <li class="<?php if (array_search($order_info["OrderState"], $orderProg) >= 0) { echo "active_hy"; } ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 512 512" width="512" height="512"><title>Commercial delivery </title><g id="_Group_2" data-name=" Group 2"><path d="M496,254.18v202.1a23.091,23.091,0,0,1-23.08,23.09H335.89a23.084,23.084,0,0,1-23.08-23.09V254.18a23.076,23.076,0,0,1,23.08-23.08h31.17v.07a17.156,17.156,0,0,0,17.16,17.16h40.37a17.156,17.156,0,0,0,17.16-17.16v-.07h31.17A23.082,23.082,0,0,1,496,254.18ZM376.92,382.13V349.15H343.95v32.98Z" style="fill:#f8ec7d "/><path d="M367.06,231.1v-1.05a17.156,17.156,0,0,1,17.16-17.16h40.37a17.156,17.156,0,0,1,17.16,17.16v1.12a17.156,17.156,0,0,1-17.16,17.16H384.22a17.156,17.156,0,0,1-17.16-17.16Z" style="fill:#6fe3ff"/><path d="M391.31,140.98v71.91h-7.09a17.156,17.156,0,0,0-17.16,17.16v1.05H335.89a23.076,23.076,0,0,0-23.08,23.08v148.8L203.65,466V249.3L391.29,140.97Z" style="fill:#c16752"/><polygon points="203.65 249.3 107.99 194.07 295.62 85.73 295.63 85.73 391.29 140.97 203.65 249.3" style="fill:#af593c"/><rect x="343.95" y="349.15" width="32.97" height="32.98" style="fill:#6fe3ff"/><polygon points="295.62 85.73 107.99 194.07 16.02 140.97 203.65 32.63 295.62 85.73" style="fill:#c16752"/><polygon points="203.65 249.3 203.65 466 16 357.66 16 140.98 16.02 140.97 107.99 194.07 203.65 249.3" style="fill:#e48e66"/><path d="M351.28,325.01h-7.33a7,7,0,0,1-7-7V285.03a7,7,0,0,1,7-7h32.97a7,7,0,0,1,7,7v4.71a7,7,0,0,1-13.617,2.29H350.95v18.98h.33a7,7,0,0,1,0,14Z" style="fill:#6fe3ff"/><path d="M351.28,453.24h-7.33a7,7,0,0,1-7-7V413.27a7,7,0,0,1,7-7h32.97a7,7,0,0,1,7,7v6.74a7,7,0,0,1-14,.26H350.95v18.97h.33a7,7,0,0,1,0,14Z" style="fill:#6fe3ff"/><path d="M372.54,323.99a6.972,6.972,0,0,1-4.947-2.048L356.4,310.762a7,7,0,1,1,9.9-9.9l6.241,6.235,20.5-20.5a7,7,0,1,1,9.9,9.9l-25.45,25.45A6.979,6.979,0,0,1,372.54,323.99Z" style="fill:#2561a1"/><path d="M372.54,453.24a6.972,6.972,0,0,1-4.947-2.048L356.4,440.012a7,7,0,1,1,9.9-9.9l6.241,6.235,20.5-20.5a7,7,0,1,1,9.9,9.9l-25.45,25.45A6.979,6.979,0,0,1,372.54,453.24Z" style="fill:#2561a1"/><path d="M464.86,308.52H420.89a7,7,0,0,1,0-14h43.97a7,7,0,0,1,0,14Z" style="fill:#e48e66"/><path d="M464.86,372.64H420.89a7,7,0,0,1,0-14h43.97a7,7,0,0,1,0,14Z" style="fill:#e48e66"/><path d="M464.86,436.76H420.89a7,7,0,0,1,0-14h43.97a7,7,0,0,1,0,14Z" style="fill:#e48e66"/></g></svg>
                                            طلب جديد
                                          </li>
                                          <li class="<?php if (array_search($order_info["OrderState"], $orderProg) >= 1) { echo "active_hy"; } ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 512 512" width="512" height="512"><title>Parcel boxses</title><g id="_Group_2" data-name=" Group 2"><polygon points="491 289.78 491 425.36 373.59 493.15 373.59 357.56 491 289.78" style="fill:#c16752"/><polygon points="256.9 289.36 373.59 221.99 374.24 222.36 491 289.78 373.59 357.56 337.99 336.91 401.43 299.56 368.89 279.67 303.81 317.06 303.44 317.06 256.17 289.78 256.9 289.36" style="fill:#e48e66"/><polygon points="373.59 357.56 373.59 493.15 256.17 425.36 255.83 425.36 255.83 289.78 256.17 289.78 303.44 317.06 303.81 317.06 303.81 404.13 338.16 438.02 337.99 336.91 373.59 357.56" style="fill:#cc7266"/><polygon points="401.43 299.56 337.99 336.91 338.16 438.02 303.81 404.13 303.81 317.06 368.89 279.67 401.43 299.56" style="fill:#6fe3ff"/><polygon points="374.32 86.64 374.32 222.22 374.24 222.36 373.59 221.99 256.9 289.36 256.9 154.42 374.32 86.64" style="fill:#c16752"/><polygon points="374.32 86.64 256.9 154.42 221.3 133.77 284.75 96.42 252.21 76.54 187.13 113.92 186.76 113.92 139.49 86.64 256.9 18.85 374.32 86.64" style="fill:#e48e66"/><polygon points="284.75 96.42 221.3 133.77 221.48 234.88 187.13 200.99 187.13 113.92 252.21 76.54 284.75 96.42" style="fill:#6fe3ff"/><polygon points="256.9 154.42 256.9 289.36 256.17 289.78 255.83 289.78 139.32 222.52 139.49 222.22 139.49 86.64 186.76 113.92 187.13 113.92 187.13 200.99 221.48 234.88 221.3 133.77 256.9 154.42" style="fill:#cc7266"/><polygon points="255.83 289.78 255.83 425.36 138.41 493.15 138.41 357.56 255.83 289.78" style="fill:#c16752"/><polygon points="255.83 289.78 138.41 357.56 102.81 336.91 166.26 299.56 133.72 279.67 68.64 317.06 68.27 317.06 21 289.78 138.41 221.99 139.32 222.52 255.83 289.78" style="fill:#e48e66"/><polygon points="166.26 299.56 102.81 336.91 102.99 438.02 68.64 404.13 68.64 317.06 133.72 279.67 166.26 299.56" style="fill:#6fe3ff"/><polygon points="138.41 357.56 138.41 493.15 21 425.36 21 289.78 68.27 317.06 68.64 317.06 68.64 404.13 102.99 438.02 102.81 336.91 138.41 357.56" style="fill:#cc7266"/></g></svg>
                                            قيد المعالجة
                                          </li>
                                          <li class="<?php if (array_search($order_info["OrderState"], $orderProg) >= 2) { echo "active_hy"; } ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 512 512" width="512" height="512"><title>Delivery Tracking</title><g id="_Group_2" data-name=" Group 2"><path d="M470.72,322.08v86.77a24.422,24.422,0,0,1-24.42,24.42H427.07a42.73,42.73,0,1,0-85.46,0H311.74V322.08Z" style="fill:#af593c"/><path d="M407.82,253.55l62.9,68.53H311.74V245.64h78.09A24.408,24.408,0,0,1,407.82,253.55Z" style="fill:#6fe3ff"/><path d="M384.34,390.53a42.735,42.735,0,1,1-42.73,42.74A42.737,42.737,0,0,1,384.34,390.53Z" style="fill:#f8ec7d"/><path d="M311.74,322.08V433.27H181.69a42.735,42.735,0,1,0-85.47,0H65.7a24.422,24.422,0,0,1-24.42-24.42V204.97A24.416,24.416,0,0,1,65.7,180.55H79.3l2.4-1.02A110.817,110.817,0,0,0,104.14,213l74.24,77.5L252.63,213a111.435,111.435,0,0,0,22.04-32.52l.17.07h12.48a24.422,24.422,0,0,1,24.42,24.42V322.08Z" style="fill:#e48e66"/><path d="M282.77,134.27a99.654,99.654,0,0,1-6.23,41.58c-.58,1.56-1.2,3.11-1.87,4.63A111.435,111.435,0,0,1,252.63,213l-74.25,77.5L104.14,213A110.817,110.817,0,0,1,81.7,179.53c-.52-1.21-1.01-2.44-1.47-3.68A99.654,99.654,0,0,1,74,134.27C77.55,82.16,120.02,36,178.38,36S279.22,82.16,282.77,134.27Zm-36.06-1.23c0-37.97-30.59-68.76-68.33-68.76s-68.32,30.79-68.32,68.76,30.59,68.75,68.32,68.75S246.71,171.01,246.71,133.04Z" style="fill:#6fe3ff"/><path d="M178.38,64.28c37.74,0,68.33,30.79,68.33,68.76s-30.59,68.75-68.33,68.75-68.32-30.78-68.32-68.75S140.65,64.28,178.38,64.28Z" style="fill:#f8ec7d"/><path d="M138.95,390.53a42.735,42.735,0,1,1-42.73,42.74A42.74,42.74,0,0,1,138.95,390.53Z" style="fill:#f8ec7d"/><path d="M163.283,161.57a6.984,6.984,0,0,1-5.326-2.454l-14.97-17.53a7,7,0,1,1,10.646-9.092l10.532,12.333,37.808-30.757a7,7,0,0,1,8.835,10.86L167.7,160A6.974,6.974,0,0,1,163.283,161.57Z" style="fill:#e48e66"/></g></svg>
                                            جاري الشحن
                                          </li>
                                          <li class="<?php if (array_search($order_info["OrderState"], $orderProg) >= 3) { echo "active_hy"; } ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 512 512" width="512" height="512"><title>Parcel Document 2</title><g id="_Group_2" data-name=" Group 2"><path d="M415.23,240.18a70.727,70.727,0,1,1-18.47,2.44A70.779,70.779,0,0,1,415.23,240.18Z" style="fill:#6fe3ff"/><path d="M396.76,99.87V242.62a70.839,70.839,0,0,0-47.91,92.95H182.6a21.535,21.535,0,0,1-21.54-21.54V297.32l19.75-19.75a24.2,24.2,0,0,0,0-34.22l-5.7-5.7-14.05,11.12V35.25A21.535,21.535,0,0,1,182.6,13.71h128V78.33a21.548,21.548,0,0,0,21.54,21.54Zm-47.85,62.19v-32.7h-140v32.7h12.82v67.86H336.28V162.06Z" style="fill:#e48e66"/><path d="M396.76,99.87H332.14A21.548,21.548,0,0,1,310.6,78.33V13.71Z" style="fill:#f8ec7d"/><polygon points="348.91 129.36 348.91 162.06 336.28 162.06 296.52 162.06 261.49 162.06 221.73 162.06 208.91 162.06 208.91 129.36 348.91 129.36" style="fill:#f8ec7d"/><polygon points="336.28 162.06 336.28 229.92 221.73 229.92 221.73 162.06 261.49 162.06 261.49 162.3 261.49 196.42 278.78 185.95 296.52 196.42 296.52 162.3 296.52 162.06 336.28 162.06" style="fill:#e5d45a"/><polygon points="296.52 162.3 296.52 196.42 278.78 185.95 261.49 196.42 261.49 162.3 261.49 162.06 296.52 162.06 296.52 162.3" style="fill:#6fe3ff"/><path d="M161.06,248.77l14.05-11.12,5.7,5.7a24.2,24.2,0,0,1,0,34.22l-19.75,19.75v16.71a21.535,21.535,0,0,0,21.54,21.54h28.08v40.12a32.256,32.256,0,0,1-32.26,32.26v23.41H52.61V275.98a32.236,32.236,0,0,1,9.25-22.6l99.2-79.14Z" style="fill:#f8ec7d"/><path d="M199.39,441.36v46.93a10,10,0,0,1-10,10H36a10,10,0,0,1-10-10V441.36a10,10,0,0,1,10-10H189.39A10,10,0,0,1,199.39,441.36ZM73.18,465.63a12.106,12.106,0,1,0-12.1,12.5A12.309,12.309,0,0,0,73.18,465.63Z" style="fill:#6fe3ff"/><ellipse cx="61.08" cy="465.63" rx="12.1" ry="12.5" style="fill:#2561a1"/><path d="M146.16,398.82a7,7,0,0,1-7-7V375.69a6.994,6.994,0,0,1,1.177-3.884,36.8,36.8,0,0,0,2.687-35.86,40.457,40.457,0,0,1-2.838-8.076,37.063,37.063,0,0,1-1.026-8.63q0-.206.012-.411l.439-7.461a7.007,7.007,0,0,1,2.039-4.538l34.209-34.21a17.2,17.2,0,0,0,0-24.32l-1.293-1.293-72.592,57.472a7,7,0,0,1-8.69-10.977l77.482-61.341a7,7,0,0,1,9.294.54l5.7,5.7a31.2,31.2,0,0,1,0,44.119l-32.328,32.328-.27,4.584a23.166,23.166,0,0,0,.646,5.2,26.573,26.573,0,0,0,1.878,5.333,50.911,50.911,0,0,1-2.525,47.754v14.1A7,7,0,0,1,146.16,398.82Z" style="fill:#d3c76c"/><path d="M333.68,266.66H223a7,7,0,0,1,0-14H333.68a7,7,0,0,1,0,14Z" style="fill:#f8ec7d"/><path d="M285.96,302.2H223a7,7,0,0,1,0-14h62.96a7,7,0,0,1,0,14Z" style="fill:#f8ec7d"/><path d="M415.23,303.56a10.26,10.26,0,1,1,10.26-10.26,7,7,0,0,0,7,7,6.9,6.9,0,0,0,6.885-7A24.371,24.371,0,0,0,422,270.074V266.55a7,7,0,1,0-14,0v3.523a24.278,24.278,0,0,0,7.173,47.487,10.264,10.264,0,0,1,.092,20.527l-.041,0-.045,0a10.273,10.273,0,0,1-10.221-10.257,7,7,0,0,0-7-7,7.1,7.1,0,0,0-7.114,7A24.175,24.175,0,0,0,408,351.057v4.3a7,7,0,0,0,14,0v-4.3a24.245,24.245,0,0,0-6.77-47.5Z" style="fill:#2561a1"/></g></svg>
                                            تم التوصيل
                                          </li>
                                          <li class="<?php if (array_search($order_info["OrderState"], $orderProg) >= 4) { echo "active_hy"; } ?>">
                                            <svg style="width:30px;right:65px;" height="365pt" viewBox="0 0 365.71733 365" width="365pt" xmlns="http://www.w3.org/2000/svg"><g fill="#f44336"><path d="m356.339844 296.347656-286.613282-286.613281c-12.5-12.5-32.765624-12.5-45.246093 0l-15.105469 15.082031c-12.5 12.503906-12.5 32.769532 0 45.25l286.613281 286.613282c12.503907 12.5 32.769531 12.5 45.25 0l15.082031-15.082032c12.523438-12.480468 12.523438-32.75.019532-45.25zm0 0"/><path d="m295.988281 9.734375-286.613281 286.613281c-12.5 12.5-12.5 32.769532 0 45.25l15.082031 15.082032c12.503907 12.5 32.769531 12.5 45.25 0l286.632813-286.59375c12.503906-12.5 12.503906-32.765626 0-45.246094l-15.082032-15.082032c-12.5-12.523437-32.765624-12.523437-45.269531-.023437zm0 0"/></g></svg>
                                            إلغاء الطلب
                                          </li>
                                        </ul>
                                      </div>

                                  </div>
                </main>

                <footer>
                    <ul class="foot">
                        <li> <a href="joinus.html"> <img src="images/collaboration.png" alt="khadra" /> انضم الينا  </a></li>
                        <li> <a href="mailto:noufib1252@gmail.com">  <img src="images/call-center.png" alt="khadra" /> تواصل معنا  </a> </li>
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