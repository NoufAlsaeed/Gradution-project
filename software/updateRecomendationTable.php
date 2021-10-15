 <?php
//this page will retrieve product from and order and call recomendation page for each of them
include('db.php'); 

$id1 = $order_id;

    $sqlOrderRecomendation = "SELECT * FROM ordered_items where order_id='$id1'"; //retrive products in id
    $queryOrderRecomendation = mysqli_query($con, $sqlOrderRecomendation);


	function abs_diff($v1, $v2) {
		$diff = $v1 - $v2;
		return $diff < 0 ? (-1) * $diff : $diff;
	}
	//this function calculate similarity between price for base and each product
	function normlized ($x,$y,$bigger,$smaller){	
		$diff=abs_diff($x,$y);
		$maqam= $bigger-$smaller;
		//if ($bigger==0){return 1 ;}
		$resu=$diff/$maqam;
		return $resu;	}

    while ($rowOrderRecomendation = mysqli_fetch_array($queryOrderRecomendation)) {
        $firstID = $rowOrderRecomendation['product_id']; //i will retrive its sellersizeid from the product table and use it replaced with product id
//  i should retrieve its sellersizeid then search about it as sizeid in orderrecomendation
        include ('recomendation.php');

    }	

    ?>