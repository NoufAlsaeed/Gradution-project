<?php include('loginphp.php');
if (isset($_SESSION['id'])) {
} else {
    header('location:login.php');
}
//session_start();
$rr = $_SESSION['role'];
if (isset($_SESSION['role'])) {
    switch ($rr) {
        case 'seller':
            header('location:login.php');
        case 'admin':
            header('location:login.php');
            close();

            break;

        case 'buyer':

            break;
    }
} else {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="ar" id="top" class="js no-touch localstorage">
<head>
		<link rel="icon" type="image/jpg" sizes="16*16" href="images/ii.jpg" />	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> معلومات التوصيل </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="نبات، نباتات ، صبار، اعشاب، بائعين">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css"/>

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

                    <img class="nav__toggle" aria-expanded="false" src="images/menu.svg.png"
                         style="width: 28px; height: 28px;">

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

                    <form method="POST" action="buyerprofile.php"> &nbsp; <a href="signout.php" name="so"><img
                                    height="20px" width="20px" src="images/logout.svg"> </a></form>
                </div>
            </div>
        </div>
</header>
<!-- Header End -->


<main>
    <div class="nprofilePage">
        <h1 class='mb-3  mt-3 text-center mainColor pp' style='font-size: 170%'>معلومات التوصيل</h1>
  
        <div class="nprofileBorder">

            <form action="orderinformation.php">

                <div class="nprofileContet" dir="rtl">
                    <!-- <label for="province_id">المحافظة :</label> -->
                    <select name="province_id" id="province-id" class="form-control">
                        <option value="">اختر المنطقة الادارية</option>
                        <?php
                        include "db.php";
                        // $sql = mysqli_query($db,"SELECT * FROM `sa_provinces` WHERE 1 ");
                        // if (mysqli_num_rows($sql)>0){
                        //     while($x = mysqli_fetch_array($sql)){
                        //         $province_id = $x['id'];
                        //         $province_name = $x['name'];
                        //         echo "<option value='".$province_id."'>".$province_name."</option>";
                        //     }
                        // }
                            $stmt = $conn->prepare("SELECT * FROM `sa_provinces`");
                            $stmt->execute();
                            $provinces = $stmt->fetchAll();
                            foreach ( $provinces as $pro ){
                                echo '<option value="'.$pro['id'].'">'.$pro['name'].'</option>';
                            }
                        ?>
                    </select>
                </div>
				<br>

                <div class="nprofileContet" dir="rtl">
                    <!-- <label for="city_id">المدينة :</label> -->
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="">اختر مدينة</option>
                    </select>
                </div>
				<br>

                <div class="nprofileContet" dir="rtl">
                    <!-- <label for="neighborhood_id">الحى :</label> -->
                    <select name="neighborhood_id" id="neighborhood_id" class="form-control">
                        <option value="">اختر الحى</option>
                    </select>
                </div>
				<br>


                <div class="nprofileContet-d">
                    <input type="text" style="max-width:100%;width:100%" dir="rtl" autocomplete="off" max="5" id="shopname" name="shopname" class="form-control" placeholder=" الرمز البريدي" require>
                    <div id="shopname" class="invalid-feedback">
                        يجب أن يكون الرمز البريدي عبارة عن ارقام فقط    
                    </div>
                </div>
                <br/>

                <div class="nprofileContet">
                    <input type="text" style="max-width:100%;width:100%" id="address" autocomplete="off" dir="rtl" class="form-control" class="home_id" maxlength="10" name="address" placeholder="رقــم المنـــزل" require>
                    <div id="address" class="invalid-feedback">
                        يجب أن يكون رقم المنزل عبارة عن ارقام فقط    
                    </div>
                </div>
                <br />
                
                <div class="payMethod">
                    <select id="payMethod" dir="rtl" class="form-control">
                          <option>طريقة الدفع</option>
                      
                          <option value="الدفع عند الاستلام">الدفع عند الاستلام</option>
                    </select>
                    <!-- <label for="payMethod" class="text">:طريقة الدفع</label> -->
                </div>


        </div>
        <br>
        <div><input type="submit" style="display:none" class="btn-success" id="submit" value="تأكيد الطلب"></div>
        <br>

        <!--  <button type="button" class="cancelbtn">Cancel</button> -->

        </form>


</main>
<footer>
    <ul class="foot">
        <li><a href="joinus.php"> <img src="images/collaboration.png" alt="khadra"/> انضم الينا </a></li>
        <li><a href="mailto:noufib1252@gmail.com"> <img src="images/call-center.png" alt="khadra"/> تواصل معنا </a></li>
    </ul>
</footer>
</body>
<script src="javascript/header.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
    $(document).ready(function(){


        $('#province-id').on('change', function() {

            var province_id = $(this).val();
            if( province_id >= 1 )
            {
                $.ajax({
                    url: 'ajax.php',
                    type: 'post',
                    data: {
                        cities: 'true',
                        province_id: province_id,
                    }
                }).done(function(data) {
                    var parsedTest = JSON.parse(data);
                    $('#city_id').html('<option value="">اختر مدينة</option>');
                    $.each(parsedTest, function(index, value) { 
                        $('#city_id').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                });
            } else {
                $('#city_id').html('<option value="">اختر مدينة</option>');
                $('#neighborhood_id').html('<option value="">اختر الحى</option>');
            }
        });


        $(document).on('change','#city_id', function(){ 
            var city_id = $(this).val();

            if(city_id >= 1) {

                $.ajax({
                    url: 'ajax.php',
                    type: 'post',
                    data: {
                        neighborhood: 'true',
                        cities: 'false',
                        city_id: city_id,
                    }
                }).done(function(data) {
                    var parsedTest = JSON.parse(data);
                    $('#neighborhood_id').html('<option value="">اختر الحى</option>');
                    $.each(parsedTest, function(index, value) { 
                        $('#neighborhood_id').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                });
            
            } else {
                $('#neighborhood_id').html('<option value="">اختر الحى</option>');
            }
        });

        $(document).on('click','#submit', function(e){ 
              e.preventDefault();

                var pVal= $('#province-id').val();
                var cityVal = $('#city_id').val();
                var neiVal = $('#neighborhood_id').val();
                var Xshopname = $('#shopname').val();
                var Xhome_id =  $('.home_id').val();
                var XpayMethod =  $('#payMethod').val();

                if(pVal == '')
                {
                    alert('من فضلك فوم باختيار المنطقة الادارية');
                }
                else if( cityVal == '' )
                {
                    alert('من فضلك قوم باختيار المدينة');
                }
                else if( neiVal == '' )
                {
                    alert('من فضلك قوم باختيار الحى');
                }
                else if (Xshopname == ''){
                    alert('يجب ادخال الرمز البريدي');
                }
                else if (Xhome_id == ''){
                    alert('من فضلك ادخل رقم المنزل');
                }
                else if (XpayMethod == ''){
                    alert('من فضلك قوم باختيار طريقة الدفع');
                }else {

                      var province = 'المحافظة: '+$('#province-id option:selected').text();
                      var city = 'المدينة: '+$('#city_id option:selected').text();
                      var neighborhood = 'الحى: '+$('#neighborhood_id option:selected').text();
                      var shopname = 'الرمز البريدي: '+$('#shopname').val();
                        var home_id = 'رقــم المنـــزل: '+$('.home_id').val();
                      

                      var address = province +','+ city +','+ neighborhood +','+ shopname +','+ home_id;
                      var payMethod = $('#payMethod').val();

                      $.ajax({
                          url: 'ajax.php',
                          type: 'post',
                          data: {
                              neighborhood: 'false',
                              cities: 'false',
                              order: 'true',
                              address: address,
                              payMethod: payMethod,
                          }
                      }).done(function(data) {

                            var id = data.trim();

    
                            alert('تم استلام طلبك بنجاح \n شكراً لتسوقك معنا')
						 
						   window.location.href = "orderinformation.php?order_id="+id;
						  
						 
                      });
                }//End if
            

        });
        //home_id
        $('#address').on('keyup', function(){

            var intRegex = /^\d+$/;
            var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

            var str = $(this).val();
            if(intRegex.test(str) || floatRegex.test(str)) {
                $(this).removeClass('is-invalid');
                $(this).next().fadeOut(500);
                $('#submit').fadeIn(500);
            }else {
                $(this).addClass('is-invalid');
                $(this).next().fadeIn(500);
                $('#submit').fadeOut(500);
            }
        });


        $('#shopname').on('keyup', function(){

            var intRegex = /^\d+$/;
            var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

            var str = $(this).val();
            if(intRegex.test(str) || floatRegex.test(str)) {
                $(this).removeClass('is-invalid');
                $(this).next().fadeOut(500);
                
            }else {
                $(this).addClass('is-invalid');
                $(this).next().fadeIn(500);
            }
        });
    });
</script>


</html>

	<?php 	//session_start(); 
		    // $orderedid= $_SESSION['ORDERID']; 
		
							 ?> 
