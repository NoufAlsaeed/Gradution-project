<?php
    ob_start();
    session_start();
    include "db.php";
	unset($_SESSION["shopping_cart"]);



    if( $_SERVER['REQUEST_METHOD'] == 'POST' &&  $_POST['cities'] == 'true' )
    {

        $province_id = $_POST['province_id'];

        $stmt = $conn->prepare("SELECT * FROM `sa_cities` WHERE province_id=$province_id ORDER BY name ASC");
        $stmt->execute();
        $cities = $stmt->fetchAll();
        echo json_encode($cities);
    }
    elseif ( $_SERVER['REQUEST_METHOD'] == 'POST' &&  $_POST['neighborhood'] == 'true' ) {
        
        $city_id = $_POST['city_id'];
        $stmt = $conn->prepare("SELECT * FROM `sa_neighborhoods` WHERE city_id=$city_id ORDER BY name ASC");
        $stmt->execute();
        $neighborhoods = $stmt->fetchAll();
        echo json_encode($neighborhoods);
    }
    elseif( $_SERVER['REQUEST_METHOD'] == 'POST' &&  $_POST['order'] == 'true' ){

        $TotalPrice = $_COOKIE['totalPrice'];
        $tax = $_COOKIE['tax'];
        $deliveryCost = $_COOKIE['deliveryCost'];
        $sellerID = $_COOKIE['sellerID'];
        $BuyerID = $_COOKIE['BuyerID'];
        $address = $_POST['address'];
        $payMethod = $_POST['payMethod'];
        $stmt = $conn->prepare("INSERT INTO
                                           oorder(SellerID, BuyerID, OrderDate, totalPrice, OrderState, payMethod, adress, deliveryCost, tax)
                                           VALUES(:zSellerID, :zBuyerID, :zOrderDate, :ztotalPrice, :zOrderState, :zpayMethod, :zadress, :zdeliveryCost, :ztax)");
        $stmt->execute(array(
            'zSellerID'       => $sellerID,
            'zBuyerID'        => $BuyerID,
            'zOrderDate'      => date('Y-m-d'),
            'ztotalPrice'     => $TotalPrice,
            'zOrderState'     => 'جديد',
            'zpayMethod'      => $payMethod,
            'zadress'         => $address,
            'zdeliveryCost'   => $deliveryCost,
            'ztax'            => $tax,
        ));

        $lastID = $conn->lastInsertId();
		$orderedid =  $lastID ; 
		//$_SESSION['orderid']= 	        $lastID   ; 
	
     //    $_SESSION['ORDERID']= $lastID; 
	


		
		

        foreach($_SESSION['ids'] as $key => $val)
        {
            $stmt2 = $conn->prepare("INSERT INTO ordered_items(order_id, product_id, quantity)
                                            VALUES(:zorder_id, :zproduct_id, :zquantity)");

            $id = $_SESSION['ids'][$key];
            $quantity = $_SESSION['quantitys'][$key];

            $stmt2->execute(array(
                'zorder_id'      => $lastID,
                'zproduct_id'    => $id,
                'zquantity'      => $quantity,
            ));
                            
			             

            $stmt3 = $conn->prepare("SELECT `productQuantity` FROM `product` WHERE `productID`= $id");
            $stmt3->execute();
            $row = $stmt3->fetch();

            $orignQ = (abs($row['productQuantity'] - $_SESSION['quantitys'][$key]) ).'<br />';

            $stmt4 = $conn->prepare("UPDATE product SET productQuantity=? WHERE productID=?");
            $stmt4->execute( array($orignQ, $id) );

        }
		
		  include("updateOrderRecomendation.php");
    
		
        echo $lastID;
    }




    ob_flush();



            