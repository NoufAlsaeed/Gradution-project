
<?php include('sellerprocess.php')?>

<?php  /*
session_start();

include('db.php');

if ( isset($_POST['selleremail'])) {
$emails =$_POST['selleremail'];


  $sqls= "SELECT id FROM seller WHERE email='$emails'";



  if (isset($emails)){
  $results  = mysqli_query($db, $sqls);

  $row = mysqli_fetch_assoc($results);
  $ids = $row["id"];
  $_SESSION['id'] = $ids ;
  $_SESSION['role'] = "seller";  
 
}
}*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_sellername = isset($_POST['sellername']) ? $_POST['sellername'] : '';
  $_sellerphonenumber = isset($_POST['sellerphonenumber']) ? $_POST['sellerphonenumber'] : '';
  $_shopimg = isset($_POST['shopimg']) ? $_POST['shopimg'] : '';
  $_selleremail = isset($_POST['selleremail']) ? $_POST['selleremail'] : '';
  $_shopname = isset($_POST['shopname']) ? $_POST['shopname'] : '';
  $_enumb = isset($_POST['enumb']) ? $_POST['enumb'] : '';
  $_address = isset($_POST['address']) ? $_POST['address'] : '';
}

?>



<!DOCTYPE html>
<html lang="ar">
<head>
  <title> انضم الينا </title>
		<link rel="icon" type="image/jpg" sizes="16*16" href="images/ii.jpg" />	
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <script type="text/javascript" src="javascript/validation.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="style.css">
 <style type="text/css">
 	body {
  font-family: 'Trebuchet MS', sans-serif;
 </style>
</head>

<body>
   <div id="page-container">
   <div id="content-wrap">

 

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
       
        </div>
      </div>
    </header>
    <!-- Header End -->


<main>
<div class = "nprofilePage" class="mainbag">
<br><h1 class='mb-3 pr-0 mt-3 text-center mainColor pp' style='font-size: 170%'>بائع جديد</h1>
  <br> 
<div class="container nprofileBorder-1" class="mainbag" >
 <!-- ------------------------------------------------------------------------------------------>  

<form method="post" action="joinus.php"onsubmit="valform2();" id="form2" enctype="multipart/form-data" class="mainbag p-5" dir="rtl">



<label class="d-block text-right mb-2">اسم المستخدم: </label>
<input type="text" id="username" name="sellername" value="<?php if(!empty($_sellername)){echo $_sellername;} ?>" placeholder="اسم المستخدم"  maxlength="45" class="form-control" required>  

<?php if (isset($name_error)): ?>
    <br>
  <span style="color:red;"><?php echo $name_error; ?></span>
  <br>
<?php endif ?>

<br />

<label class="d-block text-right mb-2">رقم الهاتف: </label>
<input type="tel" id="phone" name="sellerphonenumber" value="<?php if(!empty($_sellerphonenumber)){echo $_sellerphonenumber;} ?>" placeholder="رقم الهاتف" class="form-control" maxlength="13" required>  

	<?php if (isset($phone_error)): ?>
  <br>
<span style="color:red;"><?php echo $phone_error; ?></span>
<?php endif ?>
	
	


<br />

<label class="d-block text-right mb-2" >صورة المتجر:</label>
  <input type="file" id="myFile" name="shopimg" value="<?php if(!empty($_shopimg)){echo $_shopimg;} ?>"   class="form-control" required>
 <?php if (isset($shopimg_error)): ?>
        <br>
        <span style="color:red;"><?php echo $shopimg_error; ?></span>
        <br>
      <?php endif ?>

      <br />





<br />

<label class="d-block text-right mb-2"> البريد الالكتروني:</label>
<input type="email" id="email" name="selleremail" value="<?php if(!empty($_selleremail)){echo $_selleremail;} ?>"  placeholder="البريد الالكتروني" maxlength="255"  class="form-control" required> 

 <?php if (isset($email_error)): ?>
        <br>
        <span style="color:red;"><?php echo $email_error; ?></span>
        <br>
      <?php endif ?>

      <br />
      <label class="d-block text-right mb-2">  اسم المتجر:</label>
<input type="text" id="shopname" name="shopname" value="<?php if(!empty($_shopname)){echo $_shopname;} ?>"  placeholder=" اسم المتجر"  class="form-control" maxlength="50" required> 

 <?php if (isset($shopname_error)): ?>
        <br>
        <span style="color:red;"><?php echo $shopname_error; ?></span>
        <br>
      <?php endif ?>
      <br />
      <label class="d-block text-right mb-2"> السجل التجاري:</label>
<input type="text" id="enumb" name="enumb" value="<?php if(!empty($_enumb)){echo $_enumb;} ?>"  placeholder="السجل التجاري"  class="form-control" maxlength="20" required> 

 <?php if (isset($enumb_error)): ?>
        <br>
        <span style="color:red;"><?php echo $enumb_error; ?></span>
        <br>
      <?php endif ?>

      <br />

<label class="d-block text-right mb-2"> عنوان المتجر:</label>
<input type="text" id="address" name="address" value="<?php if(!empty($_address)){echo $_address;} ?>"  placeholder="عنوان المتجر"  class="form-control" maxlength="30" required> 

 <?php if (isset($address_error)): ?>
        <br>
        <span style="color:red;"><?php echo $address_error; ?></span>
        <br>
      <?php endif ?>


      <br />

      <label class="d-block text-right mb-2"> كلمة المرور:  </label>
<input type="password" id="password" name="passwordd"  placeholder="يجب ان تكون كلمة المرور من ٨ خانات فأكثر "  class="form-control" maxlength="255" required>

<br> 
<?php if (isset($pass_error)): ?>
        <span style="color:red;"><?php echo $pass_error; ?></span>
        <br>
      <?php endif ?>




</div> 
<br ><br >
  <div> <input  class="btn-success" type="submit" value="تسجيل" name="log"></div>
<br ><br >
   <!-- <input type="submit" value="تسجيل الدخول" name="log"> --> 
   
</form>
 <!-- ------------------------------------------------------------------------------------------> 

</main>

<footer>
  <ul class="foot">
 
      <li> <a href="mailto:noufib1252@gmail.com">  <img src="images/call-center.png" alt="khadra" /> تواصل معنا  </a> </li> 
    </ul>
</footer>
</div> 
</body>

  <script src="javascript/header.js"></script>


</html>