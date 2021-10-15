 <?php
//this page will calculate number of orderes for product with all products
include('db.php'); 
     $id1 = 	$orderedid; //orderID

    $sqlOrderRecomendation = "SELECT * FROM ordered_items where order_id='$id1'"; //retrive products in id
    $queryOrderRecomendation = mysqli_query($con, $sqlOrderRecomendation);



    while ($rowOrderRecomendation = mysqli_fetch_array($queryOrderRecomendation)) {
        $firstID = $rowOrderRecomendation['product_id']; //i will retrive its sellersizeid from the product table and use it replaced with product id
		// i should not use the first id , i should retrieve its sellersizeid then search about it as sizeid in orderrecomendation because i want to calculate number of orderes with the same size together
        $recrecforsize = "SELECT * FROM product where productID='$firstID'";
        $queryrecrecforsize = mysqli_query($con, $recrecforsize);
        while ($rowrecrecforsize = mysqli_fetch_array($queryrecrecforsize)) { //we retrived the first sizeid
            $firstSize = $rowrecrecforsize['sellerSizeID'];
        } 


       
        $sqlOrder = " SELECT * FROM ordered_items where order_id= '$id1'"; 
        $queryOrder = mysqli_query($con, $sqlOrder);
        while ($rowOrder = mysqli_fetch_array($queryOrder)) {//retrieve another array of products in the order

            $seconedID = $rowOrder['product_id'];

            $recrecforsize2 = "SELECT * FROM product where productID='$seconedID'";
            $queryrecrecforsize2 = mysqli_query($con, $recrecforsize2);
            while ($rowrecrecforsize2 = mysqli_fetch_array($queryrecrecforsize2)) {//we retrieved the seconed sizeid
                $seconedSize = $rowrecrecforsize2['sellerSizeID'];
            } 


            $sqlOrder2 = " SELECT * FROM orderrecomendation where sizeID= '$seconedSize'"; //retrive information for product in seconed array in orderrecomenation table
            $queryOrder2 = mysqli_query($con, $sqlOrder2);
            while ($rowOrder2 = mysqli_fetch_array($queryOrder2)) { 
				$sqlOrder23 = " SELECT * FROM orderrecomendation where sizeID= '$firstSize'"; //retrive information for product in seconed array in orderrecomenation table
				$queryOrder23 = mysqli_query($con, $sqlOrder23);
				while ($rowOrder23 = mysqli_fetch_array($queryOrder23)) { 
					$firstIDOnSizeId=$rowOrder23['id'];
			}
             			
                $columnForFirstID = 'id'.$firstIDOnSizeId;// here use first id from sizeid for first id
				$seconedIDforsize = $rowOrder2['id'];
                $columnForSeconedID = 'id'.$seconedIDforsize;// i should use id on orderercomendation that have the same sizeid like seconed product
                $number = $rowOrder2[$columnForFirstID]; 
                $number = intval($number);
                $number++;
                //echo $number;	

                $editOrder = "update orderrecomendation set $columnForFirstID='$number' where id='$seconedIDforsize'";
                $do = mysqli_query($con, "$editOrder");
            }
        }
    }





    $sqlOrder3 = " SELECT * FROM orderrecomendation ";
    $queryOrder3 = mysqli_query($con, $sqlOrder3);

    while ($rowOrder3 = mysqli_fetch_array($queryOrder3)) {

       
        $seconedid = $rowOrder3['id'];
        $sqlOrder4 = " SELECT * FROM orderrecomendation where id= '$seconedid'";
        $queryOrder5 = mysqli_query($con, $sqlOrder4);
        while ($rowOrder5 = mysqli_fetch_array($queryOrder5)) {
            $hithere = 'id'.$seconedid;

            $number = $rowOrder5[$hithere];

            $idBase22 = 'id'.$seconedid;
            $QueryOrder5 = "update orderrecomendation set $idBase22='$number' where id='$seconedid'";
            $doOrder5 = mysqli_query($con, "$QueryOrder5");
        }

    }	



    ?>