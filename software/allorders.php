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
<title> قائمة طلبات البائع </title>
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



<div class = "nprofilePage">
  <br>
<h3 class="mt-7 pp mainColor"  style='font-size: 170%' > قائمة الطلبات  </h3>
<br>

<?php 
/*
session_start();*/
include('db.php');


$ie = $_SESSION['id']; 
$sql = "SELECT * FROM oorder WHERE SellerID= '$ie' and  (OrderState='جاري الشحن' or OrderState='قيد المعالجة' or OrderState='جديد' or OrderState='طلب جديد') ORDER BY OrderID DESC";


$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0){	
	echo '<div class="byuerorders mainbag ">

<table class="table table-bordered mainbag">
<thead>

<tr  style="font-size: 120%" >

<th width="300">  حالة الطلب </th>
<th width="300">مجموع السعر </th>
<th width="300">اسم العميل   </th>
<th width="300">رقم الطلب </th>
</tr>
</thead>';
          while ($row = mysqli_fetch_assoc($result)){


  //start section for retrieve information for every buyer/
  $ie1 = $row['BuyerID']; 
  
  $sql1="SELECT Full_name FROM buyer WHERE id= '$ie1'";
  $result1 = mysqli_query($con, $sql1); 
  $row1 = mysqli_fetch_assoc($result1);
  //end section for retrieve information for every buyer/
  echo "<tr > ";  
  echo "<td><a href='managebuyer.php?order_id=".$row['OrderID']."'> ".$row['OrderState']."</td>";
    echo "<td><a href='managebuyer.php?order_id=".$row['OrderID']."'> ".$row['totalPrice']."</td>";
    echo "<td><a href='managebuyer.php?order_id=".$row['OrderID']."'>  ".$row1['Full_name']."</td>";
   echo "<td> <a href='managebuyer.php?order_id=".$row['OrderID']."'> ".$row['OrderID'] ." </a>";
 echo" </tr> ";
  
}
} else if (mysqli_num_rows($result) == 0){
	echo '<br> <br> <p style="font-size: 150%; color:lightgrey"> لا توجد لديك طلبات في الوقت الحالي </p> <br> <br> ';
}
?>


</table>

<br><br>
<br><br>
</div></div>
<br><br>
<br><br>


</main>

</main>
    <footer>
  <ul class="foot">
    
      <li> <a href="mailto:noufib1252@gmail.com">  <img src="images/call-center.png" alt="khadra" /> تواصل معنا  </a> </li> 
    </ul>
</footer>
  </body>
      <script src="javascript/header.js"></script>
</html>

