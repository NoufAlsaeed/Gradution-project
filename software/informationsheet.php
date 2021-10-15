
<?php include('loginphp.php');


 ?>
<!DOCTYPE html>
<html lang="ar" id="top" class="js no-touch localstorage">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> معلومات النبته </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
















<?php 

include('db.php');

$idid=$_GET['name'];
//$idid= 1; 
$sql="SELECT * FROM informationsheet  WHERE plantName='$idid'"; 

$resultss=mysqli_query($con, $sql);
while($row = mysqli_fetch_array($resultss)){

   
    echo '
         <div class = "profilePage">
         <h3> معلومات المنتج</h3>
         <br>
         <img height="200px" width="200px"  src="data:image/png;base64,'.( $row['plantPicture'] ).'" /> </h3><br><br>'; 

    echo '<h1 style="text-align: center;">'.$row['plantName'].'</h1> <br>'; 

    echo ' <div class = "iconCONINFO">  
           <p class="" style="padding-right:5px;padding-left:10px;padding-top:7px; text-align: justify;
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
           </div></div>';     

}
    

//$con->close(); 
mysqli_close($con);
 
?> 


   

 
   <!--
  
   
<div class = "profilePage">
  <h3> معلومات المنتج</h3>
  <br>
  <img src = "images/frashh.JFIF" height="200" width="200" >
  <br><br>
  <h3 class="infop"> شجرة الفراشه</h3>
  <p class="infop"> : وصف للنبته </p>
  <p class="infop">: معلومات عامة </p>
  <br>
  
  <div class = "iconCONINFO">
  
<img src="images/icons.png" alt="khadra"  /> 
   <p style="padding-right:5px;padding-left:20px; padding-top:7px;">اسم الفصيله:البقمية</p>
<img src="images/icons-plants_27.gif" alt="khadra"   /> 

   <p style="padding-right:5px;padding-left:10px;padding-top:7px; ">الرعاية : معتدل</p>
</div>
<br>
  <div class = "iconCONINFO">
<img src="images/icons2.png" alt="khadra" width="42" height="42"  /> 
   <p style="padding-right:5px;padding-left:20px; padding-top:7px;">مقاوم البيئة الحضرية:مقاوم</p>
<img src="images/15.png" alt="khadra" width="42" height="42"  /> 

   <p style="padding-right:5px;padding-left:10px;padding-top:7px; ">الري : متوسط</p>
</div>
<br>
  <div class = "iconCONINFO">
<img src="images/icons4.gif" alt="khadra" width="42" height="42"  /> 
   <p style="padding-right:5px;padding-left:20px; padding-top:7px;">النمو:معدل نمو اعتيادي</p>
<img src="images/icons5.gif" alt="khadra" width="42" height="42"  /> 

   <p style="padding-right:5px;padding-left:10px;padding-top:7px; ">الارتفاع:من 10 الى 6م</p>
</div>
</div>




 ----------------------------------------------------------------
  <div class = "informationPage">
  
  
 <div class = "iconCON">
 <a href="page11.html"><img class="im1" src = "images/frashh.JFIF" alt ="plant1" height="200" width="200"> </a>
 <br> &nbsp;<p>شجرة الفراشه &nbsp; <br></p>
 </div>
 <p class="infoOfPlant" >وصف للنبته المعطاه </p>
 
 <p class="texticon" >معلومات عامة </p>
 <br>
 <div class = "iconCON">

<p class="column" ><img src="images/icons.png" alt="Smiley face" width="42" height="42" style="float:right">اسم الفصيله:البقمية</p>
<p class="column" ><img src="images/icons1.gif" alt="Smiley face" width="42" height="42" style="float:right">الموطن:شبه الاستوائية</p>


</div>


 <p class="texticon" >الظروف البيئية </p>
 <br>
 <div class = "iconCON">

<p class="column" ><img src="images/icons2.png" alt="Smiley face" width="42" height="42" style="float:right">مقاوم البيئة الحضرية:مقاوم</p>
<p class="column" ><img src="images/icons3.png" alt="Smiley face" width="42" height="42" style="float:right">الجفاف:حساس</p>


</div>


 <p class="texticon" >شكل النبات </p>
 <br>
 <div class = "iconCON">

<p class="column" ><img src="images/icons4.gif" alt="Smiley face" width="42" height="42" style="float:right">النمو:معدل نمو اعتيادي</p>
<p class="column" ><img src="images/icons5.gif" alt="Smiley face" width="42" height="42" style="float:right">الارتفاع:من 10 الى 6م</p>

</div>
</div>
-->

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

